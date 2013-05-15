<?php defined('BASEPATH') OR exit('No direct script access allowed');

class grade extends CI_Controller
{
    private $view = "admin/master/grade";

    public function __construct ()
    {
        parent::__construct();
        if (! session('un'))
            redirect('admin/sessions/login');

        $this->load->model('grade_model','grade');

        $this->data['page'] = 'grade';
        $this->data['breadcrumb'] = array(
            'Home' => 'admin',
            'Master' => 'admin/master',
            'Grade' => 'admin/grade',
        );
    }

    public function index()
    {
        $this->data['breadcrumb']['Daftar'] = null;
        $this->data['data'] = $this->grade->get_all();
        $this->data['yield'] = $this->view.'/list';
        $this->load->view('admin/layout', $this->data);
    }

    public function add ()
    {
        $this->data['breadcrumb']['Tambah'] = null;
        $this->data['yield'] = $this->view.'/add';

        // post new
        if (! is_get()) {
            $this->data['nama'] = $_data['nama_grade'] = $this->input->post('nama');
            $this->data['max'] = $_data['nilai_max'] = $this->input->post('max');
            $this->data['min'] = $_data['nilai_min'] = $this->input->post('min');
            if ($result = $this->grade->insert($_data))
                redirect('admin/grade');
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
                'nama_grade' => $this->input->post('nama'),
                'nilai_max' => $this->input->post('max'),
                'nilai_min' => $this->input->post('min'),
            );
            if ($result = $this->grade->update($_id,$new_data))
                redirect('admin/grade');
            else
                set_message(validation_errors(),'error');
        } else {
            if (! $id) {
                set_message('ID tidak boleh kosong','error');
                redirect('admin/grade');
            }
            $this->data['data'] = $this->grade->get_by('id',$id);
        }
        $this->load->view('admin/layout', $this->data);
    }

    public function delete ($id = null)
    {
        if (! $id) {
            set_message('ID tidak boleh kosong','error');
            redirect('admin/grade');
        }
        if ($this->grade->delete($id)) {
            set_message('Hapus data berhasil','info');
        } else {
            set_message('Hapus data gagal','error');
        }
        redirect('admin/grade');
    }
}
