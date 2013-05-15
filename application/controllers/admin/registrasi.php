<?php defined('BASEPATH') OR exit('No direct script access allowed');

class registrasi extends CI_Controller
{
    private $view = "admin/data/registrasi";
    private $data;

    public function __construct ()
    {
        parent::__construct();
        if (! session('un'))
            redirect('admin/sessions/login');

        $this->load->model('pribadi_model','pribadi');

        $this->data['page'] = 'manage';
        $this->data['breadcrumb'] = array(
            'Home' => 'admin',
            'Data' => 'admin/registrasi',
            'Registrasi' => 'admin/registrasi',
        );
    }

    public function index()
    {
        $this->data['breadcrumb']['Daftar'] = null;
        $this->data['data'] = $this->pribadi->get_all();
        $this->data['yield'] = $this->view.'/list';
        $this->load->view('admin/layout', $this->data);
    }

    public function verify ($id = NULL, $verify = 'aktif')
    {
        if (! $id) {
            set_message('ID tidak boleh kosong','error');
            redirect('admin/registrasi');
        }

        if ($verify == 'aktif')
            $new_data['is_verified'] = '1';
        else
            $new_data['is_verified'] = '0';

        if ($this->pribadi->update($id, $new_data))
            set_message('Verifikasi berhasil!');
        else
            set_message('Verifikasi gagal','error');
        redirect('admin/registrasi');
    }

    public function delete ($id = null)
    {
        if (! $id) {
            set_message('ID tidak boleh kosong','error');
            redirect('admin/registrasi');
        }
        if ($this->pribadi->delete($id)) {
            set_message('Hapus data berhasil','info');
        } else {
            set_message('Hapus data gagal','error');
        }
        redirect('admin/registrasi');
    }
}
