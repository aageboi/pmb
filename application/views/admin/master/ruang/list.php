    <div class="container-fluid">
      <div class="row-fluid">
        <?=$this->load->view('admin/menu')?>
        <div class="span9">
          <div class="row-fluid">
            <div class="span12">
                <?=$this->load->view('breadcrumb')?>
                <?=$this->load->view('admin/error_message')?>
                <p>
                    <a href="<?=site_url('admin/ruang/add')?>" class="btn btn-primary"><i class="icon-plus"></i> Tambah</a>
                </p>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Nama Ruang</th>
                        <th>Pelajaran</th>
                        <!--<th>Lokasi</th>-->
                        <th>Kapasitas</th>
                        <th>Option</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($data as $key => $row) { ?>
                    <tr>
                        <td><?=$row->nama_ruang?></td>
                        <td><?=$row->nama_pel?></td>
                        <!--<td><?=$row->lokasi?></td>-->
                        <td><?=$row->kapasitas?></td>
                        <td width="85px">
                            <a href="<?=site_url('admin/ruang/edit/'.$row->id)?>" class="btn" title="edit"><i class="icon-edit"></i></a>
                            <a href="<?=site_url('admin/ruang/delete/'.$row->id)?>" class="btn btn-danger" title="delete" onclick="return confirm('Hapus data?');"><i class="icon-remove"></i></a>
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
