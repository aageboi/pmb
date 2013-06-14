<?php if ($this->pmb->already_test()) { ?>

<?php if (! $print) { ?>
<h3>Hasil Ujian</h3>
<?php } ?>

<?php
$anda_lulus = true;
$c = 0;
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
        if ($lulus[$c]) {
        } else {
            $anda_lulus = false;
        }
    }
    unset($benar[$c]);
    $c++;
}
?>

<br>

<table class="table table-hover">
    <tr>
        <td>
            <img src="<?=base_url()?>assets/img/logo.jpg" width="100px">
        </td>
        <td>
            <h2>Universitas Tarumanagara</h2>
        </td>
    </tr>
    <tr>
        <th>Nama</th>
        <td><?= $data['pribadi']['nama'] ?></td>
    </tr>
    <tr>
        <td colspan="2">
            <h4 align="center">
            Anda dinyatakan <u><?= ($anda_lulus) ? 'LULUS' : 'TIDAK LULUS' ?></u>
            </h4>
        </td>
    </tr>
    <tr>
        <th>Nomor Registrasi</th>
        <td>
        1. <strong><?= $this->pmb->get_nomor_registrasi_prodi($data['pribadi']['pil1']->kd_prodi,session('uid')) ?></strong><br>
        2. <strong><?= $this->pmb->get_nomor_registrasi_prodi($data['pribadi']['pil2']->kd_prodi,session('uid')) ?></strong>
        </td>
    </tr>
    <tr>
        <th>Jurusan</th>
        <td>
        1. <strong><?= $data['pribadi']['pil1']->nama_prodi ?></strong><br>
        2. <strong><?= $data['pribadi']['pil2']->nama_prodi ?></strong>
        </td>
    </tr>
    <tr>
        <th>Biaya</th>
        <td>
        1. <strong>Rp. <?= ($anda_lulus) ? '' : '-' ?></strong><br>
        2. <strong>Rp. <?= ($anda_lulus) ? '' : '-' ?></strong>
        </td>
    </tr>
    <tr>
        <td colspan="2">&nbsp;</td>
    </tr>
</table>

<?php if ($print) { ?>

<p align="center">
    <strong>&copy; <?= date('Y') ?> Universitas Tarumanagara.</strong>
</p>

<script>
window.onload = function () {
    this.print();
}
</script>
<?php } else { ?>
<p align="center">
    <a href="<?= site_url('dashboard/lihathasil/print') ?>" target="_blank">[ cetak hasil ]</a>
</p>
<?php } ?>

<?php } else { ?>
    <h3>Anda belum melakukan Ujian Online</h3>
<?php } ?>
