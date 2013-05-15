<?php defined('BASEPATH') OR exit('No direct script access allowed');

class agama extends CI_Controller
{
    private $view = "admin/master/agama";
    private $data;

    public function __construct ()
    {
        parent::__construct();
        if (! session('un'))
            redirect('admin/sessions/login');

        $this->load->model('agama_model','agama');
        $this->data['page'] = 'agama';
        $this->data['breadcrumb'] = array(
            'Home' => 'admin',
            'Master' => 'admin/master',
            'Agama' => 'admin/agama',
        );
    }

    public function index()
    {
        $this->data['breadcrumb']['Daftar'] = null;
        $this->data['data'] = $this->agama->get_all();
        $this->data['yield'] = $this->view.'/list';
        $this->load->view('admin/layout', $this->data);
    }

    public function add ()
    {
        $this->data['breadcrumb']['Tambah'] = null;
        // post new
        if (! is_get()) {
            $_data['agama'] = $this->input->post('nama');
            if ($result = $this->agama->insert($_data))
                redirect('admin/agama');
            else
                set_message(validation_errors(),'error');
        }
        $this->data['yield'] = $this->view.'/add';
        $this->load->view('admin/layout', $this->data);
    }

    public function delete ($id = null)
    {
        if (! $id) {
            set_message('ID tidak boleh kosong','error');
            redirect('admin/agama');
        }
        if ($this->agama->delete($id)) {
            set_message('Hapus data berhasil','info');
        } else {
            set_message('Hapus data gagal','error');
        }
        redirect('admin/agama');
    }

    public function edit ($id = null)
    {
        $this->data['breadcrumb']['Edit'] = null;
        $this->data['yield'] = $this->view.'/edit';

        // post update
        if (! is_get()) {
            $_id = $this->input->post('id');
            $new_data = array(
                'agama' => $this->input->post('nama'),
            );
            if ($result = $this->agama->update($_id,$new_data))
                redirect('admin/agama');
            else
                set_message(validation_errors(),'error');
        } else {
            if (! $id) {
                set_message('ID tidak boleh kosong','error');
                redirect('admin/agama');
            }
            $this->data['data'] = $this->agama->get_by('id',$id);
        }
        $this->load->view('admin/layout', $this->data);
    }
}
