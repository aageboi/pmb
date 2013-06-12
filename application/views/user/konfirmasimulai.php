<div class="form-actions">
    <p>
        Anda akan mengikuti ujian online. Untuk memulai, klik tombol <strong>Mulai Ujian</strong>.
        <br>
        <br>
    </p>
    <form method="post">
        <table class="table table-striped">
            <tr>
                <th>Soal</th>
                <th>Jumlah</th>
            </tr>
            <?php foreach ($data as $pel) { ?>
            <tr>
                <td><?= $pel->nama_pel ?></td>
                <td><?= $pel->jumlah_soal ?> soal</td>
            </tr>
            <?php } ?>
            <tr>
                <td colspan='4' style="text-align:center">
                    <button type="submit" class="btn btn-primary btn-large">
                    <i class="icon-ok"></i> Mulai Ujian</button>
                </td>
            </tr>
        </table>
    </form>
</div>
