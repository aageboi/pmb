<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dokumen_model extends MY_Model
{
    protected $_table = 't_dokumen';
    // protected $primary_key = 'kd_sumber';

    protected $validate = array(
        array(
            'field'   => 'title',
            'label'   => 'Nama Dokumen',
            'rules'   => 'trim|required'
        )
    );
}
