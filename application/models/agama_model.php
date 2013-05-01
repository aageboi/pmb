<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agama_model extends MY_Model
{
    protected $_table = 't_agama';
    // protected $primary_key = 'kd_agama';

    protected $validate = array(
        array(
            'field'   => 'nama',
            'label'   => 'Agama',
            'rules'   => 'trim|required'
        )
    );
}
