<?php defined('BASEPATH') OR exit('No direct script access allowed');

class syarat extends CI_Controller
{
    private $view = "admin/master/syarat";

    public function __construct ()
    {
        parent::__construct();
        if (! session('un'))
            redirect('admin/sessions/login');

        $this->load->model('syarat_model','syarat');

        $this->data['page'] = 'syarat';
        $this->data['breadcrumb'] = array(
            'Home' => 'admin',
            'Master' => 'admin/master',
            'Syarat Pendaftaran' => 'admin/syarat',
        );
    }

    public function index()
    {
        $this->data['breadcrumb']['Daftar'] = null;
        $this->data['data'] = $this->syarat->get_all();
        $this->data['yield'] = $this->view.'/list';
        $this->load->view('admin/layout', $this->data);
    }

    public function add ()
    {
        $this->data['breadcrumb']['Tambah'] = null;
        $this->data['yield'] = $this->view.'/add';

        // post new
        if (! is_get()) {
            // $this->data['kode'] = $_data['kd_dftr'] = $this->input->post('kode');
            $this->data['nama'] = $_data['syarat'] = $this->input->post('nama');
            if ($result = $this->syarat->insert($_data))
                redirect('admin/syarat');
            else
                set_message(validation_errors(),'error');
        }
        $this->load->view('admin/layout', $this->data);
    }

    public function edit ($id = null)
    {
        $this->data['breadcrumb']['Edit'] = null;
        $this->data['yield'] = $this->view.'/edit';

        // post update
        if (! is_get()) {
            $_id = $this->input->post('id');
            $new_data = array(
                // 'kd_dftr' => $this->input->post('kode'),
                'syarat' => $this->input->post('nama'),
            );
            if ($result = $this->syarat->update($_id,$new_data))
                redirect('admin/syarat');
            else
                set_message(validation_errors(),'error');
        } else {
            if (! $id) {
                set_message('ID tidak boleh kosong','error');
                redirect('admin/syarat');
            }
            $this->data['data'] = $this->syarat->get_by('id',$id);
        }
        $this->load->view('admin/layout', $this->data);
    }

    public function delete ($id = null)
    {
        if (! $id) {
            set_message('ID tidak boleh kosong','error');
            redirect('admin/syarat');
        }
        if ($this->syarat->delete($id)) {
            set_message('Hapus data berhasil','info');
        } else {
            set_message('Hapus data gagal','error');
        }
        redirect('admin/syarat');
    }
}
