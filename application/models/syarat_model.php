<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Syarat_model extends MY_Model
{
    protected $_table = 't_syaratpendaftaran';
    // protected $primary_key = 'kd_agama';

    protected $validate = array(
        array(
            'field'   => 'nama',
            'label'   => 'Syarat Pendaftaran',
            'rules'   => 'trim|required'
        )
    );
}
