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

        $this->pribadi->skip_validation();
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

        if ($data = $this->pribadi->get($id)) {
            $this->load->model('ortu_model', 'ortu');
            $this->load->model('sekolahasal_model', 'sekolahasal');
            if ($this->pribadi->delete($id)) {
                if (! $this->ortu->delete($data['id_ortu']))
                    set_message('Hapus data orang tua gagal','error');
                if (! $this->sekolahasal->delete($data['id_sekolah']))
                    set_message('Hapus data sekolah asal gagal','error');
                set_message('Hapus data registrasi berhasil');
            } else {
                set_message('Hapus data gagal','error');
            }
        }

        redirect('admin/registrasi');
    }
}
