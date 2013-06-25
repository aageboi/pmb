    <div class="container-fluid">
      <div class="row-fluid">
        <?=$this->load->view('admin/menu')?>
        <div class="span9">
          <div class="row-fluid">
            <div class="span12">
                <?=$this->load->view('breadcrumb')?>
                <?=$this->load->view('admin/error_message')?>
                <p>
                    <a href="<?= site_url('admin/absensi/cetak') ?>" target="_blank"><i class="icon-print"></i> cetak</a>
                </p>
                <table class="table table-bordered table-condensed">
                    <thead>
                    <tr>
                        <th width="70px">No. Ujian</th>
                        <th>Nama</th>
                        <th>TTD</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($data as $key => $row) { ?>
                    <tr>
                        <td>
                            <?=$this->pmb->get_nomor_ujian($row['id'])?>
                        </td>
                        <td><?= $row['nama'] ?></td>
                        <td></td>
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
