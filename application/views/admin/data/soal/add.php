<?=$this->load->view('tinymce')?>
    <div class="container-fluid">
      <div class="row-fluid">
        <?=$this->load->view('admin/menu')?>
        <div class="span9">
          <div class="row-fluid">
            <div class="span12">
                <?=$this->load->view('breadcrumb')?>

                <h3>Data Bank Soal</h3>
                <form class="form-horizontal" method="post">
                  <?=$this->load->view('admin/error_message')?>
                  <div class="control-group">
                    <select name="pel" id="pel" class="span4">
                        <?php if ($pelajaran)
                        foreach ($pelajaran as $val => $text) { ?>
                        <option value="<?=$val?>" <?=(isset($data['id_pelajaran'])&&$data['id_pelajaran']==$val)?'selected':''?>><?=$text?></option>
                        <?php } ?>
                    </select>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <strong>Tingkat kesulitan</strong>&nbsp;
                    <select name="tipe" id="tipe" class="span2">
                        <option value="1">Mudah</option>
                        <option value="2">Sedang</option>
                        <option value="3">Sulit</option>
                    </select>
                  </div>
                  <div class="control-group">
                      <!--
                      <div class="input-prepend">
                        <span class="add-on">no urut</span>
                        <input type="text" id="urut" name="urut" value="<?=isset($data['no_urut']) ? $data['no_urut'] : ''?>" class="span3">
                      </div><br><br>
                      -->
                      <textarea id="soal" placeholder="soal" name="soal" rows="5" class="span9" placeholder="Soal"><?=isset($data['isi_soal']) ? $data['isi_soal'] : ''?></textarea>
                  </div>
                  <div class="control-group">
                    <label class="checkbox inline" for="pilihan_a">
                      <input type="radio" value="a" name="jawaban" checked>
                      <div class="input-prepend">
                        <span class="add-on">a</span>
                        <input class="input-xxlarge" id="pilihan_a" name="pilihan_a" type="text" placeholder="Pilihan A" value="<?=isset($data['isi_pilihan_a']) ? $data['isi_pilihan_a'] : ''?>">
                      </div>
                    </label>
                    <br>
                    <label class="checkbox inline" for="pilihan_b">
                      <input type="radio" value="b" name="jawaban">
                      <div class="input-prepend">
                        <span class="add-on">b</span>
                        <input class="input-xxlarge" id="pilihan_b" name="pilihan_b" type="text" placeholder="Pilihan B" value="<?=isset($data['isi_pilihan_b']) ? $data['isi_pilihan_b'] : ''?>">
                      </div>
                    </label>
                    <br>
                    <label class="checkbox inline" for="pilihan_c">
                      <input type="radio" value="c" name="jawaban">
                      <div class="input-prepend">
                        <span class="add-on">c</span>
                        <input class="input-xxlarge" id="pilihan_c" name="pilihan_c" type="text" placeholder="Pilihan C" value="<?=isset($data['isi_pilihan_c']) ? $data['isi_pilihan_c'] : ''?>">
                      </div>
                    </label>
                    <br>
                    <label class="checkbox inline" for="pilihan_d">
                      <input type="radio" value="d" name="jawaban">
                      <div class="input-prepend">
                        <span class="add-on">d</span>
                        <input class="input-xxlarge" id="pilihan_d" name="pilihan_d" type="text" placeholder="Pilihan D" value="<?=isset($data['isi_pilihan_d']) ? $data['isi_pilihan_d'] : ''?>">
                      </div>
                    </label>
                  </div>
                  <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn btn-primary"><i class="icon-ok"></i> Simpan</button>
                        <a href="<?=site_url('admin/soal')?>" class="btn"><i class="icon-remove"></i> Batal</a>
                    </div>
                  </div>
                </form>
            </div><!--/span-->
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->

      <hr>

    </div><!--/.fluid-container-->
