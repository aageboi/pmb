<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jenkel_model extends MY_Model
{
    protected $_table = 't_jeniskelamin';
    // protected $primary_key = 'kd_agama';

    protected $validate = array(
        array(
            'field'   => 'kode',
            'label'   => 'Kode Jenis Kelamin',
            'rules'   => 'trim|required'
        ),
        array(
            'field'   => 'nama',
            'label'   => 'Jenis Kelamin',
            'rules'   => 'trim|required'
        )
    );
}
