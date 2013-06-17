    <div class="container-fluid">
      <div class="row-fluid">
        <?=$this->load->view('admin/menu')?>
        <div class="span9">
          <div class="row-fluid">
            <div class="span12">
                <?=$this->load->view('breadcrumb')?>

                <h3>Data Program Studi</h3>
                <form class="form-horizontal" method="post">
                  <?=$this->load->view('admin/error_message')?>
                  <div class="control-group">
                    <label class="control-label" for="jurusan">Jurusan</label>
                    <div class="controls">
                        <select name="jurusan" id="jurusan">
                            <?php foreach ($jurusan as $jur) { ?>
                            <option value="<?=$jur->id?>" <?=(isset($data['jurusan'])&&$data['jurusan']==$jur->id)?'selected':''?>><?=$jur->nama_jurusan?></option>
                            <?php } ?>
                        </select>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="kode">Kode</label>
                    <div class="controls">
                      <input type="text" id="kode" placeholder="kode" name="kode" value="<?=isset($data['kode']) ? $data['kode'] : ''?>">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="nama">Program Studi</label>
                    <div class="controls">
                      <input type="text" id="nama" placeholder="nama" name="nama" value="<?=isset($data['nama']) ? $data['nama'] : ''?>">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="gambar">Ujian Gambar</label>
                    <div class="controls">
                      <input type="checkbox" id="gambar" name="gambar" value="1" <?=isset($data['gambar'])&&$data['gambar'] ? "checked='checked'" : ''?>>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="biaya">Biaya</label>
                    <div class="controls">
                      <input type="text" id="biaya" placeholder="biaya" name="biaya" value="<?=isset($data['biaya_bangunan']) ? $data['biaya_bangunan'] : ''?>">
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn btn-primary"><i class="icon-ok"></i> Simpan</button>
                        <a href="<?=site_url('admin/prodi')?>" class="btn"><i class="icon-remove"></i> Batal</a>
                    </div>
                  </div>
                </form>
            </div><!--/span-->
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->

      <hr>

    </div><!--/.fluid-container-->
