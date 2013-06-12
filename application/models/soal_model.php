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

    public function _find_question ($prodi = 'ips')
    {
        $soal = array();

        if ($prodi == 'ips')
            $this->db->where('kd_pel', $prodi);

        if ($result = $this->db->get('t_pelajaran')->result()) {
            $i = 0;
            foreach ($result as $key => $row) {
                $soal['nama_pel'][$i] = $row->nama_pel;
                $this->db->order_by('t_banksoal.id', 'random');
                $this->db->limit(20);
                $soal['soal'][$i] = $this->get_many_by('id_pelajaran', $row->id);
                $i++;
            }
        }

        return $soal;
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
                $this->db->limit($row->jumlah_soal);
                $limit_mudah = floor((20*$row->jumlah_soal)/100);
                $limit_sedang = floor((60*$row->jumlah_soal)/100);
                $limit_sukar = floor((20*$row->jumlah_soal)/100);
                
                $rs = $this->db->query("
                    (SELECT * FROM {$this->_table}
                    WHERE id_pelajaran = {$row->id} and tingkat = 1
                    limit {$limit_mudah})

                    union all

                    (SELECT * FROM {$this->_table}
                    WHERE id_pelajaran = {$row->id} and tingkat = 2
                    limit {$limit_sedang})

                    union all

                    (SELECT * FROM {$this->_table}
                    WHERE id_pelajaran = {$row->id} and tingkat = 3
                    limit {$limit_sukar})

                    ORDER BY RAND()
                ");
                $soal['soal'][$i] = $rs->result();
                $rs->free_result();
                $i++;
            }
        }

        return $soal;
    }
}
