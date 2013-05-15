<?php defined('BASEPATH') OR exit('No direct script access allowed');

class kewarganegaraan extends CI_Controller
{
    private $view = "admin/master/kewarganegaraan";

    public function __construct ()
    {
        parent::__construct();
        if (! session('un'))
            redirect('admin/sessions/login');

        $this->load->model('kewarganegaraan_model','kewarganegaraan');

        $this->data['page'] = 'kewarganegaraan';
        $this->data['breadcrumb'] = array(
            'Home' => 'admin',
            'Master' => 'admin/master',
            'Kewarganegaraan' => 'admin/kewarganegaraan',
        );
    }

    public function index()
    {
        $this->data['breadcrumb']['Daftar'] = null;
        $this->data['data'] = $this->kewarganegaraan->get_all();
        $this->data['yield'] = $this->view.'/list';
        $this->load->view('admin/layout', $this->data);
    }

    public function add ()
    {
        $this->data['breadcrumb']['Tambah'] = null;
        $this->data['yield'] = $this->view.'/add';

        // post new
        if (! is_get()) {
            // $_data['kd_kwn'] = $this->input->post('kode');
            $_data['kewarganegaraan'] = $this->input->post('nama');
            if ($result = $this->kewarganegaraan->insert($_data))
                redirect('admin/kewarganegaraan');
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
                // 'kd_kwn' => $this->input->post('kode'),
                'kewarganegaraan' => $this->input->post('nama'),
            );
            if ($result = $this->kewarganegaraan->update($_id,$new_data))
                redirect('admin/kewarganegaraan');
            else
                set_message(validation_errors(),'error');
        } else {
            if (! $id) {
                set_message('ID tidak boleh kosong','error');
                redirect('admin/kewarganegaraan');
            }
            $this->data['data'] = $this->kewarganegaraan->get_by('id',$id);
        }
        $this->load->view('admin/layout', $this->data);
    }

    public function delete ($id = null)
    {
        if (! $id) {
            set_message('ID tidak boleh kosong','error');
            redirect('admin/kewarganegaraan');
        }
        if ($this->kewarganegaraan->delete($id)) {
            set_message('Hapus data berhasil','info');
        } else {
            set_message('Hapus data gagal','error');
        }
        redirect('admin/kewarganegaraan');
    }
}
