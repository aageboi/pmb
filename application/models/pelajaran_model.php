<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pelajaran_model extends MY_Model
{
    protected $_table = 't_pelajaran';
    // protected $primary_key = 'kd_agama';

    protected $validate = array(
        // array(
            // 'field'   => 'kode',
            // 'label'   => 'Kode',
            // 'rules'   => 'trim|required'
        // ),
        array(
            'field'   => 'nama',
            'label'   => 'Pelajaran',
            'rules'   => 'trim|required'
        ),
        array(
            'field'   => 'kriteria',
            'label'   => 'Kriteria Kelulusan',
            'rules'   => 'trim|required'
        )
    );
}
