<div class="row-fluid">
    <div class="span12">
        <table class="table table-bordered">
            <tr>
                <td rowspan="4" align="center">
                    <img src="<?=$this->pmb->get_avatar()?>" class="img-polaroid" width="120px">
                </td>
                <th>Nomor Ujian</th>
                <td><?=$data['nomor_ujian']?></td>
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
                            <?=(! empty($data['pil1']))?$data['pil1']->nama_prodi:''?><br>
                        </li>
                        <li>
                            <?=(! empty($data['pil2']))?$data['pil2']->nama_prodi:''?>
                        </li>
                    </ol>
                </td>
            </tr>
        </table>

        <p align="center">
            <a href="#" onclick="javascript:print()">
                <i class="icon-print"></i> cetak kartu ujian
            </a>
        </p>
    </div>
</div>
