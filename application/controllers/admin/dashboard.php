<?php defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller
{
    public function __construct ()
    {
        parent::__construct();
        if (! session('un'))
            redirect('admin/sessions/login');
    }

    public function index()
    {
        $this->load->view('admin/dashboard');
    }
}
