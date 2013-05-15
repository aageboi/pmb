<?php defined('BASEPATH') OR exit('No direct script access allowed');

class sessions extends CI_Controller
{
    public function __construct ()
    {
        parent::__construct();
    }

    public function index ()
    {
        $this->login();
    }

    public function login ()
    {
        $this->load->library('form_validation');

        if (session('un'))
            redirect('admin/dashboard');

        if (! is_get()) {
            $this->load->library('auth');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            if ($this->auth->authenticate($email, $password, 'admin')) {
                set_session("em", $email);
                set_message('Login berhasil!', 'info');
                redirect('admin/dashboard');
            }
        }

        $this->load->view('admin/login');
    }

    public function logout ()
    {
        set_session('un', NULL);
        set_session('em', NULL);
        redirect('admin/sessions');
    }

    public function daftar ()
    {
        $this->load->library('form_validation');

        if (session('un'))
            redirect('admin/dashboard');

        if (! is_get()) {
            $this->load->model('akun_model','akun');
            $this->akun->skip_validation();

            $this->form_validation->set_message('matches', '%s tidak sama dengan %s.');
            $this->form_validation->set_message('required', '%s tidak boleh kosong');
            $this->form_validation->set_message('min_length', 'Minimal karakter untuk %s adalah %s');

            $this->form_validation->set_rules('namax', 'Nama Akun', 'trim|required|min_length[6]');
            $this->form_validation->set_rules('emailx', 'Email', 'trim|required|is_unique[t_akun.email]');
            $this->form_validation->set_rules('passwordx', 'Password', 'trim|required|min_length[6]');
            $this->form_validation->set_rules('ulangiPassword', 'Ulangi Password', 'trim|required|matches[passwordx]');

            if ($this->form_validation->run() == TRUE) {
                $new['nama_akun'] = $this->input->post('namax');
                $new['email'] = $this->input->post('emailx');
                $new['password'] = md5($this->input->post('passwordx'));
                $new['role'] = 'admin';
                $new['status'] = '1';
                if ($result = $this->akun->insert($new)) {
                    set_message('Insert admin berhasil. Silakan login menggunakan akun anda.');
                    redirect('admin/sessions/daftar');
                } else {
                    set_message('Insert admin gagal', 'error');
                }
            }
        }

        $this->load->view('admin/login');
    }
}
