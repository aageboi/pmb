<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sessions extends CI_Controller {

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
}
