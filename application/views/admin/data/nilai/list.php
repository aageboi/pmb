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
                        <th>No Ujian</th>
                        <th>Nama</th>
                        <th>Jurusan</th>
                        <th>Grade</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($data as $key => $row) {
                        $status = $this->pmb->get_status($row->id_user);
                    ?>
                    <tr>
                        <td><?=$row->nomor_ujian?></td>
                        <td><?=$row->nama?></td>
                        <td>
                            <ul>
                                <li>
                                    <strong><?=$this->pmb->get_prodi($row->pil_1)?></strong>
                                    <?php if ($this->pmb->get_prodi_bergambar($row->pil_1)) { ?>
                                    <?php if ($row->nilai_gambar) { ?>
                                    <br>Nilai Gambar : <span class="badge badge-success"><?=$row->nilai_gambar?></span>
                                    <?php } else { ?>
                                    <br><a href="<?=site_url('admin/nilai/gambar/'.$row->id)?>"><span class="badge badge-warning">
                                        <i class="icon-plus-sign"></i> Input Nilai Gambar
                                    </span></a>
                                    <?php } ?>
                                    <?php } ?>
                                </li>
                                <li>
                                    <strong><?=$this->pmb->get_prodi($row->pil_2)?></strong>
                                    <?php if ($this->pmb->get_prodi_bergambar($row->pil_2)) { ?>
                                    <?php if ($row->nilai_gambar) { ?>
                                    <br>Nilai Gambar : <span class="badge badge-success"><?=$row->nilai_gambar?></span>
                                    <?php } else { ?>
                                    <br><a href="<?=site_url('admin/nilai/gambar/'.$row->id)?>"><span class="badge badge-warning">
                                        <i class="icon-plus-sign"></i> Input Nilai Gambar
                                    </span></a>
                                    <?php } ?>
                                    <?php } ?>
                                </li>
                            </ul>
                        </td>
                        <td><?=$status['grade']?></td>
                        <td><?=($status['lulus']) ? 'LULUS' : 'TIDAK LULUS'?></td>
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
