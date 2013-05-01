    <div class="container-fluid">
      <div class="row-fluid">
        <?=$this->load->view('admin/menu')?>
        <div class="span9">
          <div class="row-fluid">
            <div class="span12">
                <?=$this->load->view('breadcrumb')?>

                <h3>Data Jalur</h3>
                <form class="form-horizontal" method="post" action="<?=site_url('admin/jalur/edit')?>">
                  <?=$this->load->view('admin/error_message')?>
                  <div class="control-group">
                    <label class="control-label" for="nama">Jalur</label>
                    <div class="controls">
                      <input type="text" id="nama" placeholder="nama" name="nama" value="<?=isset($data->nama_jalur) ? $data->nama_jalur : ''?>">
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="controls">
                        <input type="hidden" name="id" value="<?=$data->id?>">
                        <button type="submit" class="btn btn-primary"><i class="icon-ok"></i> Simpan</button>
                        <a href="<?=site_url('admin/jalur')?>" class="btn"><i class="icon-remove"></i> Batal</a>
                    </div>
                  </div>
                </form>
            </div><!--/span-->
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->

      <hr>

    </div><!--/.fluid-container-->
