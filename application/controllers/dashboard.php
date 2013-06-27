<?php defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller
{
    private $view = 'user/';

    public function __construct ()
    {
        parent::__construct();

        if (! session('username') AND ! session('uid'))
            redirect('login');

        $this->data['uid'] = session('uid');
        $this->data['uname'] = session('username');
    }

    public function index()
    {
        $this->load->model('pribadi_model','pribadi');
        $this->load->model('jadwal_model','jadwal');

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

        $this->data['yield'] = $this->view.'index';
        $this->load->view($this->view.'layout', $this->data);
    }

    public function gantipassword ()
    {
        $this->load->library('form_validation');

        if (! is_get()) {
            $this->form_validation->set_message('matches', '%s tidak sama dengan %s.');
            $this->form_validation->set_message('required', '%s tidak boleh kosong');
            $this->form_validation->set_message('min_length', 'Minimal karakter untuk %s adalah %s');
            $this->form_validation->set_message('password_check', 'Password anda salah.');

            $this->form_validation->set_rules('password', 'Password', 'required|callback_password_check');
            $this->form_validation->set_rules('passwordBaru', 'Password Baru', 'required|min_length[6]|matches[ulangiPassword]');
            $this->form_validation->set_rules('ulangiPassword', 'Ulangi Password', 'required');

            if ($this->form_validation->run() == TRUE) {
                $this->load->model('akun_model','akun');
                $new['password'] = md5($this->input->post('passwordBaru'));
                if ($result = $this->akun->update(session('uid'), $new, TRUE)) {
                    set_message('Update password berhasil');
                    redirect('dashboard');
                } else {
                    set_message('Update password gagal', 'error');
                }
            }
        }
        $this->data['yield'] = $this->view.'gantipassword';
        $this->load->view($this->view.'layout', $this->data);
    }

    public function profile ()
    {
        $this->load->library('form_validation');
        $this->load->model('akun_model','akun');
        $this->data['data'] = $this->akun->get(session('uid'));

        if (! is_get()) {
            $this->form_validation->set_message('matches', '%s tidak sama dengan %s.');
            $this->form_validation->set_message('required', '%s tidak boleh kosong');
            $this->form_validation->set_message('min_length', 'Minimal karakter untuk %s adalah %s');

            $this->form_validation->set_rules('nama', 'Nama Akun', 'trim|required|min_length[6]');

            $this->data['data']->nama_akun = $this->input->post('nama');

            if ($this->form_validation->run() == TRUE) {
                $new['nama_akun'] = $this->input->post('nama');
                if ($result = $this->akun->update(session('uid'), $new, TRUE)) {
                    $this->session->unset_userdata('username');
                    set_session("username", $new['nama_akun']);
                    set_message('Update profile berhasil');
                    redirect('dashboard/profile');
                } else {
                    set_message('Update profile gagal', 'error');
                }
            }
        }
        $this->data['yield'] = $this->view.'profile';
        $this->load->view($this->view.'layout', $this->data);
    }

    public function lihathasil ($print = NULL)
    {
        $this->load->model('pribadi_model', 'pribadi');
        $this->load->model('hasil_model', 'hasil');
        // $this->data['data'] = $this->hasil->with('soal')
        //      ->get_many_by('id_pribadi', $this->pmb->registrasi_id());

        $this->data['data'] = $this->hasil->find_all(
            array('id_pribadi' => session('uid'))
        );

        $this->data['data']['pribadi'] = $this->pribadi
            ->with('sekolahasal')
            ->with('ortu')
            ->with('pil1')
            ->with('pil2')
            ->with('provinsi')
            ->with('jalur')
            ->get_by('id_user', session('uid'));

        $this->load->model('jadwal_model', 'jadwal');
        $this->data['jadwal_pembayaran'] = $this->jadwal->get(1);

        $this->data['print'] = $print;
        $this->data['yield'] = $this->view.'lihathasil';

        if ($print)
            $this->load->view($this->view.'layout_print', $this->data);
        else
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

        $this->data['data'] = $this->pribadi
            ->with('sekolahasal')
            ->with('ortu')
            ->get_by('id_user', session('uid'));

        if (! is_get()) {

            if ($this->input->post('pil1')==$this->input->post('pil2')) {
                set_message('Pilihan 1 dan 2 harus berbeda','error');
                redirect('dashboard/registrasi');
            }

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

            if (isset($_FILES['sktbw']) && !empty($_FILES['sktbw']['name'])) {
                if ($ttd_2 = $this->do_upload('sktbw'))
                    $_pribadi['sktbw'] = $ttd_2['upload_data']['file_name'];
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
            $_pribadi['id_ruang'] = 1;

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
                $err = (validation_errors())
                    ? validation_errors()
                    : 'Terjadi error ketika menyimpan data pribadi';
                set_message($err, 'error');
            } else {
                set_message('Input data registrasi berhasil');
            }

            if ($this->input->post('simpan') && $this->input->post('simpan') == 'next')
                redirect('dashboard/konfirmasibayar');
            else
                redirect('dashboard/registrasi');
        }

        $this->data['yield'] = $this->view.'registrasi';
        $this->load->view($this->view.'layout', $this->data);
    }

    public function konfirmasibayar ()
    {
        $this->load->library('form_validation');
        $this->load->model('pembayaran_model', 'bayar');

        if (! $this->is_registered()) {
            set_message('Anda harus isi formulir pendaftaran dan menyimpan datanya terlebih dahulu.','error');
            redirect('dashboard/registrasi');
        }

        if (! is_get()) {
            $data['payment_method'] = $this->input->post('method');
            $data['payment_to'] = $this->input->post('to');
            $data['payment_date'] = date('Y-m-d',strtotime($this->input->post('date')));
            $data['payment_amount'] = intval(str_replace(array(',','.'),'',$this->input->post('amount')));
            $data['desc'] = $this->input->post('desc');
            $data['id_akun'] = $this->pmb->registrasi_id();

            if (isset($_FILES['bukti']) && !empty($_FILES['bukti']['name'])) {
                if ($foto = $this->do_upload('bukti')) {
                    $data['attachment'] = $foto['upload_data']['file_name'];

                    if ($sukses = $this->bayar->insert($data)) {
                        set_message('Konfirmasi Pembayaran berhasil dikirim.');
                        redirect('dashboard');
                    }
                }
            } else {
                set_message('Harap lampirkan bukti transfer.', 'error');
            }

        }
        $this->data['yield'] = $this->view.'konfirmasi';
        $this->load->view($this->view.'layout', $this->data);
    }

    public function ujian ()
    {
        $this->load->model('pribadi_model', 'pribadi');

        if ($this->pmb->already_test()) {
            set_message('Anda sudah melakukan test sebelumnya.', 'error');
            redirect('dashboard/lihathasil');
        } else {
            if (! is_get()) {
                $this->load->helper('cookie');
                $time = time();
                set_cookie('ujian_mulai', $time, 3600, '127.0.0.1', '/');

                set_session('ujian_mulai', $time);
                set_session('ujian_uid', session('uid'));
                set_session('ujian_mapel', session('prodi'));

                $this->session->unset_userdata('prodi');

                redirect('dashboard/mulaiujian');
            } else {
                $this->load->model('pelajaran_model','pelajaran');
                $this->load->model('jurusan_model','jurusan');

                $pribadi = $this->pribadi
                    ->with('pil1')
                    ->with('pil2')
                    ->get_by('id_user', session('uid'));


                $ipa1 = $ipa2 = $gambar1 = $gambar2 = false;
                if ($pil1 = $pribadi['pil1']) {
                    $jurusan1 = $this->jurusan->get($pil1->kd_jurusan);
                    $jur1 = strpos(strtolower($jurusan1->nama_jurusan), 'ipa');
                    if ($jur1 !== false)
                        $ipa1 = true;
                    $gambar1 = ($pil1->ujian_gambar) ? true : false;
                }

                if ($pil2 = $pribadi['pil2']) {
                    $jurusan2 = $this->jurusan->get($pil2->kd_jurusan);
                    $jur2 = strpos(strtolower($jurusan2->nama_jurusan), 'ipa');
                    if ($jur2 !== false)
                        $ipa2 = true;
                    $gambar2 = ($pil2->ujian_gambar) ? true : false;
                }

                if (! $ipa1 AND ! $ipa2) {
                    $this->data['data'] = $this->pelajaran->get_many_by('kd_pel','ips');
                    set_session('prodi', 'ips');
                } else {
                    $this->data['data'] = $this->pelajaran->get_all();
                    set_session('prodi', 'ipa');
                }

                $this->data['yield'] = $this->view.'konfirmasimulai';
                $this->load->view($this->view.'layout', $this->data);
            }
        }
    }

    public function mulaiujian ()
    {
        $this->load->helper('cookie');

        if ($this->pmb->already_test()) {
            set_message('Anda sudah melaksanakan ujian.', 'error');
            redirect('dashboard/lihathasil');
        }

        if (! session('ujian_mapel') OR ! session('ujian_uid') OR ! session('ujian_mulai')) {
            delete_cookie('ujian_mulai');

            $this->session->unset_userdata('ujian_mulai');
            $this->session->unset_userdata('ujian_uid');
            $this->session->unset_userdata('ujian_mapel');

            set_message('Anda sudah melaksanakan ujian.', 'error');
            redirect('dashboard/lihathasil');
        }

        $this->load->model('soal_model', 'soal');
        $simpan[] = FALSE;
        // $this->data['data'] = $this->soal->find_all(session('ujian_mapel'));
        $this->data['data'] = $this->soal->find_question(session('ujian_mapel'));

        if (! is_get()) {

            // if (count($this->input->post('jawaban')) != 4) {
                // set_message('Anda belum menjawab seluruh pertanyaan.', 'error');
            // } else {
                $this->load->model('hasil_model', 'hasil');
                $jawaban = $this->input->post('jawaban');

                foreach ($jawaban as $idsoal => $jawab) {
                    $ujian['id_pribadi'] = session('uid');
                    $ujian['id_soal'] = $idsoal;
                    $ujian['jawaban'] = $jawab;
                    if ($result = $this->hasil->insert($ujian))
                        $simpan[] = TRUE;
                    else
                        $simpan[] = FALSE;
                }

                if ($simpan) {
                    delete_cookie('ujian_mulai');

                    $this->session->unset_userdata('ujian_mulai');
                    $this->session->unset_userdata('ujian_uid');
                    $this->session->unset_userdata('ujian_mapel');

                    $time = time();
                    set_session('ujian_selesai', $time);
                    set_cookie('ujian_selesai', $time, 3600, '127.0.0.1', '/');

                    set_session('ujian'.session('uid'), NULL);
                    $this->session->unset_userdata('ujian'.session('uid'));

                    set_message('Jawaban berhasil disimpan.');
                    redirect('dashboard/lihathasil');
                } else {
                    set_message("Gagal menyimpan hasil jawaban.", 'error');
                }
            // }
        }
        $this->load->view($this->view.'ujian', $this->data);
    }

    public function cetak ($print = NULL)
    {
        $this->load->model('pribadi_model','pribadi');
        $this->load->model('jadwal_model','jadwal');

        $pribadi = $this->pribadi
            ->with('sekolahasal')
            ->with('pil1')
            ->with('pil2')
            ->with('ruang')
            ->get_by('id_user', session('uid'));

        if (! isset($pribadi['nama']))
            redirect('dashboard');

        if (! $this->pmb->is_verified())
            redirect('dashboard');

        $this->data['print'] = $print;
        $this->data['data'] = $pribadi;
        $this->data['yield'] = $this->view.'cetakkartu';

        if ($print)
            $this->load->view($this->view.'layout_print', $this->data);
        else
            $this->load->view($this->view.'layout', $this->data);
    }

    public function password_check ($pass)
    {
        $this->load->model('akun_model','akun');
        if ($user = $this->akun->get(session('uid'))) {
            if ($user->password == md5($pass))
                return true;
        }

        return false;
    }

    private function is_registered ()
    {
        $this->load->model('pribadi_model','pribadi');

        if ($this->pribadi->get_by('id_user', session('uid')))
            return true;

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
