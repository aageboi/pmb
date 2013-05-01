<?php if ($data) { ?>
<div class="row-fluid">
    <div class="span3">
        <img src="<?=$this->pmb->get_avatar()?>" class="img-polaroid">
    </div>
    <div class="span9">
        <table class="table table-bordered">
            <tr>
                <th>Nama</th>
                <td><?=$data['nama']?></td>
            </tr>
            <tr>
                <th>Jalur Masuk</th>
                <td><?=$data['jalur']->nama_jalur?></td>
            </tr>
            <tr>
                <th>Provinsi</th>
                <td><?=$data['provinsi']->nama_provinsi?></td>
            </tr>
        </table>
    </div>
</div>

<div class="row-fluid">
    <div class="span12">
        <h6>Pilihan :</h6>
        <table class="table table-bordered">
            <tr>
                <th class="span1">Pil.</th>
                <th>Program Studi</th>
            </tr>
            <tr>
                <td>1.</td>
                <td><?=$data['pil1']->nama_prodi?></td>
            </tr>
            <tr>
                <td>2.</td>
                <td><?=$data['pil2']->nama_prodi?></td>
            </tr>
        </table>

        <h6>Kelengkapan pendaftaran :</h6>
        <table class="table table-bordered">
            <tr>
                <td>Pembayaran</td>
                <td>
                    <i class="icon-remove"></i> <span class="label label-important">Belum</span>
                </td>
            </tr>
        </table>
    </div>
</div>
<?#debug($data)?>
<?php } else { ?>
<h1>Anda belum membuat pendaftaran. </h1>
<?php } ?>
