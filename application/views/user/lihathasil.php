<?php if ($this->pmb->already_test()) { ?>

<?php if (! $print) { ?>
<h3>Hasil Ujian</h3>
<?php } ?>

<?php $status = $this->pmb->get_status(session('uid')); ?>

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
        <td><strong><?= ucwords($data['pribadi']['nama']) ?></strong></td>
    </tr>
    <tr>
        <th>No. Registrasi - Jurusan</th>
        <td>
        1. <strong><?= $this->pmb->get_nomor_registrasi_prodi($data['pribadi']['pil1']->kd_prodi,session('uid')) ?> - <?= $data['pribadi']['pil1']->nama_prodi ?></strong><br>
        2. <strong><?= $this->pmb->get_nomor_registrasi_prodi($data['pribadi']['pil2']->kd_prodi,session('uid')) ?> - <?= $data['pribadi']['pil2']->nama_prodi ?></strong>
        </td>
    </tr>
    <tr>
        <td colspan="2">
        <?php if (! $print) { ?>
            <h4 align="center" class="alert alert-<?= ($status['lulus']) ? 'success' : 'error' ?>">
        <?php } else { ?>
            <h4 align="center">
        <?php } ?>
            Anda dinyatakan <u><?= ($status['lulus']) ? 'LULUS' : 'TIDAK LULUS' ?></u>
            </h4>
        </td>
    </tr>
    <?php if ($status['lulus']) { ?>
    <tr>
        <th>Biaya</th>
        <td>
        1. <strong>Rp. <?= ($status['lulus']) ? number_format($this->pmb->get_biaya($data['pribadi']['pil1']->id),0) : '-' ?></strong><br>
        2. <strong>Rp. <?= ($status['lulus']) ? number_format($this->pmb->get_biaya($data['pribadi']['pil2']->id),0) : '-' ?></strong>
        </td>
    </tr>
    <tr>
        <th>Jadwal Pembayaran</th>
        <td>
        <strong><?= $jadwal_pembayaran->jadwal ?></strong>
        </td>
    </tr>
    <?php } ?>
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
    <a href="<?= site_url('dashboard/lihathasil/print') ?>" target="_blank"><i class="icon-print"></i> cetak hasil</a>
</p>
<?php } ?>

<?php } else { ?>
    <h3>Anda belum melakukan Ujian Online</h3>
<?php } ?>
