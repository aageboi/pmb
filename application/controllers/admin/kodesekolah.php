<?php defined('BASEPATH') OR exit('No direct script access allowed');

class kodesekolah extends CI_Controller
{
    private $view = "admin/master/kodesekolah";

    public function __construct ()
    {
        parent::__construct();
        if (! session('un'))
            redirect('admin/sessions/login');

        $this->load->model('kodesekolah_model','kodesekolah');
        $this->load->model('provinsi_model','provinsi');
        $this->data['provinsi'] = $this->provinsi->dropdown('nama_provinsi');

        $this->data['page'] = 'kodesekolah';
        $this->data['breadcrumb'] = array(
            'Home' => 'admin',
            'Master' => 'admin/master',
            'Kode Sekolah' => 'admin/kodesekolah',
        );
    }

    public function index()
    {
        $this->data['breadcrumb']['Daftar'] = null;
        $this->data['data'] = $this->kodesekolah->get_all();
        $this->data['yield'] = $this->view.'/list';
        $this->load->view('admin/layout', $this->data);
    }

    public function add ()
    {
        $this->data['breadcrumb']['Tambah'] = null;
        $this->data['yield'] = $this->view.'/add';

        // post new
        if (! is_get()) {
            $this->data['kode'] = $_data['kode_sekolah'] = $this->input->post('kode');
            $this->data['nama'] = $_data['nama_sekolah'] = $this->input->post('nama');
            $this->data['alamat'] = $_data['alamat'] = $this->input->post('alamat');
            $this->data['kota'] = $_data['kota'] = $this->input->post('kota');
            $this->data['provinsi'] = $_data['id_provinsi'] = $this->input->post('provinsi');
            if ($result = $this->kodesekolah->insert($_data))
                redirect('admin/kodesekolah');
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
                'kode_sekolah' => $this->input->post('kode'),
                'nama_sekolah' => $this->input->post('nama'),
                'kota' => $this->input->post('kota'),
                'id_provinsi' => $this->input->post('provinsi'),
                'alamat' => $this->input->post('alamat'),
            );
            if ($result = $this->kodesekolah->update($_id,$new_data))
                redirect('admin/kodesekolah');
            else
                set_message(validation_errors(),'error');
        } else {
            if (! $id) {
                set_message('ID tidak boleh kosong','error');
                redirect('admin/kodesekolah');
            }
            $this->data['data'] = $this->kodesekolah->with('provinsi')->get_by('id',$id);
        }
        $this->load->view('admin/layout', $this->data);
    }

    public function delete ($id = null)
    {
        if (! $id) {
            set_message('ID tidak boleh kosong','error');
            redirect('admin/kodesekolah');
        }
        if ($this->kodesekolah->delete($id)) {
            set_message('Hapus data berhasil','info');
        } else {
            set_message('Hapus data gagal','error');
        }
        redirect('admin/kodesekolah');
    }
}
