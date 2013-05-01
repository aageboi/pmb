<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jalur_model extends MY_Model
{
    protected $_table = 't_jalurpendaftaran';
    protected $return_type = 'object';
    // protected $primary_key = 'id';

    // public $belongs_to = array('pribadi' =>
        // array(
            // 'primary_key' => 'id_pribadi',
            // 'model' => 'pribadi_model'
        // )
    // );

    protected $validate = array(
        array(
            'field'   => 'nama',
            'label'   => 'Nama Jalur Pendaftaran',
            'rules'   => 'trim|required'
        )
    );
}
