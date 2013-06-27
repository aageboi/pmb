<table class="table">
    <tr>
        <td colspan="2"><img src="<?=base_url()?>assets/img/logo.jpg" width="100px"></td>
        <td colspan="2">
            <h4>Daftar Absensi</h4><h3>Universitas Tarumanagara</h3>
            <?=($this->input->get('periode'))?'<h4>Periode '.urldecode($this->input->get('periode')).'</h4>':''?>
        </td>
    </tr>
    <tr class="table-bordered">
        <th width="10px">No.</th>
        <th width="60px">No. Ujian</th>
        <th>Nama</th>
        <th>TTD</th>
    </tr>
    <?php $no = 1; ?>
    <?php foreach ($data as $key => $row) { ?>
    <tr class="table-bordered table-condensed">
        <td><?= $no ?></td>
        <td>
            <?=$this->pmb->get_nomor_ujian($row['id'])?>
        </td>
        <td><?= ucwords($row['nama']) ?></td>
        <td></td>
    </tr>
    <?php $no++; ?>
    <?php } ?>
</table>

<script>
window.onload = function () {
    this.print();
}
</script>
