<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Static_model extends MY_Model
{
    protected $_table = 't_static';

    protected $validate = array(
        array(
            'field'   => 'title',
            'label'   => 'Judul',
            'rules'   => 'trim|required'
        ),
        array(
            'field'   => 'content',
            'label'   => 'Isi',
            'rules'   => 'trim|required'
        )
    );
}
