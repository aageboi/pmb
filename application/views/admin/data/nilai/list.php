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
                        <th rowspan="2">No Ujian</th>
                        <th rowspan="2">Nama</th>
                        <th colspan="7">Pelajaran</th>
                        <th rowspan="2">Grade</th>
                        <th rowspan="2">Status</th>
                    </tr>
                    <tr>
                        <th>B.Indonesia</th>
                        <th>B.Inggris</th>
                        <th>Matematika</th>
                        <th>Fisika</th>
                        <th>Kimia</th>
                        <th>Biologi</th>
                        <th>Gambar</th>
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
                        <?php echo (isset($status['mapel']['Bahasa Indonesia'])) ?
                            $status['mapel']['Bahasa Indonesia'] : '-' ?>
                        </td>
                        <td>
                        <?php echo (isset($status['mapel']['Bahasa Inggris'])) ?
                            $status['mapel']['Bahasa Inggris'] : '-' ?>
                        </td>
                        <td>
                        <?php echo (isset($status['mapel']['Matematika'])) ?
                            $status['mapel']['Matematika'] : '-' ?>
                        </td>
                        <td>
                        <?php echo (isset($status['mapel']['Fisika'])) ?
                            $status['mapel']['Fisika'] : '-' ?>
                        </td>
                        <td>
                        <?php echo (isset($status['mapel']['Kimia'])) ?
                            $status['mapel']['Kimia'] : '-' ?>
                        </td>
                        <td>
                        <?php echo (isset($status['mapel']['Biologi'])) ?
                            $status['mapel']['Biologi'] : '-' ?>
                        </td>
                        <td>
                        <?php if ($this->pmb->get_prodi_bergambar($row->pil_1)) { ?>
                            <?php if ($row->nilai_gambar) { ?>
                            <?= $row->nilai_gambar ?>
                            <?php } else { ?>
                            <a href="<?=site_url('admin/nilai/gambar/'.$row->id)?>"><span class="badge badge-warning">
                            <i class="icon-plus-sign"></i> [ tambah ]
                            </span></a>
                            <?php } ?>
                        <?php } elseif ($this->pmb->get_prodi_bergambar($row->pil_2)) { ?>
                            <?php if ($row->nilai_gambar) { ?>
                            <?= $row->nilai_gambar ?>
                            <?php } else { ?>
                            <a href="<?=site_url('admin/nilai/gambar/'.$row->id)?>"><span class="badge badge-warning">
                                <i class="icon-plus-sign"></i> [ tambah ]
                            </span></a>
                            <?php } ?>
                        <?php } else { ?>
                        -
                        <?php } ?>
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
