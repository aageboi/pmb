<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ruang_model extends MY_Model
{
    protected $_table = 't_ruangujian';
    // protected $primary_key = 'kd_sumber';

    protected $validate = array(
        array(
            'field'   => 'nama',
            'label'   => 'Ruang Ujian',
            'rules'   => 'trim|required'
        ),
        array(
            'field'   => 'kapasitas',
            'label'   => 'Kapasitas',
            'rules'   => 'trim|required'
        )
    );

    public function find_all ()
    {
        $this->db->select('t_pelajaran.nama_pel,t_ruangujian.*');
        $this->db->join('t_pelajaran', 't_pelajaran.id = t_ruangujian.id_pelajaran');

        return $this->get_all();
    }
}
