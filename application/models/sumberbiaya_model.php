<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sumberbiaya_model extends MY_Model
{
    protected $_table = 't_sumberbiaya';
    // protected $primary_key = 'kd_sumber';

    protected $validate = array(
        array(
            'field'   => 'nama',
            'label'   => 'Sumber biaya',
            'rules'   => 'trim|required'
        )
    );
}
