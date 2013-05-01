    <div class="container-fluid">
      <div class="row-fluid">
        <?=$this->load->view('admin/menu')?>
        <div class="span9">
          <div class="row-fluid">
            <div class="span12">
                <?=$this->load->view('breadcrumb')?>
                <?=$this->load->view('admin/error_message')?>
                <p>
                    <a href="<?=site_url('admin/pelajaran/add')?>" class="btn btn-primary">[+] Tambah</a>
                </p>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Pelajaran</th>
                        <th>Kriteria Kelulusan</th>
                        <th>Option</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($data as $key => $row) { ?>
                    <tr>
                        <td><?=$row->nama_pel?></td>
                        <td><?=$row->kriteria?></td>
                        <td width="85px">
                            <a href="<?=site_url('admin/pelajaran/edit/'.$row->id)?>" class="btn" title="edit"><i class="icon-edit"></i></a>
                            <a href="<?=site_url('admin/pelajaran/delete/'.$row->id)?>" class="btn btn-danger" title="delete"><i class="icon-remove"></i></a>
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
