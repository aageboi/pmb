<?php defined('BASEPATH') OR exit('No direct script access allowed');

class prodi extends CI_Controller
{
    private $view = "admin/master/prodi";

    public function __construct ()
    {
        parent::__construct();
        if (! session('un'))
            redirect('admin/sessions/login');

        $this->load->model('prodi_model','prodi');

        $this->data['page'] = 'prodi';
        $this->data['breadcrumb'] = array(
            'Home' => 'admin',
            'Master' => 'admin/master',
            'Program Studi' => 'admin/prodi',
        );
    }

    public function index()
    {
        $this->data['breadcrumb']['Daftar'] = null;
        $this->data['data'] = $this->prodi->with('periode')->get_all();
        $this->data['yield'] = $this->view.'/list';
        $this->load->view('admin/layout', $this->data);
    }

    public function add ()
    {
        $this->data['breadcrumb']['Tambah'] = null;
        $this->data['yield'] = $this->view.'/add';

        $this->load->model('jurusan_model', 'jurusan');
        $this->data['jurusan'] = $this->jurusan->get_all();

        // post new
        if (! is_get()) {
            $_data['kd_prodi'] = $this->input->post('kode');
            $_data['nama_prodi'] = $this->input->post('nama');
            $_data['kd_jurusan'] = $this->input->post('jurusan');
            $_data['ujian_gambar'] = $this->input->post('gambar');
            $_data['biaya_bangunan'] = $this->input->post('biaya');
            if ($result = $this->prodi->insert($_data))
                redirect('admin/prodi');
            else
                set_message(validation_errors(),'error');
        }
        $this->load->view('admin/layout', $this->data);
    }

    public function edit ($id = null)
    {
        $this->data['breadcrumb']['Edit'] = null;
        $this->data['yield'] = $this->view.'/edit';

        $this->load->model('jurusan_model', 'jurusan');
        $this->data['jurusan'] = $this->jurusan->get_all();

        // post update
        if (! is_get()) {
            $_id = $this->input->post('id');
            $new_data = array(
                'kd_prodi' => $this->input->post('kode'),
                'kd_jurusan' => $this->input->post('jurusan'),
                'nama_prodi' => $this->input->post('nama'),
                'ujian_gambar' => $this->input->post('gambar'),
                'biaya_bangunan' => $this->input->post('biaya'),
            );
            if ($result = $this->prodi->update($_id,$new_data))
                redirect('admin/prodi');
            else
                set_message(validation_errors(),'error');
        } else {
            if (! $id) {
                set_message('ID tidak boleh kosong','error');
                redirect('admin/prodi');
            }
            $this->data['data'] = $this->prodi->get_by('id',$id);
        }
        $this->load->view('admin/layout', $this->data);
    }

    public function delete ($id = null)
    {
        if (! $id) {
            set_message('ID tidak boleh kosong','error');
            redirect('admin/prodi');
        }
        if ($this->prodi->delete($id)) {
            set_message('Hapus data berhasil','info');
        } else {
            set_message('Hapus data gagal','error');
        }
        redirect('admin/prodi');
    }
}
