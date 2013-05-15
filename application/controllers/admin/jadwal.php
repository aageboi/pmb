<?php defined('BASEPATH') OR exit('No direct script access allowed');

class jadwal extends CI_Controller
{
    private $view = "admin/master/jadwal";

    public function __construct ()
    {
        parent::__construct();
        if (! session('un'))
            redirect('admin/sessions/login');

        $this->load->model('jadwal_model','jadwal');

        $this->data['page'] = 'jadwal';
        $this->data['breadcrumb'] = array(
            'Home' => 'admin',
            'Master' => 'admin/master',
            'Jadwal Pembayaran' => 'admin/jadwal',
        );
    }

    public function index()
    {
        $this->data['breadcrumb']['Daftar'] = null;
        $this->data['data'] = $this->jadwal->get_all();
        $this->data['yield'] = $this->view.'/list';
        $this->load->view('admin/layout', $this->data);
    }

    public function add ()
    {
        $this->data['breadcrumb']['Tambah'] = null;
        $this->data['yield'] = $this->view.'/add';

        // post new
        if (! is_get()) {
            $this->data['jadwal'] = $_data['jadwal'] = $this->input->post('jadwal');
            if ($result = $this->jadwal->insert($_data))
                redirect('admin/jadwal');
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
                'jadwal' => $this->input->post('jadwal'),
            );
            if ($result = $this->jadwal->update($_id,$new_data))
                redirect('admin/jadwal');
            else
                set_message(validation_errors(),'error');
        } else {
            if (! $id) {
                set_message('ID tidak boleh kosong','error');
                redirect('admin/jadwal');
            }
            $this->data['data'] = $this->jadwal->get_by('id',$id);
        }
        $this->load->view('admin/layout', $this->data);
    }

    public function delete ($id = null)
    {
        if (! $id) {
            set_message('ID tidak boleh kosong','error');
            redirect('admin/jadwal');
        }
        if ($this->jadwal->delete($id)) {
            set_message('Hapus data berhasil','info');
        } else {
            set_message('Hapus data gagal','error');
        }
        redirect('admin/jadwal');
    }
}
