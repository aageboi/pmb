    <div class="container-fluid">
      <div class="row-fluid">
        <?=$this->load->view('admin/menu')?>
        <div class="span9">
          <div class="row-fluid">
            <div class="span12">
                <?=$this->load->view('breadcrumb')?>

                <h3>Data Jenis Kelamin</h3>
                <form class="form-horizontal" method="post">
                  <?=$this->load->view('admin/error_message')?>
                  <div class="control-group">
                    <label class="control-label" for="periode">Periode</label>
                    <div class="controls">
                      <input type="text" id="periode" placeholder="periode" name="periode" value="<?=isset($data['periode']) ? $data['periode'] : ''?>">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="tgl">Tanggal</label>
                    <div class="controls">
                      <input type="text" id="tgl" placeholder="tgl" name="tgl" value="<?=isset($data['tgl']) ? $data['tgl'] : ''?>">
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn btn-primary"><i class="icon-ok"></i> Simpan</button>
                        <a href="<?=site_url('admin/periode')?>" class="btn"><i class="icon-remove"></i> Batal</a>
                    </div>
                  </div>
                </form>
            </div><!--/span-->
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->

      <hr>

    </div><!--/.fluid-container-->
