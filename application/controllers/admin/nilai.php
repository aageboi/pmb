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

    public function index ($cetak = NULL)
    {
        $this->load->model('periode_model', 'periode');
        $this->data['periode'] = $this->periode->get_all();

        $this->data['breadcrumb']['Daftar'] = NULL;

        if ($this->input->get('periode')) {
            $periode = explode('/',urldecode($this->input->get('periode')));
            $tgl_mulai      = $periode[0].' 00:00:00';
            $tgl_selesai    = $periode[1].' 23:59:59';
            $this->db->where('p.created_at >=', $tgl_mulai);
            $this->db->where('p.created_at <=', $tgl_selesai);
        }

        $this->data['data'] = $this->hasil->find_user();
        $this->data['total_peserta'] = count ($this->data['data']);

        if ($cetak == 'cetak') {
            $this->data['yield'] = $this->view.'/list_cetak';
            $this->load->view('admin/layout_print', $this->data);
        } else {
            $this->data['yield'] = $this->view.'/list';
            $this->load->view('admin/layout', $this->data);
        }
    }

    public function gambar ($id = NULL)
    {
        $this->load->model('pribadi_model', 'pribadi');
        $this->data['breadcrumb']['Daftar'] = NULL;

        if (! $id) {
            // redirect('admin/nilai');
            $this->data['data'] = $this->pribadi->get_many_by('is_verified', '1');
            $this->data['yield'] = $this->view.'/list_gambar';

        } else {

            $this->data['data'] = $this->pribadi->get($id);

            if (! is_get()) {
                $nilai['nilai_gambar'] = $this->input->post('nilai_gambar');
                $this->pribadi->skip_validation();
                if (! $result_nomor = $this->pribadi->update($id,$nilai)) {
                    set_message('Terjadi error ketika menyimpan nilai gambar', 'error');
                } else {
                    set_message('Input nilai gambar berhasil');
                    redirect('admin/nilai/gambar');
                }
            }

            $this->data['yield'] = $this->view.'/gambar';
        }

        $this->load->view('admin/layout', $this->data);
    }

    public function cetak ()
    {
        $this->index('cetak');
    }
}
