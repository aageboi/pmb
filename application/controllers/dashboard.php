<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    private $view = 'user/';

    public function __construct ()
    {
        parent::__construct();

        if (! session('username') AND ! session('uid'))
            redirect('login');

    }

    public function index()
    {
        $this->load->model('pribadi_model','pribadi');
        $this->load->model('jadwal_model','jadwal');

        // $this->data['data'] = $this->pribadi->find(session('uid'));
        $pribadi = $this->pribadi
            ->with('sekolahasal')
            ->with('ortu')
            ->with('pil1')
            ->with('pil2')
            ->with('provinsi')
            ->with('jalur')
            ->get_by('id_user', session('uid'));

        if (isset($pribadi['nama']))
            $this->data['data'] = $pribadi;
        else
            $this->data['data'] = false;

        $this->data['jadwal_pembayaran'] = $this->jadwal->get(1);
        // echo $this->db->last_query();//die;

        $this->data['yield'] = $this->view.'index';
        $this->load->view($this->view.'layout', $this->data);
    }

    public function gantipassword ()
    {
        $this->load->library('form_validation');
        if (! is_get()) {
            $this->form_validation->set_message('required', 'Kolom %s tidak boleh kosong');

            $this->form_validation->set_rules('password', 'Password', 'required|callback_password_check');
            $this->form_validation->set_rules('passwordBaru', 'Password Baru', 'required|min_length[6]|matches[ulangiPassword]');
            $this->form_validation->set_rules('ulangiPassword', 'Ulangi Password', 'required');

            if ($this->form_validation->run() == TRUE) {
                set_message('Update password berhasil');
                redirect('dashboard');
            }
        }
        $this->data['yield'] = $this->view.'gantipassword';
        $this->load->view($this->view.'layout', $this->data);
    }

    public function lihathasil ()
    {
        $this->data['yield'] = $this->view.'lihathasil';
        $this->load->view($this->view.'layout', $this->data);
    }

    public function registrasi ()
    {
        $this->load->model('prodi_model', 'prodi');
        $this->data['prodi'] = $this->prodi->get_all();

        $this->load->model('jalur_model', 'jalur');
        $this->data['jalur'] = $this->jalur->get_all();

        $this->load->model('jenkel_model', 'jenkel');
        $this->data['jenkel'] = $this->jenkel->get_all();

        $this->load->model('agama_model', 'agama');
        $this->data['agama'] = $this->agama->get_all();

        $this->load->model('statusnikah_model', 'nikah');
        $this->data['nikah'] = $this->nikah->get_all();

        $this->load->model('sumberbiaya_model', 'biaya');
        $this->data['biaya'] = $this->biaya->get_all();

        $this->load->model('kewarganegaraan_model', 'kwn');
        $this->data['kewarganegaraan'] = $this->kwn->get_all();

        $this->load->model('provinsi_model', 'prov');
        $this->data['provinsi'] = $this->prov->get_all();

        $this->load->model('kodesekolah_model', 'sekolah');
        $this->data['sekolah'] = $this->sekolah->get_all();

        $this->load->model('jurusan_model', 'jurusan');
        $this->data['jurusan'] = $this->jurusan->get_all();

        $this->load->model('pekerjaan_model', 'pekerjaan');
        $this->data['pekerjaan'] = $this->pekerjaan->get_all();

        $this->load->model('pendidikan_model', 'pendidikan');
        $this->data['pendidikan'] = $this->pendidikan->get_all();

        $this->load->model('pribadi_model','pribadi');
        $this->load->model('ortu_model','ortu');
        $this->load->model('sekolahasal_model','sekolahasal');

        // $this->data['data'] = $this->pribadi->find(session('uid'));
        $this->data['data'] = $this->pribadi
            ->with('sekolahasal')
            ->with('ortu')
            ->get_by('id_user', session('uid'));

        if (! is_get()) {

            if (isset($_FILES['foto']) && !empty($_FILES['foto']['name'])) {
                if ($foto = $this->do_upload('foto'))
                    $_pribadi['foto'] = $foto['upload_data']['file_name'];
            }

            if (isset($_FILES['ttd_1']) && !empty($_FILES['ttd_1']['name'])) {
                if ($ttd_1 = $this->do_upload('ttd_1'))
                    $_pribadi['ttd_1'] = $ttd_1['upload_data']['file_name'];
            }

            if (isset($_FILES['ttd_2']) && !empty($_FILES['ttd_2']['name'])) {
                if ($ttd_2 = $this->do_upload('ttd_2'))
                    $_pribadi['ttd_2'] = $ttd_2['upload_data']['file_name'];
            }

            if ($this->input->post('pil1')==$this->input->post('pil2')) {
                set_message('Pilihan 1 dan 2 harus berbeda','error');
                redirect('dashboard/registrasi');
            }

            $_pribadi['nama'] = $this->input->post('nama');
            $_pribadi['id_user'] = session('uid');
            $_pribadi['id_jalur'] = $this->input->post('jalur');
            $_pribadi['pil_1'] = $this->input->post('pil1');
            $_pribadi['pil_2'] = $this->input->post('pil2');
            $_pribadi['tempat_lahir'] = $this->input->post('tempat');
            $_pribadi['tanggal_lahir'] = $this->input->post('thn').'-'.
                $this->input->post('bln').'-'.$this->input->post('tgl');
            $_pribadi['id_jenkel'] = $this->input->post('jkel');
            $_pribadi['id_agama'] = $this->input->post('agama');
            $_pribadi['id_nikah'] = $this->input->post('nikah');
            $_pribadi['id_sumber'] = $this->input->post('sumber');
            $_pribadi['id_kwn'] = $this->input->post('kwn');
            $_pribadi['id_provinsi'] = $this->input->post('provinsi');
            $_pribadi['alamat'] = $this->input->post('alamat');
            $_pribadi['kelurahan'] = $this->input->post('kelurahan');
            $_pribadi['rt'] = $this->input->post('rt');
            $_pribadi['rw'] = $this->input->post('rw');
            $_pribadi['kota'] = $this->input->post('kota');
            $_pribadi['kode_pos'] = $this->input->post('kodepos');
            $_pribadi['telp'] = $this->input->post('telp');
            $_pribadi['hp'] = $this->input->post('hp');
            $_pribadi['email'] = session('em');

            if ($this->input->post('id'))
                $_id = $this->input->post('id');
            if ($this->input->post('id_ortu'))
                $_id_ortu = $this->input->post('id_ortu');
            if ($this->input->post('id_sekolah'))
                $_id_sekolah = $this->input->post('id_sekolah');

            // simpan dulu data orangtua
            $_ortu['nama'] = $this->input->post('nama_ortu');
            $_ortu['id_provinsi'] = $this->input->post('provinsi_ortu');
            $_ortu['id_pendidikan'] = $this->input->post('pendidikan_ortu');
            $_ortu['id_pekerjaan'] = $this->input->post('pekerjaan_ortu');
            $_ortu['tanggal_lahir'] = $this->input->post('thn_ortu').'-'.
                $this->input->post('bln_ortu').'-'.$this->input->post('tgl_ortu');
            $_ortu['alamat'] = $this->input->post('alamat_ortu');
            $_ortu['kelurahan'] = $this->input->post('kelurahan_ortu');
            $_ortu['rt'] = $this->input->post('rt_ortu');
            $_ortu['rw'] = $this->input->post('rw_ortu');
            $_ortu['kota'] = $this->input->post('kota_ortu');
            $_ortu['kode_pos'] = $this->input->post('kodepos_ortu');
            $_ortu['telp'] = $this->input->post('telp_ortu');
            $_ortu['is_ortu'] = strtolower($this->input->post('ortu'));

            if (isset($_id_ortu)) {
                $result_ortu = $this->ortu->update($_id_ortu,$_ortu);
            } else {
                if ($result_ortu = $this->ortu->insert($_ortu)) {
                    $_pribadi['id_ortu'] = $this->db->insert_id();
                }
            }

            if (! $result_ortu) {
                set_message('Terjadi error ketika menyimpan data orangtua', 'error');
                // return false;
            }

            // simpan data sekolah asal
            $_sekolah['id_sekolah'] = $this->input->post('sekolah');
            $_sekolah['id_jurusan'] = $this->input->post('jurusan');
            $_sekolah['tahun_lulus'] = $this->input->post('tahun_lulus');

            if (isset($_id_sekolah)) {
                $result_sekolah = $this->sekolahasal->update($_id_sekolah,$_sekolah);
            } else {
                if ($result_sekolah = $this->sekolahasal->insert($_sekolah)) {
                    $_pribadi['id_sekolah'] = $this->db->insert_id();
                }
            }

            if (! $result_sekolah) {
                set_message('Terjadi error ketika menyimpan data sekolah', 'error');
                // return false;
            }

            if (isset($_id)) {
                $result_pribadi = $this->pribadi->update($_id,$_pribadi);
                $idpribadi = $_id;
            } else {
                $result_pribadi = $this->pribadi->insert($_pribadi);
                $idpribadi = $this->db->insert_id();

                $nomor['nomor_ujian'] = $this->pmb->get_nomor_ujian($idpribadi);
                $result_nomor = $this->pribadi->update($idpribadi,$nomor);
            }

            if (! $result_pribadi) {
                set_message('Terjadi error ketika menyimpan data pribadi', 'error');
            } else {
                set_message('Input data registrasi berhasil');
            }

            redirect('dashboard/registrasi');
        }

        $this->data['yield'] = $this->view.'registrasi';
        $this->load->view($this->view.'layout', $this->data);
    }

    public function konfirmasibayar ()
    {
        $this->load->library('form_validation');
        $this->load->model('pembayaran_model', 'bayar');
        if (! is_get()) {
            $data['payment_method'] = $this->input->post('method');
            $data['payment_to'] = $this->input->post('to');
            $data['payment_date'] = $this->input->post('date');
            $data['desc'] = $this->input->post('desc');

            if (isset($_FILES['bukti']) && !empty($_FILES['bukti']['name'])) {
                if ($foto = $this->do_upload('bukti'))
                    $data['attachment'] = $foto['upload_data']['file_name'];
            }

            if ($sukses = $this->bayar->insert($data)) {
                set_message('Konfirmasi Pembayaran berhasil dikirim.');
                redirect('dashboard');
            } else {
                set_message('Konfirmasi Pembayaran gagal dikirim.', 'error');
            }
        }
        $this->data['yield'] = $this->view.'konfirmasi';
        $this->load->view($this->view.'layout', $this->data);
    }

    public function password_check ($pass)
    {
        $this->load->library('form_validation');
        $this->load->model('akun_model','akun');

        if ($user = $this->akun->get(session('uid'))) {
            if ($user->password == md5($pass))
                return true;
                // die('true');
        }

        // die('false');
        $this->form_validation->set_message('password_check', 'Password anda salah.');
        return false;
    }

    private function do_upload ($field_name=null)
    {
        $config['upload_path'] = './assets/img/upload/';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size']	= '100';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';

        $this->load->library('upload', $config);

        if (! $this->upload->do_upload($field_name)) {
            set_message($this->upload->display_errors(), 'error');
            return false;
        } else {
            $data = array('upload_data' => $this->upload->data());
            return $data;
        }
    }

}
