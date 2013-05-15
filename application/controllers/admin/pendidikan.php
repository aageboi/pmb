<?php defined('BASEPATH') OR exit('No direct script access allowed');

class pendidikan extends CI_Controller
{
    private $view = "admin/master/pendidikan";

    public function __construct ()
    {
        parent::__construct();
        if (! session('un'))
            redirect('admin/sessions/login');

        $this->load->model('pendidikan_model','pendidikan');

        $this->data['page'] = 'pendidikan';
        $this->data['breadcrumb'] = array(
            'Home' => 'admin',
            'Master' => 'admin/master',
            'Pendidikan Terakhir' => 'admin/pendidikan',
        );
    }

    public function index()
    {
        $this->data['breadcrumb']['Daftar'] = null;
        $this->data['data'] = $this->pendidikan->get_all();
        $this->data['yield'] = $this->view.'/list';
        $this->load->view('admin/layout', $this->data);
    }

    public function add ()
    {
        $this->data['breadcrumb']['Tambah'] = null;
        $this->data['yield'] = $this->view.'/add';

        // post new
        if (! is_get()) {
            $this->data['nama'] = $_data['pendidikan'] = $this->input->post('nama');
            if ($result = $this->pendidikan->insert($_data))
                redirect('admin/pendidikan');
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
                'pendidikan' => $this->input->post('nama'),
            );
            if ($result = $this->pendidikan->update($_id,$new_data))
                redirect('admin/pendidikan');
            else
                set_message(validation_errors(),'error');
        } else {
            if (! $id) {
                set_message('ID tidak boleh kosong','error');
                redirect('admin/pendidikan');
            }
            $this->data['data'] = $this->pendidikan->get_by('id',$id);
        }
        $this->load->view('admin/layout', $this->data);
    }

    public function delete ($id = null)
    {
        if (! $id) {
            set_message('ID tidak boleh kosong','error');
            redirect('admin/pendidikan');
        }
        if ($this->pendidikan->delete($id)) {
            set_message('Hapus data berhasil','info');
        } else {
            set_message('Hapus data gagal','error');
        }
        redirect('admin/pendidikan');
    }
}
