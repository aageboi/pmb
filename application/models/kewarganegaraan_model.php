<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kewarganegaraan_model extends MY_Model
{
    protected $_table = 't_kewarganegaraan';
    // protected $primary_key = 'kd_agama';

    protected $validate = array(
        // array(
            // 'field'   => 'kode',
            // 'label'   => 'Kode',
            // 'rules'   => 'trim|required'
        // ),
        array(
            'field'   => 'nama',
            'label'   => 'Kewarganegaraan',
            'rules'   => 'trim|required'
        )
    );
}
