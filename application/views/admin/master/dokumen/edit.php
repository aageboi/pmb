    <div class="container-fluid">
      <div class="row-fluid">
        <?=$this->load->view('admin/menu')?>
        <div class="span9">
          <div class="row-fluid">
            <div class="span12">
                <?=$this->load->view('breadcrumb')?>

                <h3>Data Dokumen</h3>
                <form class="form-horizontal" method="post" action="<?=site_url('admin/dokumen/edit')?>" enctype="multipart/form-data">
                  <?=$this->load->view('admin/error_message')?>
                  <div class="control-group">
                    <label class="control-label" for="title">Judul Dokumen</label>
                    <div class="controls">
                      <input type="text" id="title" placeholder="title" name="title" value="<?=isset($data->title) ? $data->title : ''?>" class="input-xxlarge">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="name">Dokumen</label>
                    <div class="controls">
                      <input type="file" name="name">
                      <span class="help-block">Format dokumen: pdf</span>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="name">Bisa di lihat publik ?</label>
                    <div class="controls">
                        <input type="checkbox" name="active" value="1" <?=($data->active)?'checked="checked"':''?>> Ya
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="controls">
                        <input type="hidden" name="id" value="<?=$data->id?>">
                        <button type="submit" class="btn btn-primary"><i class="icon-ok"></i> Simpan</button>
                        <a href="<?=site_url('admin/dokumen')?>" class="btn"><i class="icon-remove"></i> Batal</a>
                    </div>
                  </div>
                </form>
            </div><!--/span-->
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->

      <hr>

    </div><!--/.fluid-container-->
