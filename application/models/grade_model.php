<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Grade_model extends MY_Model
{
    protected $_table = 't_grade';
    // protected $primary_key = 'kd_sumber';

    protected $validate = array(
        array(
            'field'   => 'max',
            'label'   => 'Nilai Maximum',
            'rules'   => 'trim|required'
        ),
        array(
            'field'   => 'min',
            'label'   => 'Nilai Minimum',
            'rules'   => 'trim|required'
        ),
        array(
            'field'   => 'nama',
            'label'   => 'Nama Grade',
            'rules'   => 'trim|required'
        )
    );
}
