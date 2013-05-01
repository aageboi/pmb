<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ortu_model extends MY_Model
{
    protected $_table = 't_ortu';
    protected $return_type = 'array';
    // protected $primary_key = 'id';

    public $belongs_to = array('pribadi' =>
        array(
            'primary_key' => 'id_pribadi',
            'model' => 'pribadi_model'
        )
    );
}
