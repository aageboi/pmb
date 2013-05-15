<?php defined('BASEPATH') OR exit('No direct script access allowed');

class sumberbiaya extends CI_Controller
{
    private $view = "admin/master/sumberbiaya";

    public function __construct ()
    {
        parent::__construct();
        if (! session('un'))
            redirect('admin/sessions/login');

        $this->load->model('sumberbiaya_model','sumberbiaya');

        $this->data['page'] = 'sumberbiaya';
        $this->data['breadcrumb'] = array(
            'Home' => 'admin',
            'Master' => 'admin/master',
            'Sumber Biaya' => 'admin/sumberbiaya',
        );
    }

    public function index()
    {
        $this->data['breadcrumb']['Daftar'] = null;
        $this->data['data'] = $this->sumberbiaya->get_all();
        $this->data['yield'] = $this->view.'/list';
        $this->load->view('admin/layout', $this->data);
    }

    public function add ()
    {
        $this->data['breadcrumb']['Tambah'] = null;
        $this->data['yield'] = $this->view.'/add';

        // post new
        if (! is_get()) {
            $_data['sumber_biaya'] = $this->input->post('nama');
            if ($result = $this->sumberbiaya->insert($_data))
                redirect('admin/sumberbiaya');
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
                'sumber_biaya' => $this->input->post('nama'),
            );
            if ($result = $this->sumberbiaya->update($_id,$new_data))
                redirect('admin/sumberbiaya');
            else
                set_message(validation_errors(),'error');
        } else {
            if (! $id) {
                set_message('ID tidak boleh kosong','error');
                redirect('admin/sumberbiaya');
            }
            $this->data['data'] = $this->sumberbiaya->get_by('id',$id);
        }
        $this->load->view('admin/layout', $this->data);
    }

    public function delete ($id = null)
    {
        if (! $id) {
            set_message('ID tidak boleh kosong','error');
            redirect('admin/sumberbiaya');
        }
        if ($this->sumberbiaya->delete($id)) {
            set_message('Hapus data berhasil','info');
        } else {
            set_message('Hapus data gagal','error');
        }
        redirect('admin/sumberbiaya');
    }
}
