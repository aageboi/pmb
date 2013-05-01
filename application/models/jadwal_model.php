<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jadwal_model extends MY_Model
{
    protected $_table = 't_jadwalpembayaran';
    // protected $primary_key = 'kd_sumber';

    protected $validate = array(
        array(
            'field'   => 'jadwal',
            'label'   => 'Jadwal Pembayaran',
            'rules'   => 'trim|required'
        )
    );
}
