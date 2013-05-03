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
            if ($user = $this->to->pribadi->get_by('id_user',$this->to->session->userdata('uid'))) {
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

}
