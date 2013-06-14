<div class="span3">
  <div class="well sidebar-nav">
    <ul class="nav nav-list">
      <li class="nav-header"><i class="icon-list"></i> Menu</li>
      <li<?=(isset($page)&&$page=='soal')?' class="active"':''?>><a href="<?=site_url('admin/soal')?>"><i class="icon-pencil"></i> Bank Soal</a></li>
      <li<?=(isset($page)&&$page=='grade')?' class="active"':''?>><a href="<?=site_url('admin/grade')?>"><i class="icon-screenshot"></i> Grade</a></li>
      <li<?=(isset($page)&&$page=='jadwal')?' class="active"':''?>><a href="<?=site_url('admin/jadwal')?>"><i class="icon-time"></i> Jadwal Pembayaran</a></li>
      <li<?=(isset($page)&&$page=='jalur')?' class="active"':''?>><a href="<?=site_url('admin/jalur')?>"><i class="icon-screenshot"></i> Jalur Pendaftaran</a></li>
      <li<?=(isset($page)&&$page=='pelajaran')?' class="active"':''?>><a href="<?=site_url('admin/pelajaran')?>"><i class="icon-screenshot"></i> Pelajaran</a></li>
      <li<?=(isset($page)&&$page=='periode')?' class="active"':''?>><a href="<?=site_url('admin/periode')?>"><i class="icon-calendar"></i> Periode</a></li>
      <li<?=(isset($page)&&$page=='prodi')?' class="active"':''?>><a href="<?=site_url('admin/prodi')?>"><i class="icon-screenshot"></i> Program Studi</a></li>
      <li<?=(isset($page)&&$page=='ruang')?' class="active"':''?>><a href="<?=site_url('admin/ruang')?>"><i class="icon-screenshot"></i> Ruang Ujian</a></li>
      <li<?=(isset($page)&&$page=='syarat')?' class="active"':''?>><a href="<?=site_url('admin/syarat')?>"><i class="icon-screenshot"></i> Syarat Pendaftaran</a></li>
      <li<?=(isset($page)&&$page=='dokumen')?' class="active"':''?>><a href="<?=site_url('admin/dokumen')?>"><i class="icon-book"></i> Dokumen</a></li>
    </ul>
  </div><!--/.well -->
</div><!--/span-->
