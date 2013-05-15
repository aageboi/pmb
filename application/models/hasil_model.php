<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hasil_model extends MY_Model
{
    protected $_table = 't_hasil';

    public function find_all ($param = array())
    {
        $this->db->select("s.isi_soal, s.jawaban as kuncijawaban, t_hasil.*");
        $this->db->join('t_banksoal s', 's.id=t_hasil.id_soal');

        return $this->get_many_by($param);
    }
}
