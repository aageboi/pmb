<?=$this->load->view('tinymce')?>
    <div class="container-fluid">
      <div class="row-fluid">
        <?=$this->load->view('admin/menu')?>
        <div class="span9">
          <div class="row-fluid">
            <div class="span12">
                <?=$this->load->view('breadcrumb')?>

                <h3>Data Statik</h3>
                <form class="form-horizontal" method="post">
                  <?=$this->load->view('admin/error_message')?>
                  <div class="control-group">
                      <?=base_url()?>
                      <input type="text" class="input-large" id="permalink" placeholder="Permalink" name="permalink" value="<?=isset($data['permalink']) ? $data['permalink'] : ''?>">
                      <span class="help-inline"><i>permalink</i></span>
                  </div>
                  <div class="control-group">
                      <input type="text" class="input-xxlarge" id="title" placeholder="Judul" name="title" value="<?=isset($data['title']) ? $data['title'] : ''?>">
                  </div>
                  <div class="control-group">
                      <textarea id="content" placeholder="content" name="content" rows="5" class="span9"><?=isset($data['content']) ? $data['content'] : ''?></textarea>
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
