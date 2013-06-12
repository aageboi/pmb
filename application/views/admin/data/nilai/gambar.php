    <div class="container-fluid">
      <div class="row-fluid">
        <?=$this->load->view('admin/menu')?>
        <div class="span9">
          <div class="row-fluid">
            <div class="span12">
                <?=$this->load->view('breadcrumb')?>

                <h3>Input Nilai Gambar</h3>
                <form class="form-horizontal" method="post">
                  <?=$this->load->view('admin/error_message')?>
                  <div class="control-group">
                    <label class="control-label" for="nama">Nama</label>
                    <div class="controls">
                      <strong><?php echo $data['nama'] ?></strong>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="nilai_gambar">Nilai Gambar</label>
                    <div class="controls">
                      <input type="text" id="nilai_gambar" placeholder="nilai gambar" name="nilai_gambar" value="<?=isset($data['nilai_gambar']) ? $data['nilai_gambar'] : ''?>" class="input-mini">
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn btn-primary"><i class="icon-ok"></i> Simpan</button>
                        <a href="<?=site_url('admin/nilai')?>" class="btn"><i class="icon-remove"></i> Batal</a>
                    </div>
                  </div>
                </form>
            </div><!--/span-->
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->

      <hr>

    </div><!--/.fluid-container-->
