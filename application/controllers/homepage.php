<?php defined('BASEPATH') OR exit('No direct script access allowed');

class homepage extends CI_Controller
{
    public function index()
    {
        if (! session('username') AND ! session('uid')) {
            $this->data['yield'] = 'index';
            $this->load->view('homepage', $this->data);
        } else {
            $this->load->model('pribadi_model','pribadi');
            $this->load->model('jadwal_model','jadwal');
            $this->data['uid'] = session('uid');
            $this->data['uname'] = session('username');

            $pribadi = $this->pribadi
                ->with('sekolahasal')
                ->with('ortu')
                ->with('pil1')
                ->with('pil2')
                ->with('provinsi')
                ->with('jalur')
                ->get_by('id_user', session('uid'));

            if (isset($pribadi['nama']))
                $this->data['data'] = $pribadi;
            else
                $this->data['data'] = false;

            $this->data['jadwal_pembayaran'] = $this->jadwal->get(1);

            $this->data['yield'] = 'user/index';
            $this->load->view('user/layout', $this->data);
        }
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
            $this->form_validation->set_rules('pass', 'Password', 'trim|required|matches[passConf]|min_length[6]');
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

    public function download ()
    {
        $this->load->model('dokumen_model', 'dokumen');

        $this->data['page'] = 'download';
        $this->data['data'] = $this->dokumen->get_many_by('active', '1');
        $this->data['yield'] = 'dokumen';
        $this->load->view('homepage', $this->data);
    }

    public function statik ($permalink = NULL)
    {
        $this->load->model('static_model', 'statik');
        $statik = $this->statik->get_by('permalink', $permalink);
        $this->data['data'] = $statik;
        $this->data['page'] = $statik->permalink;
        $this->data['yield'] = 'statik';
        $this->load->view('homepage', $this->data);
    }

}
