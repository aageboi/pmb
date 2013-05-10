    <div class="container-fluid">
      <div class="row-fluid">
        <?=$this->load->view('admin/menu')?>
        <div class="span9">
          <div class="row-fluid">
            <div class="span12">
                <?debug($data)?>
                <?=$this->load->view('breadcrumb')?>
                <h3>Data Akun</h3>
                <form class="form-horizontal" method="post" action="<?=site_url('admin/registrasi/edit')?>">
                  <?=$this->load->view('admin/error_message')?>
                  <div class="control-group">
                    <label class="control-label" for="nama">Nama</label>
                    <div class="controls">
                      <input type="text" id="nama" placeholder="Nama Admin" name="nama" value="<?=isset($data->nama_akun) ? $data->nama_akun : ''?>">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="email">Email</label>
                    <div class="controls">
                      <input type="text" id="email" placeholder="email" name="email" value="<?=isset($data->email) ? $data->email : ''?>">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="pass">Password</label>
                    <div class="controls">
                      <input type="password" id="pass" placeholder="password" name="pass" value="">
                    </div>
                  </div>
                  <?php if (session('role') == 'superadmin') { ?>
                  <div class="control-group">
                    <label class="control-label" for="role">Role</label>
                    <div class="controls">
                      <select name="role" id="role">
                        <option value="user" <?=isset($data->role)&&$data->role=='user'?"selected":''?>>User</option>
                        <option value="admin" <?=isset($data->role)&&$data->role=='admin'?"selected":''?>>Admin</option>
                      </select>
                    </div>
                  </div>
                  <?php } ?>
                  <div class="control-group">
                    <label class="control-label" for="status">Status</label>
                    <div class="controls">
                      <select name="status" id="status">
                        <option value="0" <?=isset($data->status)&&$data->status=='0'?"selected":''?>>Tidak-Aktif</option>
                        <option value="1" <?=isset($data->status)&&$data->status=='1'?"selected":''?>>Aktif</option>
                      </select>
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="controls">
                        <input type="hidden" name="id" value="<?=$data->id?>">
                        <button type="submit" class="btn btn-primary"><i class="icon-ok"></i> Simpan</button>
                        <a href="<?=site_url('admin/akun')?>" class="btn"><i class="icon-remove"></i> Batal</a>
                    </div>
                  </div>
                </form>
            </div><!--/span-->
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->

      <hr>

    </div><!--/.fluid-container-->
