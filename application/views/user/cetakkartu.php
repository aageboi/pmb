<div class="row-fluid">
    <div class="span12">
        <table class="table">
            <tr>
                <td>
                    <img src="<?=base_url()?>assets/img/logo.jpg" width="100px">
                </td>
                <td>
                    <h2>Universitas Tarumanagara</h2>
                </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <th>Nomor Ujian</th>
                <td><?=$data['nomor_ujian']?></td>
                <td rowspan="4" align="center">
                    <img src="<?=$this->pmb->get_avatar()?>" class="img-polaroid" width="120px">
                </td>
            </tr>
            <tr>
                <th>Nama</th>
                <td><?=$data['nama']?></td>
            </tr>
            <tr>
                <th>Ruang Ujian</th>
                <td><?=$data['ruang']?></td>
            </tr>
            <tr>
                <th>Pilihan Program Studi</th>
                <td>
                    <ol>
                        <li>
                            <?=(! empty($data['pil1']))?$data['pil1']->nama_prodi:''?> &nbsp;
                            (<?=(! empty($data['pil1']))?$this->pmb->get_nomor_registrasi_prodi($data['pil1']->kd_prodi,session('uid')):''?>)
                            <br>
                        </li>
                        <li>
                            <?=(! empty($data['pil2']))?$data['pil2']->nama_prodi:''?> &nbsp;
                            (<?=(! empty($data['pil2']))?$this->pmb->get_nomor_registrasi_prodi($data['pil2']->kd_prodi,session('uid')):''?>)
                        </li>
                    </ol>
                </td>
            </tr>
        </table>

        <?php if (! $print) { ?>
        <p align="center">
            <a href="#" onclick="window.open('<?=site_url('dashboard/cetak/1')?>','Cetak Kartu Ujian', 'width=600,height=200');">
                <i class="icon-print"></i> cetak kartu ujian
            </a>
        </p>
        <?php } ?>
    </div>
</div>
<?php if ($print) { ?>
    <script>
    window.onload = function () {
        this.print();
    }
    </script>
<?php } ?>
