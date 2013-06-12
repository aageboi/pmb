<?php defined('BASEPATH') OR exit('No direct script access allowed');

class data extends CI_Controller
{
    private $view = "admin/data";

    public function __construct ()
    {
        parent::__construct();
        if (! session('un'))
            redirect('admin/sessions/login');
    }

    public function index()
    {
        redirect('admin');
        // $data['yield'] = 'admin/data/index';
        // $this->load->view('admin/layout', $data);
    }

    public function admin ()
    {
        $this->load->model('admin_model','admin');

        $view = $this->view . '/admin';

        $data['page'] = 'admin';
        $data['breadcrumb'] = array(
            'Home' => 'admin',
            'Data' => 'admin/data',
            'Admin' => 'admin/data/admin',
        );

        $param  = func_get_args();
        $page   = isset($param[0]) ? $param[0] : NULL;
        $id     = isset($param[1]) ? $param[1] : NULL;

        // add
        if ($page == 'new') {
            $data['breadcrumb']['Tambah'] = null;
            // post new
            if (! is_get()) {
                $_data['nama_akun'] = $this->input->post('nama');
                $_data['email'] = $this->input->post('email');
                $_data['password'] = md5($this->input->post('pass'));
                $_data['status'] = $this->input->post('status');
                $_data['role'] = $this->input->post('role');
                if ($result = $this->admin->insert($_data))
                    redirect('admin/data/admin');
                else
                    set_message(validation_errors(),'error');
            }
            $data['yield'] = $view.'/add';
        }

        // edit
        elseif ($page == 'edit') {
            $data['breadcrumb']['Edit'] = null;
            // post update
            if (! is_get()) {
                $_id = $this->input->post('id');
                $new_data = array(
                    'nama_akun' => $this->input->post('nama'),
                    'email' => $this->input->post('email'),
                    'password' => md5($this->input->post('pass')),
                    'status' => $this->input->post('status'),
                    'role' => $this->input->post('role'),
                );
                if ($result = $this->admin->update($_id,$new_data))
                    redirect('admin/data/admin');
                else
                    set_message(validation_errors(),'error');
            } else {
                if (! $id) {
                    set_message('ID tidak boleh kosong','error');
                    redirect('admin/data/admin');
                }
                $data['data'] = $this->admin->get_by('id',$id);
            }
            $data['yield'] = $view.'/edit';
        }

        // delete
        elseif ($page == 'delete') {
            if (! $id) {
                set_message('ID tidak boleh kosong','error');
                redirect('admin/data/admin');
            }
            if ($this->admin->delete($id)) {
                set_message('Hapus data berhasil','info');
            } else {
                set_message('Hapus data gagal','error');
            }
            redirect('admin/data/admin');
        }

        // list
        else {
            $data['breadcrumb']['Daftar'] = null;
            $data['data'] = $this->admin->get_all();
            $data['yield'] = $view.'/list';
        }
        $this->load->view('admin/layout', $data);
    }
}
