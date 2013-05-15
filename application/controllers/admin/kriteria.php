<?php defined('BASEPATH') OR exit('No direct script access allowed');

class kriteria extends CI_Controller
{
    private $view = "admin/master/kriteria";

    public function __construct ()
    {
        parent::__construct();
        if (! session('un'))
            redirect('admin/sessions/login');

        $this->load->model('kriteria_model','kriteria');
        $this->load->model('pelajaran_model','pelajaran');

        $this->data['pelajaran'] = $this->pelajaran->dropdown('nama_pel');
        $this->data['page'] = 'kriteria';
        $this->data['breadcrumb'] = array(
            'Home' => 'admin',
            'Master' => 'admin/master',
            'Kriteria Kelulusan' => 'admin/kriteria',
        );
    }

    public function index()
    {
        $this->data['breadcrumb']['Daftar'] = null;
        $this->data['data'] = $this->kriteria->find_all();
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
            $this->data['kriteria'] = $_data['kriteria'] = $this->input->post('kriteria');
            if ($result = $this->kriteria->insert($_data))
                redirect('admin/kriteria');
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
                'kriteria' => $this->input->post('kriteria'),
            );
            if ($result = $this->kriteria->update($_id,$new_data))
                redirect('admin/kriteria');
            else
                set_message(validation_errors(),'error');
        } else {
            if (! $id) {
                set_message('ID tidak boleh kosong','error');
                redirect('admin/kriteria');
            }
            $this->data['data'] = $this->kriteria->get_by('id',$id);
        }
        $this->load->view('admin/layout', $this->data);
    }

    public function delete ($id = null)
    {
        if (! $id) {
            set_message('ID tidak boleh kosong','error');
            redirect('admin/kriteria');
        }
        if ($this->kriteria->delete($id)) {
            set_message('Hapus data berhasil','info');
        } else {
            set_message('Hapus data gagal','error');
        }
        redirect('admin/kriteria');
    }
}
