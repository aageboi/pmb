<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Pmb
{

    public function __construct()
    {
        $this->to =& get_instance();
    }

    public function get_avatar ()
    {
        if ($this->to->session->userdata('uid')) {
            $this->to->load->model('pribadi_model','pribadi');
            if ($user = $this->to->pribadi->get($this->to->session->userdata('uid'))) {
                if (! empty($user['foto']))
                    return base_url().'assets/img/upload/'.$user['foto'];
            }
        }

        return base_url().'assets/img/ava.jpg';
    }

}
