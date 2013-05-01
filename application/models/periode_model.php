<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Periode_model extends MY_Model
{
    protected $_table = 't_periode';
    // protected $primary_key = 'kd_agama';

    // public $has_many = array('prodi' => array('primary_key' => 'kd_periode'));

    protected $validate = array(
        array(
            'field'   => 'kode',
            'label'   => 'Kode Periode',
            'rules'   => 'trim|required'
        ),
        array(
            'field'   => 'periode',
            'label'   => 'Periode',
            'rules'   => 'trim|required'
        ),
        array(
            'field'   => 'jalur',
            'label'   => 'Jalur Pendaftaran',
            'rules'   => 'trim|required'
        )
    );

    public function find_all ()
    {
        $this->db->join('t_jalurpendaftaran', 't_jalurpendaftaran.id = t_periode.id_jalur');
        return $this->get_all();
    }

}
