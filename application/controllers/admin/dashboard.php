<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct ()
    {
        parent::__construct();
        if (! session('un'))
            redirect('admin/sessions/login');
    }

    public function index()
    {
        $data['yield'] = 'admin/dashboard';
        $this->load->view('admin/layout', $data);
    }
}
