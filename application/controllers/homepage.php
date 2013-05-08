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
        $this->akun->skip_validation();
        
        if (! is_get()) {
            $this->form_validation->set_message('matches', 'Field %s tidak sama dengan %s.');
            $this->form_validation->set_message('required', '%s tidak boleh kosong');
            $this->form_validation->set_message('min_length', 'Minimal karakter untuk %s adalah %s');
            $this->form_validation->set_message('valid_email', 'Alamat email tidak valid');
            $this->form_validation->set_message('is_unique', '%s tidak tersedia. Silakan gunakan yg lainnya.');
            
            $this->form_validation->set_rules('nama', 'Nama', 'trim|required|min_length[5]');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[t_akun.email]');
            $this->form_validation->set_rules('pass', 'Password', 'trim|required|matches[passConf]');
            $this->form_validation->set_rules('passConf', 'Ulangi Password', 'trim|required');

            if ($this->form_validation->run() == TRUE) {
                $signup['nama_akun'] = $this->input->post('nama');
                $signup['email'] = $this->input->post('email');
                $signup['password'] = md5($this->input->post('pass'));

                if ($result = $this->akun->insert($signup)) {
                    set_message('Akun baru berhasil dibuat. Silakan cek email anda untuk aktivasi akun.');
                    redirect('login');
                } else {
                    set_message('Akun baru gagal dibuat.', 'error');
                }
            }

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
