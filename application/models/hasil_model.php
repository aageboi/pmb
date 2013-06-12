<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hasil_model extends MY_Model
{
    protected $_table = 't_hasil';

    public function find_all ($param = array())
    {
        $soal = array();

        if ($result = $this->db->get('t_pelajaran')->result()) {
            $i = 0;
            foreach ($result as $key => $row) {
                $soal['pelajaran'][$i]['id'] = $row->id;
                $soal['pelajaran'][$i]['nama'] = $row->nama_pel;
                $soal['pelajaran'][$i]['kriteria'] = $row->kriteria;
                $this->db->select("s.id_pelajaran as mapel,s.isi_soal,s.jawaban as kuncijawaban,t_hasil.*");
                $this->db->join('t_banksoal s', 's.id=t_hasil.id_soal');
                $soal['soal'][$i] = $this->get_many_by($param);
                $i++;
            }
        }

        // debug($soal);

        return $soal;
    }

    public function find_user ()
    {
        $this->db->distinct('p.id');
        $this->db->select('p.*');
        $this->db->join('t_hasil h', 'h.id_pribadi = p.id_user');
        $this->db->order_by('p.nomor_ujian', 'asc');
        $rs = $this->db->get('t_pribadi p');
        $data = $rs->result();
        $rs->free_result();
        return $data;
    }
}
