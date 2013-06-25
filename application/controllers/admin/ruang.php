<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ruang extends CI_Controller
{
    private $view = "admin/master/ruang";

    public function __construct ()
    {
        parent::__construct();
        if (! session('un'))
            redirect('admin/sessions/login');

        $this->load->model('ruang_model','ruang');
        $this->load->model('pelajaran_model','pelajaran');

        $this->data['pelajaran'] = $this->pelajaran->dropdown('nama_pel');

        $this->data['page'] = 'ruang';
        $this->data['breadcrumb'] = array(
            'Home' => 'admin',
            'Master' => 'admin/master',
            'Ruang Ujian' => 'admin/ruang',
        );
    }

    public function index()
    {
        $this->data['breadcrumb']['Daftar'] = null;
        $this->data['data'] = $this->ruang->find_all();
        $this->data['yield'] = $this->view.'/list';
        $this->load->view('admin/layout', $this->data);
    }

    public function add ()
    {
        $this->data['breadcrumb']['Tambah'] = null;
        $this->data['yield'] = $this->view.'/add';

        // post new
        if (! is_get()) {
            $this->data['pelajaran'] = $_data['id_pelajaran'] = $this->input->post('pelajaran');
            $this->data['nama'] = $_data['nama_ruang'] = $this->input->post('nama');
            // $this->data['lokasi'] = $_data['lokasi'] = $this->input->post('lokasi');
            $this->data['kapasitas'] = $_data['kapasitas'] = $this->input->post('kapasitas');
            if ($result = $this->ruang->insert($_data))
                redirect('admin/ruang');
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
                'id_pelajaran' => $this->input->post('pelajaran'),
                'nama_ruang' => $this->input->post('nama'),
                // 'lokasi' => $this->input->post('lokasi'),
                'kapasitas' => $this->input->post('kapasitas'),
            );
            if ($result = $this->ruang->update($_id,$new_data))
                redirect('admin/ruang');
            else
                set_message(validation_errors(),'error');
        } else {
            if (! $id) {
                set_message('ID tidak boleh kosong','error');
                redirect('admin/ruang');
            }
            $this->data['data'] = $this->ruang->get_by('id',$id);
        }
        $this->load->view('admin/layout', $this->data);
    }

    public function delete ($id = null)
    {
        if (! $id) {
            set_message('ID tidak boleh kosong','error');
            redirect('admin/ruang');
        }
        if ($this->ruang->delete($id)) {
            set_message('Hapus data berhasil','info');
        } else {
            set_message('Hapus data gagal','error');
        }
        redirect('admin/ruang');
    }
}
