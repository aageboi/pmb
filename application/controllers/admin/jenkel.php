<?php defined('BASEPATH') OR exit('No direct script access allowed');

class jenkel extends CI_Controller
{
    private $view = "admin/master/jenkel";

    public function __construct ()
    {
        parent::__construct();
        if (! session('un'))
            redirect('admin/sessions/login');

        $this->load->model('jenkel_model','jenkel');

        $this->data['page'] = 'jenkel';
        $this->data['breadcrumb'] = array(
            'Home' => 'admin',
            'Master' => 'admin/master',
            'Jenis Kelamin' => 'admin/jenkel',
        );
    }

    public function index()
    {
        $this->data['breadcrumb']['Daftar'] = null;
        $this->data['data'] = $this->jenkel->get_all();
        $this->data['yield'] = $this->view.'/list';
        $this->load->view('admin/layout', $this->data);
    }

    public function add ()
    {
        $this->data['breadcrumb']['Tambah'] = null;
        $this->data['yield'] = $this->view.'/add';

        // post new
        if (! is_get()) {
            $_data['kd_jenkel'] = $this->input->post('kode');
            $_data['jenkel'] = $this->input->post('nama');
            if ($result = $this->jenkel->insert($_data))
                redirect('admin/jenkel');
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
                'kd_jenkel' => $this->input->post('kode'),
                'jenkel' => $this->input->post('nama'),
            );
            if ($result = $this->jenkel->update($_id,$new_data))
                redirect('admin/jenkel');
            else
                set_message(validation_errors(),'error');
        } else {
            if (! $id) {
                set_message('ID tidak boleh kosong','error');
                redirect('admin/jenkel');
            }
            $this->data['data'] = $this->jenkel->get_by('id',$id);
        }
        $this->load->view('admin/layout', $this->data);
    }

    public function delete ($id = null)
    {
        if (! $id) {
            set_message('ID tidak boleh kosong','error');
            redirect('admin/jenkel');
        }
        if ($this->jenkel->delete($id)) {
            set_message('Hapus data berhasil','info');
        } else {
            set_message('Hapus data gagal','error');
        }
        redirect('admin/jenkel');
    }
}
