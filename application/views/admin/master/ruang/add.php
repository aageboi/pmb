    <div class="container-fluid">
      <div class="row-fluid">
        <?=$this->load->view('admin/menu')?>
        <div class="span9">
          <div class="row-fluid">
            <div class="span12">
                <?=$this->load->view('breadcrumb')?>

                <h3>Data Ruang Ujian</h3>
                <form class="form-horizontal" method="post">
                  <?=$this->load->view('admin/error_message')?>
                  <div class="control-group">
                    <label class="control-label" for="nama">Ruang</label>
                    <div class="controls">
                      <input type="text" id="nama" placeholder="nama" name="nama" value="<?=isset($data['nama']) ? $data['nama'] : ''?>">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="pelajaran">Pelajaran</label>
                    <div class="controls">
                      <select name="pelajaran" id="pelajaran" class="span3">
                        <?php if ($pelajaran)
                        foreach ($pelajaran as $val => $text) { ?>
                        <option value="<?=$val?>" <?=(isset($data['pelajaran'])&&$data['pelajaran']==$val)?'selected':''?>><?=$text?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div><!--
                  <div class="control-group">
                    <label class="control-label" for="lokasi">Lokasi</label>
                    <div class="controls">
                      <input type="text" id="lokasi" placeholder="lokasi" name="lokasi" value="<?=isset($data['lokasi']) ? $data['lokasi'] : ''?>">
                    </div>
                  </div>-->
                  <div class="control-group">
                    <label class="control-label" for="kapasitas">Kapasitas</label>
                    <div class="controls">
                      <input type="text" id="kapasitas" placeholder="kapasitas" name="kapasitas" value="<?=isset($data['kapasitas']) ? $data['kapasitas'] : ''?>">
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn btn-primary"><i class="icon-ok"></i> Simpan</button>
                        <a href="<?=site_url('admin/ruang')?>" class="btn"><i class="icon-remove"></i> Batal</a>
                    </div>
                  </div>
                </form>
            </div><!--/span-->
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->

      <hr>

    </div><!--/.fluid-container-->
