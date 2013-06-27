    <div class="container-fluid">
      <div class="row-fluid">
        <?=$this->load->view('admin/menu')?>
        <div class="span9">
          <div class="row-fluid">
            <div class="span12">
                <?=$this->load->view('breadcrumb')?>
                <?=$this->load->view('admin/error_message')?>

                <form class="form-search pull-left" method="get">
                    <select name="periode">
                    <?php foreach ($periode as $q => $per) { ?>
                    <option value="<?= $per->tgl_mulai ?>/<?= $per->tgl_selesai ?>" <?=($this->input->get('periode')==$per->tgl_mulai.'/'.$per->tgl_selesai)?'selected="selected"':''?>>
                        <?= $per->nama_per ?> - <?= $per->thn_ajaran ?>
                    </option>
                    <?php } ?>
                    </select>
                    <button type="submit" class="btn"><i class="icon-search"></i></button>
                </form>
                <p class="pull-right">
                    <a href="<?= site_url('admin/absensi/cetak').($this->input->get('periode')?'?periode='.$this->input->get('periode'):'') ?>" target="_blank"><i class="icon-print"></i> cetak</a>
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
