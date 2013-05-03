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
        $this->session->unset_userdata('uid');
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
        $this->load->library('form_validation');
        $this->load->model('akun_model', 'akun');
        if (! is_get()) {

            // $this->form_validation->set_rules('username', 'Username', 'required|min_length[6]|alpha_numeric');
            // $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            // $this->form_validation->set_rules('password', 'Password', 'required');

            // if ($this->form_validation->run() == TRUE) {
                $signup['nama_akun'] = $this->input->post('nama');
                $signup['email'] = $this->input->post('email');
                $signup['password'] = md5($this->input->post('pass'));

                if ($result = $this->akun->insert($signup)) {
                    set_message('Akun baru berhasil dibuat. Silakan cek email anda untuk aktivasi akun.');
                    redirect('login');
                } else {
                    set_message('Akun baru gagal dibuat.', 'error');

                    // echo $this->db->last_query();//die;
                    // var_dump($result);
                    // debug($result, 1);
                }
            // }

        }
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
