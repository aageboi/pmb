<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dokumen extends CI_Controller {
    private $view = "admin/master/dokumen";

    public function __construct ()
    {
        parent::__construct();
        if (! session('un'))
            redirect('admin/sessions/login');

        $this->load->model('dokumen_model','dokumen');

        $this->data['page'] = 'dokumen';
        $this->data['breadcrumb'] = array(
            'Home' => 'admin',
            'Master' => 'admin/master',
            'Dokumen' => 'admin/dokumen',
        );
    }

    public function index()
    {
        $this->data['breadcrumb']['Daftar'] = null;
        $this->data['data'] = $this->dokumen->get_all();
        $this->data['yield'] = $this->view.'/list';
        $this->load->view('admin/layout', $this->data);
    }

    public function add ()
    {
        $this->data['breadcrumb']['Tambah'] = null;
        $this->data['yield'] = $this->view.'/add';

        // post new
        if (! is_get()) {
            $this->data['nama'] = $_data['nama_dokumen'] = $this->input->post('nama');
            if ($result = $this->dokumen->insert($_data))
                redirect('admin/dokumen');
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
                'nama_dokumen' => $this->input->post('nama'),
            );
            if ($result = $this->dokumen->update($_id,$new_data))
                redirect('admin/dokumen');
            else
                set_message(validation_errors(),'error');
        } else {
            if (! $id) {
                set_message('ID tidak boleh kosong','error');
                redirect('admin/dokumen');
            }
            $this->data['data'] = $this->dokumen->get_by('id',$id);
        }
        $this->load->view('admin/layout', $this->data);
    }

    public function delete ($id = null)
    {
        if (! $id) {
            set_message('ID tidak boleh kosong','error');
            redirect('admin/dokumen');
        }
        if ($this->dokumen->delete($id)) {
            set_message('Hapus data berhasil','info');
        } else {
            set_message('Hapus data gagal','error');
        }
        redirect('admin/dokumen');
    }
}
