<?php if ($data) { ?>
<div class="row-fluid">
    <div class="span3">
        <img src="<?=$this->pmb->get_avatar()?>" class="img-polaroid">
    </div>
    <div class="span9">
        <table class="table table-bordered">
            <?php if ($this->pmb->is_verified()) { ?>
            <tr>
                <th>No. Ujian / No. Bangku</th>
                <td><?=$data['nomor_ujian']?></td>
            </tr>
            <?php } ?>
            <tr>
                <th>Nama</th>
                <td><?=$data['nama']?></td>
            </tr>
            <tr>
                <th>Jalur Masuk</th>
                <td><?=(! empty($data['jalur']))?$data['jalur']->nama_jalur:null?></td>
            </tr>
            <tr>
                <th>Provinsi</th>
                <td><?=(! empty($data['provinsi']))?$data['provinsi']->nama_provinsi:null?></td>
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
    </div>
</div>
<br>
<div class="row-fluid">
    <div class="span12">
        <h6>Kelengkapan pendaftaran :</h6>
        <table class="table table-bordered">
            <tr>
                <td><strong>Foto</strong><br>
                    <?php if (! $data['foto']) { ?>
                    <i>(Harap upload foto anda. <a href='<?=site_url('dashboard/registrasi#uploadFoto')?>'>Klik disini</a>)</i>
                    <?php } ?>
                </td>
                <td>
                    <?php if ($data['foto']) { ?>
                    <i class="icon-ok"></i> <span class="label label-success">OK</span>
                    <?php } else { ?>
                    <i class="icon-remove"></i> <span class="label label-important">Belum</span>
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td><strong>Pembayaran</strong><br>
                    <?php if (! $data['is_verified']) { ?>
                    <i>(Harap lakukan pembayaran pada tanggal <strong><?=$jadwal_pembayaran->jadwal?></strong>)<br>
                    Kemudian kirim bukti transfer <a href="<?=site_url('dashboard/konfirmasibayar')?>">disini</a>.
                    </i>
                    <?php } ?>
                </td>
                <td>
                    <?php if ($data['is_verified']) { ?>
                    <i class="icon-ok"></i> <span class="label label-success">Lunas</span>
                    <?php } else { ?>
                    <i class="icon-remove"></i> <span class="label label-important">Belum</span>
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td><strong>Tanda Tangan Pribadi</strong><br>
                    <?php if (! $data['ttd_1']) { ?>
                    <i>(Harap upload tanda tangan anda. <a href='<?=site_url('dashboard/registrasi#uploadTTD1')?>'>Klik disini</a>)</i>
                    <?php } else { ?>
                    <!-- Button to trigger modal -->
                    <i><a href="#ttd1" role="button" data-toggle="modal">(Lihat tanda tangan)</a></i>
                    <!-- Modal -->
                    <div id="ttd1" class="modal hide fade" role="dialog" aria-labelledby="xttd1" aria-hidden="true">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 id="xttd1">Tanda tangan Pribadi</h3>
                      </div>
                      <div class="modal-body">
                        <img src="<?=base_url()?>assets/img/upload/<?=$data['ttd_1']?>" class="img-polaroid">
                      </div>
                      <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                      </div>
                    </div>
                    <?php } ?>
                </td>
                <td>
                    <?php if ($data['ttd_1']) { ?>
                    <i class="icon-ok"></i> <span class="label label-success">OK</span>
                    <?php } else { ?>
                    <i class="icon-remove"></i> <span class="label label-important">Belum</span>
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td><strong>Tanda Tangan Orang tua</strong><br>
                    <?php if (! $data['ttd_2']) { ?>
                    <i>(Harap upload tanda tangan orang tua anda. <a href='<?=site_url('dashboard/registrasi#uploadTTD2')?>'>Klik disini</a>)</i>
                    <?php } else { ?>
                    <!-- Button to trigger modal -->
                    <i><a href="#ttd2" role="button" data-toggle="modal">(Lihat tanda tangan)</a></i>
                    <!-- Modal -->
                    <div id="ttd2" class="modal hide fade" role="dialog" aria-labelledby="xttd2" aria-hidden="true">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 id="xttd2">Tanda tangan Orang tua</h3>
                      </div>
                      <div class="modal-body">
                        <img src="<?=base_url()?>assets/img/upload/<?=$data['ttd_2']?>" class="img-polaroid">
                      </div>
                      <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                      </div>
                    </div>
                    <?php } ?>
                </td>
                <td>
                    <?php if ($data['ttd_2']) { ?>
                    <i class="icon-ok"></i> <span class="label label-success">OK</span>
                    <?php } else { ?>
                    <i class="icon-remove"></i> <span class="label label-important">Belum</span>
                    <?php } ?>
                </td>
            </tr>
        </table>
    </div>
</div>
<?#debug($data)?>
<?php } else { ?>
<div class="row-fluid">
    <div class="span12">
        <h4>Anda belum membuat pendaftaran.</h4>
        <br>
        <p>
            Untuk terdaftar sebagai Calon Mahasiswa, silakan ikuti petunjuk pendaftaran berikut:
        </p>
        <br>
        <ul class="unstyled inline">
            <li><span class="badge badge-inverse">1</span> <a href="<?=site_url('dashboard/registrasi')?>">Registrasi</a></li>
            <li><span class="badge badge-inverse">2</span> <a href="<?=site_url('dashboard')?>">Transfer Bank</a></li>
            <li><span class="badge badge-inverse">3</span> <a href="<?=site_url('dashboard')?>">Konfirmasi Pembayaran</a></li>
            <li><span class="badge badge-inverse">4</span> <a href="<?=site_url('dashboard')?>">Cetak Kartu Ujian</a></li>
        </ul>

        <br><br>
        <i>
            <p>
                Sebelum melakukan registrasi Calon Mahasiswa Universitas Tarumanagara, harap dipersiapkan dahulu semua persyaratan yang diperlukan untuk pendaftaran online.
            </p>
            <ul>
                <li><strong>Pas Foto</strong><br>(Ukuran file maksimal 100Kb. Format file: jpg, jpeg, png)</li>
                <li><strong>Scan tanda tangan Calon Mahasiswa</strong> <br> (Ukuran file maksimal 100Kb. Format file: jpg, jpeg, png)</li>
                <li><strong>Scan tanda tangan Orangtua Calon Mahasiswa</strong><br> (Ukuran file maksimal 100Kb. Format file: jpg, jpeg, png)</li>
                <li><strong>Scan surat keterangan tidak buta warna</strong><br>(khusus yg memilih jurusan Kedokteran dan Desain).</li>
            </ul>
        </i>
    </div>
</div>
<?php }
