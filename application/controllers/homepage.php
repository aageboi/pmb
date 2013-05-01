<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {

    public function index()
    {
        $this->data['yield'] = 'index';
        $this->load->view('homepage', $this->data);
    }

    public function login ()
    {
        if (! is_get()) {
            $this->load->library('auth');
            $this->data['email'] = $email = $this->input->post('username');
            $password = $this->input->post('password');
            if ($this->auth->authenticate($email, $password)) {
                set_session("em", $email);
                set_message('Login berhasil!', 'info');
                redirect('dashboard');
            }
        }
        $this->data['yield'] = 'login';
        $this->load->view('login', $this->data);
    }

    public function logout ()
    {
        $this->session->unset_userdata('em');
        $this->session->unset_userdata('username');
        set_message('Anda telah logout');
        redirect();
    }

    public function forgot ()
    {
        $this->data['yield'] = 'forgotpassword';
        $this->load->view('homepage', $this->data);
    }

    public function signup ()
    {
        $this->data['yield'] = 'signup';
        $this->load->view('homepage', $this->data);
    }

    public function petunjuk ()
    {
        $this->data['page'] = 'petunjuk';
        $this->data['yield'] = 'petunjuk';
        $this->load->view('homepage', $this->data);
    }

    public function pengumuman ()
    {
        $this->data['page'] = 'pengumuman';
        $this->data['yield'] = 'pengumuman';
        $this->load->view('homepage', $this->data);
    }

}
