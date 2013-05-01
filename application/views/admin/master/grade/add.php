    <div class="container-fluid">
      <div class="row-fluid">
        <?=$this->load->view('admin/menu')?>
        <div class="span9">
          <div class="row-fluid">
            <div class="span12">
                <?=$this->load->view('breadcrumb')?>

                <h3>Data Grade</h3>
                <form class="form-horizontal" method="post">
                  <?=$this->load->view('admin/error_message')?>
                  <div class="control-group">
                    <label class="control-label" for="nama">Grade</label>
                    <div class="controls">
                      <input type="text" id="nama" placeholder="nama" name="nama" value="<?=isset($data['nama']) ? $data['nama'] : ''?>">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="min">Nilai Minimum</label>
                    <div class="controls">
                      <input type="text" id="min" placeholder="min" name="min" value="<?=isset($data['min']) ? $data['min'] : ''?>">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="max">Nilai Maximum</label>
                    <div class="controls">
                      <input type="text" id="max" placeholder="max" name="max" value="<?=isset($data['max']) ? $data['max'] : ''?>">
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn btn-primary"><i class="icon-ok"></i> Simpan</button>
                        <a href="<?=site_url('admin/grade')?>" class="btn"><i class="icon-remove"></i> Batal</a>
                    </div>
                  </div>
                </form>
            </div><!--/span-->
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->

      <hr>

    </div><!--/.fluid-container-->
