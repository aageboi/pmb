<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jurusan_model extends MY_Model
{
    protected $_table = 't_jurusansmta';
    // protected $primary_key = 'kd_agama';

    protected $validate = array(
        array(
            'field'   => 'kode',
            'label'   => 'Kode',
            'rules'   => 'trim|required'
        ),
        array(
            'field'   => 'nama',
            'label'   => 'Jurusan',
            'rules'   => 'trim|required'
        )
    );
}
