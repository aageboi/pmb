<?php defined('BASEPATH') OR exit('No direct script access allowed');

class nilai extends CI_Controller
{
    private $view = "admin/data/nilai";
    private $data;

    public function __construct ()
    {
        parent::__construct();
        if (! session('un'))
            redirect('admin/sessions/login');

        $this->load->model('hasil_model','hasil');

        $this->data['page'] = 'nilai';
        $this->data['breadcrumb'] = array(
            'Home' => 'admin',
            'Data' => 'admin/nilai',
            'Registrasi' => 'admin/nilai',
        );
    }

    public function index ()
    {
        $this->data['breadcrumb']['Daftar'] = null;
        $this->data['data'] = $this->hasil->find_user();
        $this->data['yield'] = $this->view.'/list';
        $this->load->view('admin/layout', $this->data);
    }

    public function gambar ($id = NULL)
    {
        if (! $id)
            redirect('admin/nilai');

        $this->load->model('pribadi_model', 'pribadi');

        $this->data['data'] = $this->pribadi->get($id);

        if (! is_get()) {
            $nilai['nilai_gambar'] = $this->input->post('nilai_gambar');
            $this->pribadi->skip_validation();
            if (! $result_nomor = $this->pribadi->update($id,$nilai)) {
                set_message('Terjadi error ketika menyimpan nilai gambar', 'error');
            } else {
                set_message('Input nilai gambar berhasil');
                redirect('admin/nilai');
            }
        }

        $this->data['breadcrumb']['Daftar'] = null;
        $this->data['yield'] = $this->view.'/gambar';
        $this->load->view('admin/layout', $this->data);
    }
}
