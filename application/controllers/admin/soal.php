<?php defined('BASEPATH') OR exit('No direct script access allowed');

class soal extends CI_Controller
{
    private $view = "admin/data/soal";

    public function __construct ()
    {
        parent::__construct();
        if (! session('un'))
            redirect('admin/sessions/login');

        $this->load->model('soal_model','soal');
        $this->load->model('pelajaran_model','pelajaran');

        $this->data['pelajaran'] = $this->pelajaran->dropdown('nama_pel');
        $this->data['page'] = 'soal';
        $this->data['breadcrumb'] = array(
            'Home' => 'admin',
            'Data' => 'admin/soal',
            'Bank Soal' => 'admin/soal',
        );
    }

    public function index()
    {
        $this->data['breadcrumb']['Daftar'] = null;
        $this->data['data'] = $this->soal->find_all();
        $this->data['yield'] = $this->view.'/list';
        $this->load->view('admin/layout', $this->data);
    }

    public function add ()
    {
        $this->data['breadcrumb']['Tambah'] = null;
        $this->data['yield'] = $this->view.'/add';

        // post new
        if (! is_get()) {
            $this->data['pelajaran'] = $_data['id_pelajaran'] = $this->input->post('pel');
            $this->data['soal'] = $_data['isi_soal'] = $this->input->post('soal');
            $this->data['pilihan_a'] = $_data['isi_pilihan_a'] = $this->input->post('pilihan_a');
            $this->data['pilihan_b'] = $_data['isi_pilihan_b'] = $this->input->post('pilihan_b');
            $this->data['pilihan_c'] = $_data['isi_pilihan_c'] = $this->input->post('pilihan_c');
            $this->data['pilihan_d'] = $_data['isi_pilihan_d'] = $this->input->post('pilihan_d');
            $this->data['jawaban'] = $_data['jawaban'] = $this->input->post('jawaban');
            $this->data['tipe'] = $_data['tingkat'] = $this->input->post('tipe');
            // $this->data['urut'] = $_data['no_urut'] = $this->input->post('urut');
            if ($result = $this->soal->insert($_data))
                redirect('admin/soal');
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
                'id_pelajaran' => $this->input->post('pel'),
                'isi_soal' => $this->input->post('soal'),
                'isi_pilihan_a' => $this->input->post('pilihan_a'),
                'isi_pilihan_b' => $this->input->post('pilihan_b'),
                'isi_pilihan_c' => $this->input->post('pilihan_c'),
                'isi_pilihan_d' => $this->input->post('pilihan_d'),
                'jawaban' => $this->input->post('jawaban'),
                'tingkat' => $this->input->post('tipe'),
                // 'no_urut' => $this->input->post('urut'),
            );
            if ($result = $this->soal->update($_id,$new_data))
                redirect('admin/soal');
            else
                set_message(validation_errors(),'error');
        } else {
            if (! $id) {
                set_message('ID tidak boleh kosong','error');
                redirect('admin/soal');
            }
            $this->data['data'] = $this->soal->get_by('id',$id);
        }
        $this->load->view('admin/layout', $this->data);
    }

    public function delete ($id = null)
    {
        if (! $id) {
            set_message('ID tidak boleh kosong','error');
            redirect('admin/soal');
        }
        if ($this->soal->delete($id)) {
            set_message('Hapus data berhasil','info');
        } else {
            set_message('Hapus data gagal','error');
        }
        redirect('admin/soal');
    }
}
