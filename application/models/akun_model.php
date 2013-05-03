<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Akun_model extends MY_Model
{
    protected $_table = 't_akun';
    // protected $primary_key = 'kd_agama';

    protected $validate = array(
        array(
            'field'   => 'nama',
            'label'   => 'Username',
            'rules'   => 'trim|required|min_length[6]|alpha_numeric|is_unique[t_akun.nama_akun]'
        ),
        array(
            'field'   => 'pass',
            'label'   => 'Password',
            'rules'   => 'trim|required'
        ),
        array(
            'field'   => 'email',
            'label'   => 'Alamat Email',
            'rules'   => 'trim|required|is_unique[t_akun.email]'
        )
    );
}
