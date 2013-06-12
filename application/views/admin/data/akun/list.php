    <div class="container-fluid">
      <div class="row-fluid">
        <?=$this->load->view('admin/menu')?>
        <div class="span9">
          <div class="row-fluid">
            <div class="span12">
                <?=$this->load->view('breadcrumb')?>
                <?=$this->load->view('admin/error_message')?>
                <?php #if (session('role') == 'superadmin') { ?>
                <p>
                    <a href="<?=site_url('admin/akun/add')?>" class="btn btn-primary"><i class="icon-plus-sign"></i> Tambah</a>
                </p>
                <?php #} ?>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Option</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($data as $key => $row) { ?>
                    <tr>
                        <td><?=$row->nama_akun?></td>
                        <td><?=$row->email?></td>
                        <td><?=$row->role?></td>
                        <td>
                        <?php if ($row->status == '1') { ?>
                        <span class="label label-success">Aktif</span>
                        <?php } else { ?>
                        <span class="label label-important">Non-aktif</span>
                        <?php } ?>
                        </td>
                        <td width="85px">
                            <?php if ($row->nama_akun == session('un')) { ?>
                            <a href="<?=site_url('admin/akun/edit/'.$row->id)?>" class="btn btn-success" title="edit"><i class="icon-edit"></i> update</a>
                            <?php } else { ?>
                            <a href="<?=site_url('admin/akun/edit/'.$row->id)?>" class="btn" title="edit"><i class="icon-edit"></i></a>
                            <a href="<?=site_url('admin/akun/delete/'.$row->id)?>" class="btn btn-danger" title="delete" onclick="return confirm('Hapus data?');"><i class="icon-remove"></i></a>
                            <?php } ?>
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
