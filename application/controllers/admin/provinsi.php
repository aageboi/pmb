<?php defined('BASEPATH') OR exit('No direct script access allowed');

class provinsi extends CI_Controller
{
    private $view = "admin/master/provinsi";

    public function __construct ()
    {
        parent::__construct();
        if (! session('un'))
            redirect('admin/sessions/login');

        $this->load->model('provinsi_model','provinsi');

        $this->data['page'] = 'provinsi';
        $this->data['breadcrumb'] = array(
            'Home' => 'admin',
            'Master' => 'admin/master',
            'Provinsi' => 'admin/provinsi',
        );
    }

    public function index()
    {
        $this->data['breadcrumb']['Daftar'] = null;
        $this->data['data'] = $this->provinsi->get_all();
        $this->data['yield'] = $this->view.'/list';
        $this->load->view('admin/layout', $this->data);
    }

    public function add ()
    {
        $this->data['breadcrumb']['Tambah'] = null;
        $this->data['yield'] = $this->view.'/add';

        // post new
        if (! is_get()) {
            $this->data['kode'] = $_data['kd_provinsi'] = $this->input->post('kode');
            $this->data['nama'] = $_data['nama_provinsi'] = $this->input->post('nama');
            if ($result = $this->provinsi->insert($_data))
                redirect('admin/provinsi');
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
                'kd_provinsi' => $this->input->post('kode'),
                'nama_provinsi' => $this->input->post('nama'),
            );
            if ($result = $this->provinsi->update($_id,$new_data))
                redirect('admin/provinsi');
            else
                set_message(validation_errors(),'error');
        } else {
            if (! $id) {
                set_message('ID tidak boleh kosong','error');
                redirect('admin/provinsi');
            }
            $this->data['data'] = $this->provinsi->get_by('id',$id);
        }
        $this->load->view('admin/layout', $this->data);
    }

    public function delete ($id = null)
    {
        if (! $id) {
            set_message('ID tidak boleh kosong','error');
            redirect('admin/provinsi');
        }
        if ($this->provinsi->delete($id)) {
            set_message('Hapus data berhasil','info');
        } else {
            set_message('Hapus data gagal','error');
        }
        redirect('admin/provinsi');
    }
}
