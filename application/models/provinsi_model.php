<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Provinsi_model extends MY_Model
{
    protected $_table = 't_provinsi';
    protected $return_type = 'object';
    // protected $primary_key = 'kd_agama';

    public $belongs_to = array('pribadi' =>
        array(
            'primary_key' => 'id_pribadi',
            'model' => 'pribadi_model'
        )
    );

    protected $validate = array(
        array(
            'field'   => 'kode',
            'label'   => 'Kode',
            'rules'   => 'trim|required'
        ),
        array(
            'field'   => 'nama',
            'label'   => 'Provinsi',
            'rules'   => 'trim|required'
        )
    );
}
