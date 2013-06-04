<?php if ($this->pmb->already_test()) { ?>

<h3>Hasil Ujian</h3>

<table class="table table-hover">

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
    ?>
    <tr>
        <td><strong><?= $pelajaran[$c] ?></strong></td>
        <td>
            <?php if ($persen < 1) { ?>
            <div class="progress progress-danger progress-striped">
              <div class="bar" style="width: 100%;">0%</div>
            </div>
            <?php } else { ?>
            <div class="progress <?=($lulus[$c]) ? 'progress-success' : 'progress-danger' ?> progress-striped active">
              <div class="bar" style="width: <?= $persen ?>%;"><?= $persen ?>%</div>
            </div>
            <?php } ?>
        </td>
        <td>
            <?php if ($lulus[$c]) { ?>
            <span class="label label-success">LULUS</span>
            <?php } else {
                $anda_lulus = false;
            ?>
            <span class="label label-important">GAGAL</span>
            <?php } ?>
        </td>
    </tr>
    <?php
        }
        unset($benar[$c]);
        $c++;
    }
    ?>
</table>
<div class="alert alert-info" style="text-align:center;">
    <strong>
<?php if ($anda_lulus) { ?>
        L U L U S
<?php } else { ?>
    T I D A K &nbsp; &nbsp; L U L U S
<?php } ?>
    </strong>
</div>
<?php } else { ?>
    <h3>Anda belum melakukan Ujian Online</h3>
<?php } ?>
