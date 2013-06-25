<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ortu_model extends MY_Model
{
    protected $_table = 't_ortu';
    protected $return_type = 'array';
    // protected $primary_key = 'id';

    public $belongs_to = array('pribadi' =>
        array(
            'primary_key' => 'id_pribadi',
            'model' => 'pribadi_model'
        )
    );

    protected $validate = array(
        array(
            'field'   => 'ortu',
            'label'   => 'Orang tua',
            'rules'   => 'trim|required'
        ),
        array(
            'field'   => 'nama_ortu',
            'label'   => 'Nama Orang Tua',
            'rules'   => 'trim|required'
        ),
        array(
            'field'   => 'tgl_ortu',
            'label'   => 'Tanggal Lahir Orang Tua',
            'rules'   => 'trim|required'
        ),
        array(
            'field'   => 'thn_ortu',
            'label'   => 'Tahun Lahir Orang Tua',
            'rules'   => 'trim|required'
        ),
        array(
            'field'   => 'bln_ortu',
            'label'   => 'Bulan Lahir Orang Tua',
            'rules'   => 'trim|required'
        ),
        array(
            'field'   => 'alamat_ortu',
            'label'   => 'Alamat Orang Tua',
            'rules'   => 'trim|required'
        ),
        array(
            'field'   => 'kelurahan_ortu',
            'label'   => 'Kelurahan Orang Tua',
            'rules'   => 'trim|required'
        ),
        array(
            'field'   => 'rt_ortu',
            'label'   => 'RT Orang Tua',
            'rules'   => 'trim|required'
        ),
        array(
            'field'   => 'rw_ortu',
            'label'   => 'RW Orang Tua',
            'rules'   => 'trim|required'
        ),
        array(
            'field'   => 'kota_ortu',
            'label'   => 'Kota Orang Tua',
            'rules'   => 'trim|required'
        ),
        array(
            'field'   => 'kodepos_ortu',
            'label'   => 'Kodepos Orang Tua',
            'rules'   => 'trim|required'
        ),
        array(
            'field'   => 'telp_ortu',
            'label'   => 'Telpon Orang Tua',
            'rules'   => 'trim|required'
        ),
    );
}
