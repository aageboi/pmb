<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pribadi_model extends MY_Model
{
    protected $_table = 't_pribadi';
    protected $return_type = 'array';
    // protected $primary_key = 'id';

    public $belongs_to = array(
        'provinsi' => array(
            'primary_key' => 'id_provinsi',
            'model' => 'provinsi_model'
        ),
        'jalur' => array(
            'primary_key' => 'id_jalur',
            'model' => 'jalur_model'
        ),
        'pil1' => array(
            'primary_key' => 'pil_1',
            'model' => 'prodi_model'
        ),
        'pil2' => array(
            'primary_key' => 'pil_2',
            'model' => 'prodi_model'
        ),
        'ortu' => array(
            'primary_key' => 'id_ortu',
            'model' => 'ortu_model'
        ),
        'sekolahasal' => array(
            'primary_key' => 'id_sekolah',
            'model' => 'sekolahasal_model'
        ),
        'ruang' => array(
            'primary_key' => 'id_ruang',
            'model' => 'ruang_model'
        ),
    );

    protected $validate = array(
        array(
            'field'   => 'nama',
            'label'   => 'Nama Calon Mahasiswa',
            'rules'   => 'trim|required'
        ),
        array(
            'field'   => 'tempat',
            'label'   => 'Tempat Lahir',
            'rules'   => 'trim|alpha|required'
        ),
        array(
            'field'   => 'tgl',
            'label'   => 'Tanggal Lahir',
            'rules'   => 'trim|required'
        ),
        array(
            'field'   => 'bln',
            'label'   => 'Bulan Lahir',
            'rules'   => 'trim|required'
        ),
        array(
            'field'   => 'thn',
            'label'   => 'Tahun Lahir',
            'rules'   => 'trim|required'
        ),
        array(
            'field'   => 'alamat',
            'label'   => 'Alamat',
            'rules'   => 'trim|required'
        ),
        array(
            'field'   => 'kelurahan',
            'label'   => 'Kelurahan',
            'rules'   => 'trim|required'
        ),
        array(
            'field'   => 'rt',
            'label'   => 'RT',
            'rules'   => 'trim|required'
        ),
        array(
            'field'   => 'rw',
            'label'   => 'RW',
            'rules'   => 'trim|required'
        ),
        array(
            'field'   => 'kota',
            'label'   => 'Kota',
            'rules'   => 'trim|required'
        ),
        array(
            'field'   => 'kodepos',
            'label'   => 'Kodepos',
            'rules'   => 'trim|required'
        ),
        array(
            'field'   => 'telp',
            'label'   => 'Telpon',
            'rules'   => 'trim|required'
        ),
        array(
            'field'   => 'hp',
            'label'   => 'Nomor HP',
            'rules'   => 'trim|required'
        ),
    );

    // public $has_many => array(
        // 'pembayaran' => array(
            // 'model' => 'pembayaran_model'
        // )
    // );

    // masih ada bug di function with() nya MY_MODEL
    public function find ($userid = NULL)
    {
        if (! $userid)
            return false;

        $this->db->select(
            't_pribadi.*,s.*,b.*,'.
            'o.nama as nama_ortu,'
        );
        $this->db->join('t_provinsi p', 't_pribadi.id_provinsi = p.id');
        $this->db->join('t_ortu o', 't_pribadi.id = o.id_pribadi');
        $this->db->join('t_sekolahasal s', 't_pribadi.id = s.id_pribadi');
        $this->db->join('t_pembayaran b', 't_pribadi.id = b.id_akun');

        return $this->as_array()->get_by('id_user',$userid);
    }

}
