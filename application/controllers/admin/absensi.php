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

    public function index()
    {
        $this->data['breadcrumb']['Daftar'] = null;
        $this->data['data'] = $this->pribadi->get_many_by('is_verified', '1');
        $this->data['yield'] = $this->view.'/list';
        $this->load->view('admin/layout', $this->data);
    }
}
