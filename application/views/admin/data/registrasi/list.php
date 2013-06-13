    <div class="container-fluid">
      <div class="row-fluid">
        <?=$this->load->view('admin/menu')?>
        <div class="span9">
          <div class="row-fluid">
            <div class="span12">
                <?=$this->load->view('breadcrumb')?>
                <?=$this->load->view('admin/error_message')?>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Biodata</th>
                        <th>Foto</th>
                        <th>TTD</th>
                        <th>TTD<br>Ortu</th>
                        <th>Bukti<br>Pembayaran</th>
                        <th>Pilihan</th>
                        <th>Option</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($data as $key => $row) { ?>
                    <tr>
                        <td>
                            <strong><?=$row['nama']?></strong><br>
                            <?=$row['tempat_lahir']?:'-'?>, <?=$row['tanggal_lahir']?:'-'?><br>
                            <?=$row['kota']?:'-'?><br>
                            <?php if ($row['is_verified'] == '1') { ?>
                            <span class="label label-success">Verified</span>
                            <?php } else { ?>
                            <span class="label label-important">Belum diverifikasi</span>
                            <?php } ?>
                        </td>
                        <td><?php if ($row['foto']) { ?>
                            <img src='<?=base_url()?>assets/img/upload/<?=$row['foto']?>' class="img-polaroid" width='60px'><br>
                            <a href="#foto<?=$row['id']?>" role="button" data-toggle="modal">[ lihat ]</a>
                            <div id="foto<?=$row['id']?>" class="modal hide fade" role="dialog" aria-hidden="true">
                              <div class="modal-body">
                                <img src="<?=base_url()?>assets/img/upload/<?=$row['foto']?>" class="img-polaroid" width='400px'>
                              </div>
                              <div class="modal-footer">
                                <button class="btn" data-dismiss="modal" aria-hidden="true">tutup</button>
                              </div>
                            </div>
                        <?php } ?></td>
                        <td><?php if ($row['ttd_1']) { ?>
                            <img src='<?=base_url()?>assets/img/upload/<?=$row['ttd_1']?>' class="img-polaroid" width='60px'><br>
                            <a href="#foto1<?=$row['id']?>" role="button" data-toggle="modal">[ lihat ]</a>
                            <div id="foto1<?=$row['id']?>" class="modal hide fade" role="dialog" aria-hidden="true">
                              <div class="modal-body">
                                <img src="<?=base_url()?>assets/img/upload/<?=$row['ttd_1']?>" class="img-polaroid" width='400px'>
                              </div>
                              <div class="modal-footer">
                                <button class="btn" data-dismiss="modal" aria-hidden="true">tutup</button>
                              </div>
                            </div>
                        <?php } ?></td>
                        <td><?php if ($row['ttd_2']) { ?>
                            <img src='<?=base_url()?>assets/img/upload/<?=$row['ttd_2']?>' class="img-polaroid" width='60px'><br>
                            <a href="#foto2<?=$row['id']?>" role="button" data-toggle="modal">[ lihat ]</a>
                            <div id="foto2<?=$row['id']?>" class="modal hide fade" role="dialog" aria-hidden="true">
                              <div class="modal-body">
                                <img src="<?=base_url()?>assets/img/upload/<?=$row['ttd_2']?>" class="img-polaroid" width='400px'>
                              </div>
                              <div class="modal-footer">
                                <button class="btn" data-dismiss="modal" aria-hidden="true">tutup</button>
                              </div>
                            </div>
                        <?php } ?></td>
                        <td><?php if ($bukti = $this->pmb->get_bukti_pembayaran($row['id'])) { ?>
                            <img src='<?=base_url()?>assets/img/upload/<?=$bukti->attachment?>' class="img-polaroid" width='60px'><br>
                            <a href="#bukti<?=$row['id']?>" role="button" data-toggle="modal">[ lihat ]</a>
                            <div id="bukti<?=$row['id']?>" class="modal hide fade" role="dialog" aria-hidden="true">
                              <div class="modal-body">
                                <img src="<?=base_url()?>assets/img/upload/<?=$bukti->attachment?>" class="img-polaroid" width='400px'><br>
                                <p>
                                    Pembayaran <strong><?= ($bukti->payment_method=='direct')?'Secara Langsung (Cash)':'Transfer Bank' ?></strong> <br>Ke <strong><?= strtoupper($bukti->payment_to) ?></strong><br>
                                    Tanggal <strong><?= $bukti->payment_date ?></strong><br>
                                    Sebesar <strong><?= $bukti->payment_amount ?></strong>
                                </p>
                                <p>Keterangan:<br><?= $bukti->desc ?></p>
                              </div>
                              <div class="modal-footer">
                                <button class="btn" data-dismiss="modal" aria-hidden="true">tutup</button>
                              </div>
                            </div>
                        <?php } ?></td>
                        <td>
                            1. <strong><?= $this->pmb->get_prodi($row['pil_1']) ?></strong><br>
                            2. <strong><?= $this->pmb->get_prodi($row['pil_2']) ?></strong>
                        </td>
                        <td width="85px">
                            <?php if ($row['is_verified'] == '0') { ?>
                            <a href="<?=site_url('admin/registrasi/verify/'.$row['id'])?>" class="btn btn-success" title="Verify Data ini" onclick="return confirm('Verify data registrasi ini?');"><i class="icon-star"></i></a>
                            <?php } else { ?>
                            <a href="<?=site_url('admin/registrasi/verify/'.$row['id'].'/deaktif')?>" class="btn btn-warning" title="Batalkan verifikasi untuk data ini" onclick="return confirm('Batalkan verifikasi untuk data ini?');"><i class="icon-star-empty"></i></a>
                            <?php } ?>
                            <a href="<?=site_url('admin/registrasi/delete/'.$row['id'])?>" class="btn btn-danger" title="delete" onclick="return confirm('Hapus data registrasi ini?');"><i class="icon-remove"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div><!--/span-->
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->

      <hr>

    </div><!--/.fluid-container-->
