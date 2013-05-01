<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Statusnikah_model extends MY_Model
{
    protected $_table = 't_statusnikah';
    // protected $primary_key = 'kd_sumber';

    protected $validate = array(
        array(
            'field'   => 'nama',
            'label'   => 'Status',
            'rules'   => 'trim|required'
        )
    );
}
