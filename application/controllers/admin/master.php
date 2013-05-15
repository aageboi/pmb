<?php defined('BASEPATH') OR exit('No direct script access allowed');

class master extends CI_Controller
{
    private $view = "admin/master";

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

    public function agama ()
    {
        $this->load->model('agama_model','agama');

        $view = $this->view . '/agama';

        $data['page'] = 'agama';
        $data['breadcrumb'] = array(
            'Home' => 'admin',
            'Master' => 'admin/master',
            'Agama' => 'admin/master/agama',
        );

        $param  = func_get_args();
        $page   = isset($param[0]) ? $param[0] : NULL;
        $id     = isset($param[1]) ? $param[1] : NULL;

        // add
        if ($page == 'new') {
            $data['breadcrumb']['Tambah'] = null;
            // post new
            if (! is_get()) {
                $_data['agama'] = $this->input->post('nama');
                if ($result = $this->agama->insert($_data))
                    redirect('admin/master/agama');
                else
                    set_message(validation_errors(),'error');
            }
            $data['yield'] = $view.'/add';
        }

        // edit
        elseif ($page == 'edit') {
            $data['breadcrumb']['Edit'] = null;
            // post update
            if (! is_get()) {
                $_id = $this->input->post('id');
                $new_data = array(
                    'agama' => $this->input->post('nama'),
                );
                if ($result = $this->agama->update($_id,$new_data))
                    redirect('admin/master/agama');
                else
                    set_message(validation_errors(),'error');
            } else {
                if (! $id) {
                    set_message('ID tidak boleh kosong','error');
                    redirect('admin/master/agama');
                }
                $data['data'] = $this->agama->get_by('id',$id);
            }
            $data['yield'] = $view.'/edit';
        }

        // delete
        elseif ($page == 'delete') {
            if (! $id) {
                set_message('ID tidak boleh kosong','error');
                redirect('admin/master/agama');
            }
            if ($this->agama->delete($id)) {
                set_message('Hapus data berhasil','info');
            } else {
                set_message('Hapus data gagal','error');
            }
            redirect('admin/master/agama');
        }

        // list
        else {
            $data['breadcrumb']['Daftar'] = null;
            $data['data'] = $this->agama->get_all();
            $data['yield'] = $view.'/list';
        }
        $this->load->view('admin/layout', $data);
    }

    public function jenkel ()
    {
        $this->load->model('jenkel_model','jenkel');

        $view = $this->view . '/jenkel';

        $data['page'] = 'jenkel';
        $data['breadcrumb'] = array(
            'Home' => 'admin',
            'Master' => 'admin/master',
            'Jenis Kelamin' => 'admin/master/jenkel',
        );

        $param  = func_get_args();
        $page   = isset($param[0]) ? $param[0] : NULL;
        $id     = isset($param[1]) ? $param[1] : NULL;

        // add
        if ($page == 'new') {
            $data['breadcrumb']['Tambah'] = null;
            // post new
            if (! is_get()) {
                $_data['kd_jenkel'] = $this->input->post('kode');
                $_data['jenkel'] = $this->input->post('nama');
                if ($result = $this->jenkel->insert($_data))
                    redirect('admin/master/jenkel');
                else
                    set_message(validation_errors(),'error');
            }
            $data['yield'] = $view.'/add';
        }

        // edit
        elseif ($page == 'edit') {
            $data['breadcrumb']['Edit'] = null;
            // post update
            if (! is_get()) {
                $_id = $this->input->post('id');
                $new_data = array(
                    'kd_jenkel' => $this->input->post('kode'),
                    'jenkel' => $this->input->post('nama'),
                );
                if ($result = $this->jenkel->update($_id,$new_data))
                    redirect('admin/master/jenkel');
                else
                    set_message(validation_errors(),'error');
            } else {
                if (! $id) {
                    set_message('ID tidak boleh kosong','error');
                    redirect('admin/master/jenkel');
                }
                $data['data'] = $this->jenkel->get_by('id',$id);
            }
            $data['yield'] = $view.'/edit';
        }

        // delete
        elseif ($page == 'delete') {
            if (! $id) {
                set_message('ID tidak boleh kosong','error');
                redirect('admin/master/jenkel');
            }
            if ($this->jenkel->delete($id)) {
                set_message('Hapus data berhasil','info');
            } else {
                set_message('Hapus data gagal','error');
            }
            redirect('admin/master/jenkel');
        }

        // list
        else {
            $data['breadcrumb']['Daftar'] = null;
            $data['data'] = $this->jenkel->get_all();
            $data['yield'] = $view.'/list';
        }
        $this->load->view('admin/layout', $data);
    }
}
