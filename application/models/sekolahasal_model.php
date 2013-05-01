<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sekolahasal_model extends MY_Model
{
    protected $_table = 't_sekolahasal';
    protected $return_type = 'array';
    // protected $primary_key = 'id';

    public $belongs_to = array('pribadi' =>
        array(
            'primary_key' => 'id_pribadi',
            'model' => 'pribadi_model'
        )
    );

}
