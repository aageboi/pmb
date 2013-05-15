<?php defined('BASEPATH') OR exit('No direct script access allowed');

class statusnikah extends CI_Controller
{
    private $view = "admin/master/statusnikah";

    public function __construct ()
    {
        parent::__construct();
        if (! session('un'))
            redirect('admin/sessions/login');

        $this->load->model('statusnikah_model','statusnikah');

        $this->data['page'] = 'statusnikah';
        $this->data['breadcrumb'] = array(
            'Home' => 'admin',
            'Master' => 'admin/master',
            'Status Nikah' => 'admin/statusnikah',
        );
    }

    public function index()
    {
        $this->data['breadcrumb']['Daftar'] = null;
        $this->data['data'] = $this->statusnikah->get_all();
        $this->data['yield'] = $this->view.'/list';
        $this->load->view('admin/layout', $this->data);
    }

    public function add ()
    {
        $this->data['breadcrumb']['Tambah'] = null;
        $this->data['yield'] = $this->view.'/add';

        // post new
        if (! is_get()) {
            $_data['status'] = $this->input->post('nama');
            if ($result = $this->statusnikah->insert($_data))
                redirect('admin/statusnikah');
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
                'status' => $this->input->post('nama'),
            );
            if ($result = $this->statusnikah->update($_id,$new_data))
                redirect('admin/statusnikah');
            else
                set_message(validation_errors(),'error');
        } else {
            if (! $id) {
                set_message('ID tidak boleh kosong','error');
                redirect('admin/statusnikah');
            }
            $this->data['data'] = $this->statusnikah->get_by('id',$id);
        }
        $this->load->view('admin/layout', $this->data);
    }

    public function delete ($id = null)
    {
        if (! $id) {
            set_message('ID tidak boleh kosong','error');
            redirect('admin/statusnikah');
        }
        if ($this->statusnikah->delete($id)) {
            set_message('Hapus data berhasil','info');
        } else {
            set_message('Hapus data gagal','error');
        }
        redirect('admin/statusnikah');
    }
}
