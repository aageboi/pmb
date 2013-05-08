<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Pmb
{

    public function __construct()
    {
        $this->to =& get_instance();
    }

    public function get_avatar ($id = NULL)
    {
        $userid = ($id) ? $id : $this->to->session->userdata('uid');
        
        if ($userid) {
            $this->to->load->model('pribadi_model','pribadi');
            if ($user = $this->to->pribadi->get_by('id_user',$userid)) {
                if (! empty($user['foto']))
                    return base_url().'assets/img/upload/'.$user['foto'];
            }
        }

        return base_url().'assets/img/ava.jpg';
    }

    public function get_nomor_ujian ($id)
    {
        $this->to->load->model('pribadi_model','pribadi');
        if ($user = $this->to->pribadi->get($id)) {
            $jalur = $user['id_jalur'];

            $before_char = '';
            $len = strlen($id);
            for ($i=4; $i>$len; $i--) {
                $before_char .= '0';
            }
            return date('y').$jalur.$before_char.$id;
        }
    }
    
    public function is_registered ($id = NULL)
    {
        $userid = ($id) ? $id : $this->to->session->userdata('uid');
        
        if ($userid) {
            $this->to->load->model('pribadi_model','pribadi');
            if ($user = $this->to->pribadi->get_by('id_user',$userid))
                return TRUE;
        }

        return FALSE;
    }
    
    public function is_verified ($id = NULL)
    {
        $userid = ($id) ? $id : $this->to->session->userdata('uid');
        
        if ($userid) {
            $this->to->load->model('pribadi_model','pribadi');
            if ($user = $this->to->pribadi->get_by('id_user',$userid)) {
                if (! empty($user['is_verified']) && $user['is_verified'] == '1')
                    return TRUE;
            }
        }

        return FALSE;
    }
}
