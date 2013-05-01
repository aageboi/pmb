<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Akun_model extends MY_Model
{
    protected $_table = 't_akun';
    // protected $primary_key = 'kd_agama';

    protected $validate = array(
        array(
            'field'   => 'nama',
            'label'   => 'Username',
            'rules'   => 'trim|required'
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

    public $has_many = array('registrasi' =>
        array(
            'primary_key' => 'id_user',
            'model' => 'registrasi_model'
        )
    );
}
