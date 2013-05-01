<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registrasi_model extends MY_Model
{
    protected $_table = 't_registrasi';
    // protected $primary_key = 'id';

    public $belongs_to = array('akun' =>
        array(
            'primary_key' => 'id_user',
            'model' => 'akun_model'
        )
    );

}
