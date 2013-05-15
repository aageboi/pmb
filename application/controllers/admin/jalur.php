<?php defined('BASEPATH') OR exit('No direct script access allowed');

class jalur extends CI_Controller
{
    private $view = "admin/master/jalur";

    public function __construct ()
    {
        parent::__construct();
        if (! session('un'))
            redirect('admin/sessions/login');

        $this->load->model('jalur_model','jalur');

        $this->data['page'] = 'jalur';
        $this->data['breadcrumb'] = array(
            'Home' => 'admin',
            'Master' => 'admin/master',
            'Jalur Pendaftaran' => 'admin/jalur',
        );
    }

    public function index()
    {
        $this->data['breadcrumb']['Daftar'] = null;
        $this->data['data'] = $this->jalur->get_all();
        $this->data['yield'] = $this->view.'/list';
        $this->load->view('admin/layout', $this->data);
    }

    public function add ()
    {
        $this->data['breadcrumb']['Tambah'] = null;
        $this->data['yield'] = $this->view.'/add';

        // post new
        if (! is_get()) {
            $this->data['nama'] = $_data['nama_jalur'] = $this->input->post('nama');
            if ($result = $this->jalur->insert($_data))
                redirect('admin/jalur');
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
                'nama_jalur' => $this->input->post('nama'),
            );
            if ($result = $this->jalur->update($_id,$new_data))
                redirect('admin/jalur');
            else
                set_message(validation_errors(),'error');
        } else {
            if (! $id) {
                set_message('ID tidak boleh kosong','error');
                redirect('admin/jalur');
            }
            $this->data['data'] = $this->jalur->get_by('id',$id);
        }
        $this->load->view('admin/layout', $this->data);
    }

    public function delete ($id = null)
    {
        if (! $id) {
            set_message('ID tidak boleh kosong','error');
            redirect('admin/jalur');
        }
        if ($this->jalur->delete($id)) {
            set_message('Hapus data berhasil','info');
        } else {
            set_message('Hapus data gagal','error');
        }
        redirect('admin/jalur');
    }
}
