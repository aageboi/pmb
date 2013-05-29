<?php defined('BASEPATH') OR exit('No direct script access allowed');

class pelajaran extends CI_Controller
{
    private $view = "admin/master/pelajaran";

    public function __construct ()
    {
        parent::__construct();
        if (! session('un'))
            redirect('admin/sessions/login');

        $this->load->model('pelajaran_model','pelajaran');

        $this->data['page'] = 'pelajaran';
        $this->data['breadcrumb'] = array(
            'Home' => 'admin',
            'Master' => 'admin/master',
            'Pelajaran' => 'admin/pelajaran',
        );
    }

    public function index()
    {
        $this->data['breadcrumb']['Daftar'] = null;
        $this->data['data'] = $this->pelajaran->get_all();
        $this->data['yield'] = $this->view.'/list';
        $this->load->view('admin/layout', $this->data);
    }

    public function add ()
    {
        $this->data['breadcrumb']['Tambah'] = null;
        $this->data['yield'] = $this->view.'/add';

        // post new
        if (! is_get()) {
            $this->data['kriteria'] = $_data['kriteria'] = $this->input->post('kriteria');
            $this->data['nama'] = $_data['nama_pel'] = $this->input->post('nama');
            $kd_pel = ($this->input->post('ipa'))
                ? strtolower($this->input->post('ipa')) : 'ips';
            $this->data['ipa'] = $_data['kd_pel'] = $kd_pel;
            if ($result = $this->pelajaran->insert($_data))
                redirect('admin/pelajaran');
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
            $kd_pel = ($this->input->post('ipa'))
                ? strtolower($this->input->post('ipa')) : 'ips';
            $new_data = array(
                'kriteria' => $this->input->post('kriteria'),
                'nama_pel' => $this->input->post('nama'),
                'kd_pel' => $kd_pel,
            );
            if ($result = $this->pelajaran->update($_id,$new_data))
                redirect('admin/pelajaran');
            else
                set_message(validation_errors(),'error');
        } else {
            if (! $id) {
                set_message('ID tidak boleh kosong','error');
                redirect('admin/pelajaran');
            }
            $this->data['data'] = $this->pelajaran->get_by('id',$id);
        }
        $this->load->view('admin/layout', $this->data);
    }

    public function delete ($id = null)
    {
        if (! $id) {
            set_message('ID tidak boleh kosong','error');
            redirect('admin/pelajaran');
        }
        if ($this->pelajaran->delete($id)) {
            set_message('Hapus data berhasil','info');
        } else {
            set_message('Hapus data gagal','error');
        }
        redirect('admin/pelajaran');
    }
}
