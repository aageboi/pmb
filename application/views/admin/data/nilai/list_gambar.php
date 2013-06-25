    <div class="container-fluid">
      <div class="row-fluid">
        <?=$this->load->view('admin/menu')?>
        <div class="span9">
          <div class="row-fluid">
            <div class="span12">
                <?=$this->load->view('breadcrumb')?>
                <?=$this->load->view('admin/error_message')?>
                <table class="table table-bordered table-condensed">
                    <thead>
                    <tr>
                        <th width="80px">No. Ujian</th>
                        <th>Nama</th>
                        <th>Nilai Gambar</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($data as $key => $row) {
                        if ($this->pmb->get_prodi_bergambar($row['pil_1']) || $this->pmb->get_prodi_bergambar($row['pil_2'])) {
                    ?>
                    <tr>
                        <td><?=$row['nomor_ujian']?></td>
                        <td><?=ucwords($row['nama'])?></td>
                        <td>
                            <?php if ($row['nilai_gambar']) { ?>
                            <?= intval($row['nilai_gambar']) ?>
                            <?php } else { ?>
                            <a href="<?= site_url('admin/nilai/gambar/'.$row['id']) ?>">Input Nilai</a>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php }
                    } ?>
                    </tbody>
                </table>
            </div><!--/span-->
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->

      <hr>

    </div><!--/.fluid-container-->
