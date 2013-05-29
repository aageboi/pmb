<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prodi_model extends MY_Model
{
    protected $_table = 't_prodi';
    // protected $primary_key = 'kd_agama';

    // public $belongs_to = array('periode' =>
        // array(
            // 'primary_key' => 'kd_periode',
            // 'model' => 'periode_model'
        // )
    // );

    public $belongs_to = array(
        'pribadi' => array(
            'primary_key' => 'id_pribadi',
            'model' => 'pribadi_model'
        ),
    );

    protected $validate = array(
        array(
            'field'   => 'kode',
            'label'   => 'Kode Program Studi',
            'rules'   => 'trim|required'
        ),
        array(
            'field'   => 'nama',
            'label'   => 'Nama Program Studi',
            'rules'   => 'trim|required'
        )
    );
}
