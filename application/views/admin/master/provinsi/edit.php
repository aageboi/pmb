    <div class="container-fluid">
      <div class="row-fluid">
        <?=$this->load->view('admin/menu')?>
        <div class="span9">
          <div class="row-fluid">
            <div class="span12">
                <?=$this->load->view('breadcrumb')?>

                <h3>Data Provinsi</h3>
                <form class="form-horizontal" method="post" action="<?=site_url('admin/provinsi/edit')?>">
                  <?=$this->load->view('admin/error_message')?>
                  <div class="control-group">
                    <label class="control-label" for="kode">Kode Provinsi</label>
                    <div class="controls">
                      <input type="text" id="kode" placeholder="kode" name="kode" value="<?=isset($data->kd_provinsi) ? $data->kd_provinsi : ''?>">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="nama">Nama Provinsi</label>
                    <div class="controls">
                      <input type="text" id="nama" placeholder="nama" name="nama" value="<?=isset($data->nama_provinsi) ? $data->nama_provinsi : ''?>">
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="controls">
                        <input type="hidden" name="id" value="<?=$data->id?>">
                        <button type="submit" class="btn btn-primary"><i class="icon-ok"></i> Simpan</button>
                        <a href="<?=site_url('admin/provinsi')?>" class="btn"><i class="icon-remove"></i> Batal</a>
                    </div>
                  </div>
                </form>
            </div><!--/span-->
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->

      <hr>

    </div><!--/.fluid-container-->
