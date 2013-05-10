<?=$this->load->view('header')?>
<style type="text/css">
  body {
    padding-top: 60px;
    padding-bottom: 40px;
  }
  .sidebar-nav {
    padding: 9px 0;
  }
  .imghome {height:141px !important; width:170px;}

  @media (max-width: 980px) {
    /* Enable use of floated navbar text */
    .navbar-text.pull-right {
      float: none;
      padding-left: 5px;
      padding-right: 5px;
    }
  }
</style>

    <?=$this->load->view('admin/navbar')?>
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span2"></div>
        <div class="span9">
          <div class="row-fluid">
            <div class="span3">
              <a class="btn" href="<?=site_url('admin/soal')?>">
                <img src="<?=base_url()?>assets/img/buku.gif" title="Bank Soal" class="img-polaroid imghome">
              </a>
            </div><!--/span-->
            <div class="span3">
              <a class="btn" href="<?=site_url('admin/grade')?>">
                <img src="<?=base_url()?>assets/img/rank.jpeg" title="Grade" class="img-polaroid imghome">
              </a>
            </div><!--/span-->
            <div class="span3">
              <a class="btn" href="<?=site_url('admin/jadwal')?>">
                <img src="<?=base_url()?>assets/img/jadwal.png" title="Jadwal Pembayaran" class="img-polaroid imghome">
              </a>
            </div><!--/span-->
          </div><!--/row-->
          <br>
          <div class="row-fluid">
            <div class="span3">
              <a class="btn" href="<?=site_url('admin/jalur')?>">
                <img src="<?=base_url()?>assets/img/jalur.jpg" title="Jalur Pendaftaran" class="img-polaroid imghome">
              </a>
            </div><!--/span-->
            <div class="span3">
              <a class="btn" href="<?=site_url('admin/pelajaran')?>">
                <img src="<?=base_url()?>assets/img/pelajaran.jpg" title="Pelajaran" class="img-polaroid imghome">
              </a>
            </div><!--/span-->
            <div class="span3">
              <a class="btn" href="<?=site_url('admin/periode')?>">
                <img src="<?=base_url()?>assets/img/periode.jpeg" title="Periode" class="img-polaroid imghome">
              </a>
            </div><!--/span-->
          </div><!--/row-->
          <br>
          <div class="row-fluid">
            <div class="span3">
              <a class="btn" href="<?=site_url('admin/prodi')?>">
                <img src="<?=base_url()?>assets/img/prodi.png" title="Program Studi" class="img-polaroid imghome">
              </a>
            </div><!--/span-->
            <div class="span3">
              <a class="btn" href="<?=site_url('admin/ruang')?>">
                <img src="<?=base_url()?>assets/img/ruang.png" title="Ruang Ujian" class="img-polaroid imghome">
              </a>
            </div><!--/span-->
            <div class="span3">
              <a class="btn" href="<?=site_url('admin/syarat')?>">
                <img src="<?=base_url()?>assets/img/syarat.jpeg" title="Syarat Pendaftaran" class="img-polaroid imghome">
              </a>
            </div><!--/span-->
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->

      <hr>

    </div><!--/.fluid-container-->

<?=$this->load->view('footer')?>
<script>
$('.imghome').tooltip({'placement':'right'});
</script>
