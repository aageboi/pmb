    <div class="container-fluid">
      <div class="row-fluid">
        <?=$this->load->view('admin/menu')?>
        <div class="span9">
          <div class="row-fluid">
            <div class="span12">
                <?=$this->load->view('breadcrumb')?>

                <h3>Data Dokumen</h3>
                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                  <?=$this->load->view('admin/error_message')?>
                  <div class="control-group">
                    <label class="control-label" for="title">Judul Dokumen</label>
                    <div class="controls">
                      <input type="text" id="title" placeholder="judul dokumen" name="title" value="<?=isset($data['title']) ? $data['title'] : ''?>">
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
                        <input type="checkbox" name="active" value="1"> Ya
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="controls">
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
