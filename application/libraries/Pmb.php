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
            $this->to->load->model('prodi_model','prodi');
            $prodi = $this->to->prodi->get($user['pil_1']);
            // $jalur = $user['id_jalur'];

            $before_char = '';
            $len = strlen($id);
            for ($i=4; $i>$len; $i--) {
                $before_char .= '0';
            }

            // return date('y').$jalur.$before_char.$id;
            return $prodi->kd_prodi.$before_char.$id;
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

    public function registrasi_id ($id = NULL)
    {
        $userid = ($id) ? $id : $this->to->session->userdata('uid');

        if ($userid) {
            $this->to->load->model('pribadi_model', 'pribadi');
            if ($reg = $this->to->pribadi->get_by('id_user', $userid)) {
                return $reg['id'];
            }
        }

        return FALSE;
    }

    public function get_mapel ($id)
    {
        $this->to->load->model('pelajaran_model', 'pel');
        if ($pel = $this->to->pel->get($id))
            return $pel->nama_pel;
        return false;
    }

    public function already_test ($id = NULL)
    {
        $this->to->load->model('hasil_model', 'hasil');
        if ($already = $this->to->hasil->get_by('id_pribadi', $this->registrasi_id($id)))
            return TRUE;
        return FALSE;
    }
}
