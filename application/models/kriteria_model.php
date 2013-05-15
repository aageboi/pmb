<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kriteria_model extends MY_Model
{
    protected $_table = 't_kriteriakelulusan';
    // protected $primary_key = 'kd_sumber';

    protected $validate = array(
        array(
            'field'   => 'kriteria',
            'label'   => 'Kriteria Kelulusan',
            'rules'   => 'trim|required'
        )
    );

    public function find_all ()
    {
        $this->db->join('t_pelajaran', 't_pelajaran.id = t_kriteriakelulusan.id_pelajaran');

        return $this->get_all();
    }
}
