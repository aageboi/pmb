<div class="form-actions">
    <p>
        Anda akan mengikuti ujian online. Untuk memulai, klik tombol <strong>Ikut Ujian</strong> di mata pelajaran yang akan anda ikuti.
        <br>
        <br>
    </p>
    <form method="post">
        <table class="table table-striped">
            <tr>
                <th width="110px">&nbsp;</th>
                <th>Mata Pelajaran</th>
                <th>Kriteria Lulus</th>
                <th>Jumlah Soal</th>
                <th>Waktu</th>
            </tr>
            <?php foreach ($data as $pel) { ?>
            <tr>
                <td>
                    <button type="submit" class="btn btn-primary" value="<?= $pel->id ?>" name="idpel">
                    <i class="icon-ok"></i> Ikut Ujian</button>
                </td>
                <td><?= $pel->nama_pel ?></td>
                <td><?= $pel->kriteria ?></td>
                <td>20 soal</td>
                <td>45 menit</td>
            </tr>
            <?php } ?>
        </table>
    </form>
</div>
