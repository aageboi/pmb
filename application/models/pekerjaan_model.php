<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pekerjaan_model extends MY_Model
{
    protected $_table = 't_pekerjaan';
    // protected $primary_key = 'kd_sumber';

    protected $validate = array(
        array(
            'field'   => 'nama',
            'label'   => 'Pekerjaan',
            'rules'   => 'trim|required'
        )
    );
}
