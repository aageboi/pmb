<table class="table table-condensed">
    <tr>
        <td><img src="<?=base_url()?>assets/img/logo.jpg" width="100px"></td>
        <td colspan="10"><h3>Daftar Nilai</h3><h3>Universitas Tarumanagara</h3></td>
    </tr>
    <tr class="table-bordered">
        <th rowspan="2">No Ujian</th>
        <th rowspan="2">Nama</th>
        <th colspan="7" style="text-align:center">Pelajaran</th>
        <th rowspan="2" style="text-align:center">Grade</th>
        <th rowspan="2" style="text-align:center">Status</th>
    </tr>
    <tr class="table-bordered">
        <th>B.Ind</th>
        <th>B.Ing</th>
        <th>Mtk</th>
        <th>Fis</th>
        <th>Kim</th>
        <th>Bio</th>
        <th>Gambar</th>
    </tr>
    <?php
    foreach ($data as $key => $row) {
        $status = $this->pmb->get_status($row->id_user);
    ?>
    <tr class="table-bordered">
        <td><?=$row->nomor_ujian?></td>
        <td><?=$row->id_user . ' - ' . $row->nama?></td>
        <td>
        <?php echo (isset($status['mapel']['Bahasa Indonesia'])) ?
            $status['mapel']['Bahasa Indonesia'] : '-' ?>
        </td>
        <td>
        <?php echo (isset($status['mapel']['Bahasa Inggris'])) ?
            $status['mapel']['Bahasa Inggris'] : '-' ?>
        </td>
        <td>
        <?php echo (isset($status['mapel']['Matematika'])) ?
            $status['mapel']['Matematika'] : '-' ?>
        </td>
        <td>
        <?php echo (isset($status['mapel']['Fisika'])) ?
            $status['mapel']['Fisika'] : '-' ?>
        </td>
        <td>
        <?php echo (isset($status['mapel']['Kimia'])) ?
            $status['mapel']['Kimia'] : '-' ?>
        </td>
        <td>
        <?php echo (isset($status['mapel']['Biologi'])) ?
            $status['mapel']['Biologi'] : '-' ?>
        </td>
        <td>
        <?php if ($this->pmb->get_prodi_bergambar($row->pil_1) || $this->pmb->get_prodi_bergambar($row->pil_2)) { ?>
            <?= intval($row->nilai_gambar) ?>
        <?php } else { ?>
        -
        <?php } ?>
        </td>
        <td><?=$status['grade']?></td>
        <td><?=($status['lulus']) ? 'LULUS' : 'TIDAK LULUS'?></td>
    </tr>
    <?php } ?>
    <tr>
        <td style="text-align:right" colspan="11">Jumlah Total : &nbsp;&nbsp;&nbsp;&nbsp;<strong><?= $total_peserta ?></strong> peserta</td>
    </tr>
</table>

<script>
window.onload = function () {
    this.print();
}
</script>
