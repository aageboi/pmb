<?php if ($this->pmb->already_test()) { ?>
<table class="table table-hover">
    <tr>
        <th>#</th>
        <th>Soal</th>
        <th>&nbsp;</th>
    </tr>
    <?php
    $i = 1;
    foreach ($data as $key => $row) { ?>
    <tr>
        <td><?= $i ?></td>
        <td><?= $row->isi_soal ?></td>
        <td>
            <?php if ($row->jawaban == $row->kuncijawaban) { ?>
            <span class="label label-success">BENAR</span>
            <?php } else { ?>
            <span class="label label-important">SALAH</span>
            <?php } ?>
        </td>
    </tr>
    <?php
        $i++;
    } ?>
</table>
<?php } else { ?>
    <h3>Anda belum melakukan Ujian Online</h3>
<?php }
