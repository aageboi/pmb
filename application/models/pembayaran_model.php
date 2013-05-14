<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pembayaran_model extends MY_Model
{
    protected $_table = 't_pembayaran';

    protected $validate = array(
        array(
            'field'   => 'method',
            'label'   => 'Jenis Pembayaran Metode',
            'rules'   => 'trim|required'
        ),
        array(
            'field'   => 'to',
            'label'   => 'Tujuan Pembayaran',
            'rules'   => 'trim|required'
        ),
        array(
            'field'   => 'date',
            'label'   => 'Tanggal Pembayaran',
            'rules'   => 'trim|required'
        ),
        array(
            'field'   => 'amount',
            'label'   => 'Jumlah Pembayaran',
            'rules'   => 'trim|required'
        )
    );
}
