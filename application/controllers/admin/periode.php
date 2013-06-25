<?php defined('BASEPATH') OR exit('No direct script access allowed');

class periode extends CI_Controller
{
    private $view = "admin/master/periode";

    public function __construct ()
    {
        parent::__construct();
        if (! session('un'))
            redirect('admin/sessions/login');

        $this->load->model('periode_model','periode');
        $this->load->model('jalur_model','jalur');

        $this->data['jalur'] = $this->jalur->dropdown('nama_jalur');
        $this->data['page'] = 'periode';
        $this->data['breadcrumb'] = array(
            'Home' => 'admin',
            'Master' => 'admin/master',
            'Periode' => 'admin/periode',
        );
    }

    public function index()
    {
        $this->data['breadcrumb']['Daftar'] = null;
        $this->data['data'] = $this->periode->find_all();
        $this->data['yield'] = $this->view.'/list';
        $this->load->view('admin/layout', $this->data);
    }

    public function add ()
    {
        $this->data['breadcrumb']['Tambah'] = null;
        $this->data['yield'] = $this->view.'/add';

        // post new
        if (! is_get()) {
            $_data['nama_per'] = $this->input->post('nama');
            $_data['tgl_mulai'] = $this->input->post('tgl1');
            $_data['tgl_selesai'] = $this->input->post('tgl2');
            $_data['thn_ajaran'] = $this->input->post('thn');
            if ($result = $this->periode->insert($_data))
                redirect('admin/periode');
            else
                set_message(validation_errors(),'error');
        }
        $this->load->view('admin/layout', $this->data);
    }

    public function edit ($id = null)
    {
        $this->data['breadcrumb']['Edit'] = null;
        $this->data['yield'] = $this->view.'/edit';

        // post update
        if (! is_get()) {
            $_id = $this->input->post('id');
            $new_data = array(
                'nama_per' => $this->input->post('nama'),
                'tgl_mulai' => $this->input->post('tgl1'),
                'tgl_selesai' => $this->input->post('tgl2'),
                'thn_ajaran' => $this->input->post('thn'),
            );
            if ($result = $this->periode->update($_id,$new_data))
                redirect('admin/periode');
            else
                set_message(validation_errors(),'error');
        } else {
            if (! $id) {
                set_message('ID tidak boleh kosong','error');
                redirect('admin/periode');
            }
            $this->data['data'] = $this->periode->get_by('id',$id);
        }
        $this->load->view('admin/layout', $this->data);
    }

    public function delete ($id = null)
    {
        if (! $id) {
            set_message('ID tidak boleh kosong','error');
            redirect('admin/periode');
        }
        if ($this->periode->delete($id)) {
            set_message('Hapus data berhasil','info');
        } else {
            set_message('Hapus data gagal','error');
        }
        redirect('admin/periode');
    }
}
