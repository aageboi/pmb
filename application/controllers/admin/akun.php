<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {
    private $view = "admin/data/akun";
    private $data;

    public function __construct ()
    {
        parent::__construct();
        if (! session('un'))
            redirect('admin/sessions/login');

        $this->load->model('akun_model','akun');

        $this->data['page'] = 'akun';
        $this->data['breadcrumb'] = array(
            'Home' => 'admin',
            'Data' => 'admin/akun',
            'Akun' => 'admin/akun',
        );
    }

    public function index()
    {
        $this->data['breadcrumb']['Daftar'] = null;
        $this->data['data'] = $this->akun->get_all();
        $this->data['yield'] = $this->view.'/list';
        $this->load->view('admin/layout', $this->data);
    }

    public function add ()
    {
        $this->data['breadcrumb']['Tambah'] = null;
        // post new
        if (! is_get()) {
            $this->data['nama'] = $_data['nama_akun'] = strtolower($this->input->post('nama'));
            $this->data['email'] = $_data['email'] = strtolower($this->input->post('email'));
            $this->data['password'] = $_data['password'] = md5($this->input->post('pass'));
            $this->data['role'] = $_data['role'] = $this->input->post('role');
            $this->data['status'] = $_data['status'] = $this->input->post('status');
            if ($result = $this->akun->insert($_data))
                redirect('admin/akun');
            else
                set_message(validation_errors(),'error');
        }
        $this->data['yield'] = $this->view.'/add';
        $this->load->view('admin/layout', $this->data);
    }

    public function delete ($id = null)
    {
        if (! $id) {
            set_message('ID tidak boleh kosong','error');
            redirect('admin/akun');
        }
        if ($this->akun->delete($id)) {
            set_message('Hapus data berhasil','info');
        } else {
            set_message('Hapus data gagal','error');
        }
        redirect('admin/akun');
    }

    public function edit ($id = null)
    {
        $this->data['breadcrumb']['Edit'] = null;
        $this->data['yield'] = $this->view.'/edit';

        // post update
        if (! is_get()) {
            $id = $this->input->post('id');
            $new_data = array(
                'nama_akun' => strtolower($this->input->post('nama')),
                'email' => strtolower($this->input->post('email')),
                'password' => md5($this->input->post('pass')),
                'role' => $this->input->post('role'),
                'status' => $this->input->post('status'),
            );

            if (! $this->input->post('password') && $this->input->post('password') == 'password')
                unset($new_data['password']);

            $this->akun->skip_validation();
            if ($result = $this->akun->update($id,$new_data))
                redirect('admin/akun');
            else
                set_message(validation_errors(),'error');
        }

        if (! $id) {
            set_message('ID tidak boleh kosong','error');
            redirect('admin/akun');
        }
        $this->data['data'] = $this->akun->get_by('id',$id);

        $this->load->view('admin/layout', $this->data);
    }
}
