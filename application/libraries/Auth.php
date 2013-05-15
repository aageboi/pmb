<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Auth
{

    public function __construct()
    {
        $this->to =& get_instance();
    }

    public function authenticate ($email, $password, $role = 'user')
    {
        $this->to->load->model('akun_model','akun');
        if (! $email || ! $password) {
            set_message('Email dan Password tidak boleh kosong','error');

            return false;
        }

        // if ($username == 'aageboi' && $password == 'detikcom')
            // return true;

        if ($user = $this->to->akun->get_by('email',strtolower($email))) {
            if ($user->password != md5($password)) {
                set_message('Password anda salah','error');

                return false;
            }

            if ($user->status != '1') {
                set_message('Akun anda belum aktif','error');

                return false;
            }

            if ($role == 'admin') {
                if ($user->role != 'superadmin' && $user->role != 'admin') {
                    set_message('User anda tidak diperbolehkan mengakses halaman ini.','error');

                    return false;
                } else {
                    set_session("un", $user->nama_akun);
                    set_session("aid", $user->id);
                    set_session("role", strtolower($user->role));
                }
            } else {
                if ($user->role == 'user') {
                    set_session("username", $user->nama_akun);
                    set_session("uid", $user->id);
                    set_session("role", 'user');
                } else {
                    set_message('Untuk admin silakan login di dashboard admin.','error');

                    return false;
                }
            }

            return true;
        } else {
            set_message('Email tidak ditemukan','error');

            return false;
        }

        set_message('Email atau Password Anda salah','error');

        return false;
    }

}
