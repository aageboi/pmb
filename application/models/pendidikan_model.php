<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pendidikan_model extends MY_Model
{
    protected $_table = 't_pendidikanterakhir';
    // protected $primary_key = 'kd_sumber';

    protected $validate = array(
        array(
            'field'   => 'nama',
            'label'   => 'Pendidikan Terakhir',
            'rules'   => 'trim|required'
        )
    );
}
