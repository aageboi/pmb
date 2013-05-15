<?php defined('BASEPATH') OR exit('No direct script access allowed');

class pekerjaan extends CI_Controller
{
    private $view = "admin/master/pekerjaan";

    public function __construct ()
    {
        parent::__construct();
        if (! session('un'))
            redirect('admin/sessions/login');

        $this->load->model('pekerjaan_model','pekerjaan');

        $this->data['page'] = 'pekerjaan';
        $this->data['breadcrumb'] = array(
            'Home' => 'admin',
            'Master' => 'admin/master',
            'Pekerjaan' => 'admin/pekerjaan',
        );
    }

    public function index()
    {
        $this->data['breadcrumb']['Daftar'] = null;
        $this->data['data'] = $this->pekerjaan->get_all();
        $this->data['yield'] = $this->view.'/list';
        $this->load->view('admin/layout', $this->data);
    }

    public function add ()
    {
        $this->data['breadcrumb']['Tambah'] = null;
        $this->data['yield'] = $this->view.'/add';

        // post new
        if (! is_get()) {
            $this->data['nama'] = $_data['nama_pekerjaan'] = $this->input->post('nama');
            if ($result = $this->pekerjaan->insert($_data))
                redirect('admin/pekerjaan');
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
                'nama_pekerjaan' => $this->input->post('nama'),
            );
            if ($result = $this->pekerjaan->update($_id,$new_data))
                redirect('admin/pekerjaan');
            else
                set_message(validation_errors(),'error');
        } else {
            if (! $id) {
                set_message('ID tidak boleh kosong','error');
                redirect('admin/pekerjaan');
            }
            $this->data['data'] = $this->pekerjaan->get_by('id',$id);
        }
        $this->load->view('admin/layout', $this->data);
    }

    public function delete ($id = null)
    {
        if (! $id) {
            set_message('ID tidak boleh kosong','error');
            redirect('admin/pekerjaan');
        }
        if ($this->pekerjaan->delete($id)) {
            set_message('Hapus data berhasil','info');
        } else {
            set_message('Hapus data gagal','error');
        }
        redirect('admin/pekerjaan');
    }
}
