    <div class="container-fluid">
      <div class="row-fluid">
        <?=$this->load->view('admin/menu')?>
        <div class="span9">
          <div class="row-fluid">
            <div class="span12">
                <?=$this->load->view('breadcrumb')?>

                <h3>Data Periode Pendaftaran</h3>
                <form class="form-horizontal" method="post" action="<?=site_url('admin/periode/edit')?>">
                  <?=$this->load->view('admin/error_message')?>
                  <div class="control-group">
                    <label class="control-label" for="nama">Nama Periode</label>
                    <div class="controls">
                      <input type="text" id="nama" placeholder="nama" name="nama" value="<?=isset($data->nama_per) ? $data->nama_per : ''?>">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="tgl1">Tanggal Mulai</label>
                    <div class="controls">
                      <input type="text" id="tgl1" placeholder="<?= date('Y/m/d') ?>" name="tgl1" value="<?=isset($data->tgl_mulai) ? $data->tgl_mulai : date('Y/m/d') ?>">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="tgl2">Tanggal Selesai</label>
                    <div class="controls">
                      <input type="text" id="tgl2" placeholder="<?= date('Y/m/d') ?>" name="tgl2" value="<?=isset($data->tgl_selesai) ? $data->tgl_selesai : date('Y/m/d') ?>">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="thn">Tahun Ajaran</label>
                    <div class="controls">
                      <input type="text" id="thn" placeholder="<?= date('Y').'/'.(date('Y')+1) ?>" name="thn" value="<?=isset($data->thn_ajaran) ? $data->thn_ajaran : date('Y').'/'.(date('Y')+1) ?>">
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="controls">
                        <input type="hidden" name="id" value="<?=$data->id?>">
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
