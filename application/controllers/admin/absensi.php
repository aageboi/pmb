<?php defined('BASEPATH') OR exit('No direct script access allowed');

class absensi extends CI_Controller
{
    private $view = "admin/data/absensi";
    private $data;

    public function __construct ()
    {
        parent::__construct();
        if (! session('un'))
            redirect('admin/sessions/login');

        $this->load->model('pribadi_model','pribadi');

        $this->data['page'] = 'absensi';
        $this->data['breadcrumb'] = array(
            'Home' => 'admin',
            'Data' => 'admin/absensi',
            'Absensi' => 'admin/absensi',
        );
    }

    public function index ($print = NULL)
    {
        $this->load->model('periode_model', 'periode');
        $this->data['periode'] = $this->periode->get_all();
        $this->data['breadcrumb']['Daftar'] = NULL;

        if ($this->input->get('periode')) {
            $periode = explode('/',urldecode($this->input->get('periode')));
            $tgl_mulai      = $periode[0].' 00:00:00';
            $tgl_selesai    = $periode[1].' 23:59:59';
            $this->db->where('created_at >=', $tgl_mulai);
            $this->db->where('created_at <=', $tgl_selesai);
            $this->data['data'] = $this->pribadi->get_many();
        } else {
            $this->data['data'] = $this->pribadi->get_many_by('is_verified', '1');
        }

        if ($print == 'cetak') {
            $this->data['yield'] = $this->view.'/list_cetak';
            $this->load->view('admin/layout_print', $this->data);
        } else {
            $this->data['yield'] = $this->view.'/list';
            $this->load->view('admin/layout', $this->data);
        }
    }

    public function cetak ()
    {
        $this->index('cetak');
    }
}
