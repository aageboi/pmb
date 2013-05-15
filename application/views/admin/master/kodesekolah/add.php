    <div class="container-fluid">
      <div class="row-fluid">
        <?=$this->load->view('admin/menu')?>
        <div class="span9">
          <div class="row-fluid">
            <div class="span12">
                <?=$this->load->view('breadcrumb')?>

                <h3>Data Sekolah</h3>
                <form class="form-horizontal" method="post">
                  <?=$this->load->view('admin/error_message')?>
                  <div class="control-group">
                    <label class="control-label" for="kode">Kode Sekolah</label>
                    <div class="controls">
                      <input type="text" id="kode" class="span2" placeholder="kode sekolah" name="kode" value="<?=isset($data['kode']) ? $data['kode'] : ''?>">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="nama">Nama Sekolah</label>
                    <div class="controls">
                      <input type="text" id="nama" placeholder="nama" name="nama" value="<?=isset($data['syarat']) ? $data['syarat'] : ''?>">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="alamat">Alamat</label>
                    <div class="controls">
                        <textarea id="alamat" placeholder="alamat" name="alamat" class="span9"><?=isset($data['alamat']) ? $data['alamat'] : ''?></textarea>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="provinsi">Provinsi</label>
                    <div class="controls">
                      <select name="provinsi" id="provinsi" class="span3">
                        <?php if ($provinsi)
                        foreach ($provinsi as $val => $text) { ?>
                        <option value="<?=$val?>" <?=(isset($data['provinsi'])&&$data['provinsi']==$val)?'selected':''?>><?=$text?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="kota">Kota</label>
                    <div class="controls">
                      <input type="text" id="kota" placeholder="kota" name="kota" value="<?=isset($data['kota']) ? $data['kota'] : ''?>">
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn btn-primary"><i class="icon-ok"></i> Simpan</button>
                        <a href="<?=site_url('admin/kodesekolah')?>" class="btn"><i class="icon-remove"></i> Batal</a>
                    </div>
                  </div>
                </form>
            </div><!--/span-->
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->

      <hr>

    </div><!--/.fluid-container-->
