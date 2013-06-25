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
        $this->data['breadcrumb']['Daftar'] = NULL;
        $this->data['data'] = $this->pribadi->get_many_by('is_verified', '1');

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
