<?php defined('BASEPATH') OR exit('No direct script access allowed');

class statik extends CI_Controller
{
    private $view = "admin/data/statik";

    public function __construct ()
    {
        parent::__construct();
        if (! session('un'))
            redirect('admin/sessions/login');

        $this->load->model('static_model','statik');

        $this->data['page'] = 'statik';
        $this->data['breadcrumb'] = array(
            'Home' => 'admin',
            'Master' => 'admin/data',
            'Statik' => 'admin/statik',
        );
    }

    public function index()
    {
        $this->data['breadcrumb']['Daftar'] = null;
        $this->data['data'] = $this->statik->get_all();
        $this->data['yield'] = $this->view.'/list';
        $this->load->view('admin/layout', $this->data);
    }

    public function add ()
    {
        $this->data['breadcrumb']['Tambah'] = null;
        $this->data['yield'] = $this->view.'/add';

        // post new
        if (! is_get()) {
            $this->data['permalink'] = $_data['permalink'] = $this->input->post('permalink');
            $this->data['title'] = $_data['title'] = $this->input->post('title');
            $this->data['content'] = $_data['content'] = $this->input->post('content');
            if ($result = $this->statik->insert($_data))
                redirect('admin/statik');
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
                'permalink' => $this->input->post('permalink'),
                'title' => $this->input->post('title'),
                'content' => $this->input->post('content'),
            );
            if ($result = $this->statik->update($_id,$new_data)) {
                set_message('Update data berhasil');
                redirect('admin/statik/edit/'.$_id);
            }
            else
                set_message(validation_errors(),'error');
        } else {
            if (! $id) {
                set_message('ID tidak boleh kosong','error');
                redirect('admin/statik');
            }
            $this->data['data'] = $this->statik->get_by('id',$id);
        }
        $this->load->view('admin/layout', $this->data);
    }

    public function delete ($id = null)
    {
        if (! $id) {
            set_message('ID tidak boleh kosong','error');
            redirect('admin/statik');
        }
        if ($this->statik->delete($id)) {
            set_message('Hapus data berhasil','info');
        } else {
            set_message('Hapus data gagal','error');
        }
        redirect('admin/statik');
    }
}
