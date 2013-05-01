<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kodesekolah_model extends MY_Model
{
    protected $_table = 't_sekolah';
    // protected $primary_key = 'kd_sumber';

    public $belongs_to = array('provinsi' => array('model' => 'provinsi_model', 'primary_key' => 'id_provinsi'));

    protected $validate = array(
        array(
            'field'   => 'nama',
            'label'   => 'Nama Sekolah',
            'rules'   => 'trim|required'
        )
    );
}
