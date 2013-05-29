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

    public $belongs_to = array(
        'pelajaran' => array(
            'primary_key' => 'id_pelajaran',
            'model' => 'pelajaran_model'
        ),
    );

    public function find_all ($idpel = NULL)
    {
        $this->db->select('*,t_banksoal.id,pel.id as id_pel');
        $this->db->join('t_pelajaran pel', 'pel.id = t_banksoal.id_pelajaran');
        if ($idpel)
        $this->db->where('t_banksoal.id_pelajaran', $idpel);
        $this->db->order_by('t_banksoal.id', 'random');

        return $this->get_all();
    }

    public function find_question ($prodi = 'ips')
    {
        $soal = array();

        if ($prodi == 'ips')
            $this->db->where('kd_pel', $prodi);

        if ($result = $this->db->get('t_pelajaran')->result()) {
            $i = 0;
            foreach ($result as $key => $row) {
                $soal['nama_pel'][$i] = $row->nama_pel;
                $soal['soal'][$i] = $this->get_many_by('id_pelajaran', $row->id);
                $i++;
            }
        }

        return $soal;
    }
}
