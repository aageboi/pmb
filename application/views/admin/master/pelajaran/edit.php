    <div class="container-fluid">
      <div class="row-fluid">
        <?=$this->load->view('admin/menu')?>
        <div class="span9">
          <div class="row-fluid">
            <div class="span12">
                <?=$this->load->view('breadcrumb')?>

                <h3>Data Pelajaran</h3>
                <form class="form-horizontal" method="post" action="<?=site_url('admin/pelajaran/edit')?>">
                  <?=$this->load->view('admin/error_message')?>
                  <!--
                  <div class="control-group">
                    <label class="control-label" for="kode">Kode Pelajaran</label>
                    <div class="controls">
                      <input type="text" id="kode" placeholder="kode" name="kode" value="<?=isset($data->kd_pel) ? $data->kd_pel : ''?>">
                    </div>
                  </div>
                  -->
                  <div class="control-group">
                    <label class="control-label" for="nama">Nama Pelajaran</label>
                    <div class="controls">
                      <input type="text" id="nama" placeholder="nama" name="nama" value="<?=isset($data->nama_pel) ? $data->nama_pel : ''?>">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="kriteria">Kriteria Kelulusan</label>
                    <div class="controls">
                      <input type="text" id="kriteria" placeholder="kriteria" name="kriteria" value="<?=isset($data->kriteria) ? $data->kriteria : ''?>">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="jumlah">Jumlah Soal</label>
                    <div class="controls">
                      <input type="text" id="jumlah" placeholder="jumlah soal" name="jumlah" value="<?=isset($data->jumlah_soal) ? $data->jumlah_soal : ''?>">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="ipa">IPA</label>
                    <div class="controls">
                      <input type="checkbox" id="ipa" name="ipa" value="ipa" <?=isset($data->kd_pel)&&(strtolower($data->kd_pel)=='ipa') ? "checked='checked'" : ''?>>
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="controls">
                        <input type="hidden" name="id" value="<?=$data->id?>">
                        <button type="submit" class="btn btn-primary"><i class="icon-ok"></i> Simpan</button>
                        <a href="<?=site_url('admin/pelajaran')?>" class="btn"><i class="icon-remove"></i> Batal</a>
                    </div>
                  </div>
                </form>
            </div><!--/span-->
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->

      <hr>

    </div><!--/.fluid-container-->
