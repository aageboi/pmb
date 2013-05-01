    <div class="container-fluid">
      <div class="row-fluid">
        <?=$this->load->view('admin/menu')?>
        <div class="span9">
          <div class="row-fluid">
            <div class="span12">
                <?=$this->load->view('breadcrumb')?>

                <h3>Data Kriteria Kelulusan</h3>
                <form class="form-horizontal" method="post" action="<?=site_url('admin/kriteria/edit')?>">
                  <?=$this->load->view('admin/error_message')?>
                  <div class="control-group">
                    <label class="control-label" for="pelajaran">Pelajaran</label>
                    <div class="controls">
                      <select name="pelajaran" id="pelajaran" class="span3">
                        <?php if ($pelajaran)
                        foreach ($pelajaran as $val => $text) { ?>
                        <option value="<?=$val?>" <?=(isset($data->id_pelajaran)&&$data->id_pelajaran==$val)?'selected':''?>><?=$text?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="kriteria">Kriteria</label>
                    <div class="controls">
                      <input type="text" id="kriteria" placeholder="kriteria" name="kriteria" value="<?=isset($data->kriteria) ? $data->kriteria : ''?>">
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="controls">
                        <input type="hidden" name="id" value="<?=$data->id?>">
                        <button type="submit" class="btn btn-primary"><i class="icon-ok"></i> Simpan</button>
                        <a href="<?=site_url('admin/statusnikah')?>" class="btn"><i class="icon-remove"></i> Batal</a>
                    </div>
                  </div>
                </form>
            </div><!--/span-->
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->

      <hr>

    </div><!--/.fluid-container-->
