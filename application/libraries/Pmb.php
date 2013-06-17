<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Pmb
{

    public function __construct()
    {
        $this->to =& get_instance();
    }

    public function get_avatar ($id = NULL)
    {
        $userid = ($id) ? $id : $this->to->session->userdata('uid');

        if ($userid) {
            $this->to->load->model('pribadi_model','pribadi');
            if ($user = $this->to->pribadi->get_by('id_user',$userid)) {
                if (! empty($user['foto']))
                    return base_url().'assets/img/upload/'.$user['foto'];
            }
        }

        return base_url().'assets/img/ava.jpg';
    }

    public function get_nomor_ujian ($id, $field = 'id_pribadi')
    {
        $this->to->load->model('pribadi_model','pribadi');

        $user = ($field != 'id_pribadi')
            ? $this->to->pribadi->get_by($field, $id)
            : $this->to->pribadi->get($id);

        if ($user) {
            $this->to->load->model('prodi_model','prodi');
            $jalur = $user['id_jalur'];

            $before_char = '';
            $len = strlen($id);
            for ($i=4; $i>$len; $i--) {
                $before_char .= '0';
            }

            // return date('y').$jalur.$before_char.$id;
            return $before_char.$id;
        }
        return false;
    }

    public function get_nomor_registrasi_prodi ($prodi_id, $id)
    {
        $this->to->load->model('pribadi_model','pribadi');
        if ($user = $this->to->pribadi->get_by('id_user', $id)) {

            $before_char = '';
            $len = strlen($id);
            for ($i=4; $i>$len; $i--) {
                $before_char .= '0';
            }

            return $prodi_id.$before_char.$id;
        }
        return false;
    }

    public function get_nama_pribadi ($id)
    {
        $this->to->load->model('pribadi_model','pribadi');
        if ($user = $this->to->pribadi->get_by('id_user',$id)) {
            return $user['nama'];
        }
        return false;
    }

    public function get_nama_jalur ($id)
    {
        $this->to->load->model('jalur_model','jalur');
        if ($jalur = $this->to->jalur->get($id)) {
            return $jalur->nama_jalur;
        }
        return false;
    }

    public function is_registered ($id = NULL)
    {
        $userid = ($id) ? $id : $this->to->session->userdata('uid');

        if ($userid) {
            $this->to->load->model('pribadi_model','pribadi');
            if ($user = $this->to->pribadi->get_by('id_user',$userid))
                return TRUE;
        }

        return FALSE;
    }

    public function is_verified ($id = NULL)
    {
        $userid = ($id) ? $id : $this->to->session->userdata('uid');

        if ($userid) {
            $this->to->load->model('pribadi_model','pribadi');
            if ($user = $this->to->pribadi->get_by('id_user',$userid)) {
                if (! empty($user['is_verified']) && $user['is_verified'] == '1')
                    return TRUE;
            }
        }

        return FALSE;
    }

    public function registrasi_id ($id = NULL)
    {
        $userid = ($id) ? $id : $this->to->session->userdata('uid');

        if ($userid) {
            $this->to->load->model('pribadi_model', 'pribadi');
            if ($reg = $this->to->pribadi->get_by('id_user', $userid)) {
                return $reg['id'];
            }
        }

        return FALSE;
    }

    public function get_mapel ($id)
    {
        $this->to->load->model('pelajaran_model', 'pel');
        if ($pel = $this->to->pel->get($id))
            return $pel->nama_pel;
        return false;
    }

    public function get_prodi ($id)
    {
        $this->to->load->model('prodi_model', 'prodi');
        if ($prodi = $this->to->prodi->get($id))
            return $prodi->nama_prodi;
        return false;
    }

    public function get_prodi_bergambar ($id)
    {
        $this->to->load->model('prodi_model', 'prodi');
        if ($prodi = $this->to->prodi->get($id))
            return ($prodi->ujian_gambar) ? TRUE : FALSE;
        return false;
    }

    public function get_statik ($permalink = 'news')
    {
        $this->to->load->model('static_model', 'statik');
        if ($news = $this->to->statik->get_by('permalink', $permalink))
            return $news;
        return false;
    }

    public function get_nilai ($id)
    {
        $this->to->load->model('hasil_model', 'hasil');

        $c = 0;
        $anda_lulus = true;
        $nilai = 0;

        $data = $this->to->hasil->find_all(
            array('id_pribadi' => $id)
        );

        foreach ($data['pelajaran'] as $key => $mapel) {
            $benar[$c] = 0;
            $jml[$mapel['id']] = 0;
            $q = 1;
            foreach ($data['soal'][$c] as $key => $question) {
                if ($mapel['id'] == $question->mapel) {
                    $pelajaran[$c] = $mapel['nama'];
                    if ($question->jawaban == $question->kuncijawaban)
                        $benar[$c]++;
                    $jml[$mapel['id']]++;
                    $q++;
                }
            }

            $persen = ($benar[$c]/$jml[$mapel['id']]) * 100;
            $persen = number_format($persen, 0);

            if ($pelajaran[$c]) {
                $lulus[$c] = ($persen >= $mapel['kriteria']) ? TRUE : FALSE;

                $data['mapel'][$pelajaran[$c]] = $persen;
            }

            if (! $lulus[$c])
                $anda_lulus = FALSE;

            $nilai += $persen;

            unset($benar[$c]);
            $c++;
        }

        $data['total'] = floor($nilai / count($pelajaran));

        return $data;
    }

    function get_status ($id)
    {
        $this->to->load->model('grade_model', 'grade');

        $nilai = $this->get_nilai($id);

        $condition = array(
            'nilai_min <=' => $nilai['total'],
            'nilai_max >=' => $nilai['total'],
        );
        $data = $this->to->grade->get_by($condition);

        $_data['grade'] = '-';
        $_data['lulus'] = FALSE;
        $_data['mapel'] = $nilai['mapel'];

        if ($data) {
            $_data['grade'] = $data->nama_grade;
            $_data['lulus'] = TRUE;
        }
        return $_data;
    }

    function get_bukti_pembayaran ($id)
    {
        $this->to->load->model('pembayaran_model', 'bayar');
        if ($bukti = $this->to->bayar->get_by('id_akun', $id)) {
            return $bukti;
        }
        return false;
    }

    public function already_test ($id = NULL)
    {
        $this->to->load->model('hasil_model', 'hasil');
        // if ($already = $this->to->hasil->get_by('id_pribadi', $this->registrasi_id($id)))
        if ($already = $this->to->hasil->get_by('id_pribadi', $this->to->session->userdata('uid')))
            return TRUE;
        return FALSE;
    }

    public function get_biaya ($prodi)
    {
        $this->to->load->model('prodi_model', 'prodi');
        if ($prodi = $this->to->prodi->get($prodi))
            return $prodi->biaya_bangunan;
        return false;
    }
}
