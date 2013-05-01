<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Soal_model extends MY_Model
{
    protected $_table = 't_banksoal';
    // protected $primary_key = 'kd_agama';

    protected $validate = array(
        array(
            'field'   => 'pel',
            'label'   => 'Pelajaran',
            'rules'   => 'trim|required'
        ),
        array(
            'field'   => 'soal',
            'label'   => 'Soal',
            'rules'   => 'trim|required'
        )
    );

    public function find_all ()
    {
        $this->db->select('*,t_banksoal.id,pel.id as id_pel');
        $this->db->join('t_pelajaran pel', 'pel.id = t_banksoal.id_pelajaran');
        return $this->get_all();
    }
}
