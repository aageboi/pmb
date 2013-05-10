<div class="span3">
  <div class="well sidebar-nav">
    <ul class="nav nav-list">
      <!--<li class="nav-header">Data Universitas</li>-->
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
      <?php if (session('role') == 'superadmin') { ?>
      <li class="nav-header"><i class="icon-list"></i> Master</li>
      <li<?=(isset($page)&&$page=='agama')?' class="active"':''?>><a href="<?=site_url('admin/agama')?>"><i class="icon-arrow-right"></i> Agama</a></li>
      <!--
      <li<?=(isset($page)&&$page=='dokumen')?' class="active"':''?>><a href="<?=site_url('admin/dokumen')?>">Dokumen</a></li>
      -->
      <li<?=(isset($page)&&$page=='jenkel')?' class="active"':''?>><a href="<?=site_url('admin/jenkel')?>"><i class="icon-arrow-right"></i> Jenis Kelamin</a></li>
      <li<?=(isset($page)&&$page=='jurusan')?' class="active"':''?>><a href="<?=site_url('admin/jurusan')?>"><i class="icon-arrow-right"></i> Jurusan</a></li>
      <li<?=(isset($page)&&$page=='kewarganegaraan')?' class="active"':''?>><a href="<?=site_url('admin/kewarganegaraan')?>"><i class="icon-arrow-right"></i> Kewarganegaraan</a></li>
      <li<?=(isset($page)&&$page=='kodesekolah')?' class="active"':''?>><a href="<?=site_url('admin/kodesekolah')?>"><i class="icon-arrow-right"></i> Kode Sekolah</a></li>
      <li<?=(isset($page)&&$page=='pekerjaan')?' class="active"':''?>><a href="<?=site_url('admin/pekerjaan')?>"><i class="icon-arrow-right"></i> Pekerjaan</a></li>
      <li<?=(isset($page)&&$page=='pendidikan')?' class="active"':''?>><a href="<?=site_url('admin/pendidikan')?>"><i class="icon-arrow-right"></i> Pendidikan</a></li>
      <li<?=(isset($page)&&$page=='provinsi')?' class="active"':''?>><a href="<?=site_url('admin/provinsi')?>"><i class="icon-arrow-right"></i> Provinsi</a></li>
      <li<?=(isset($page)&&$page=='statusnikah')?' class="active"':''?>><a href="<?=site_url('admin/statusnikah')?>"><i class="icon-arrow-right"></i> Status Pernikahan</a></li>
      <li<?=(isset($page)&&$page=='sumberbiaya')?' class="active"':''?>><a href="<?=site_url('admin/sumberbiaya')?>"><i class="icon-arrow-right"></i> Sumber Biaya</a></li>
      <!--
      <li><a href="#">Kapasitas Ruang</a></li>
      <li<?=(isset($page)&&$page=='kapasitas')?' class="active"':''?>><a href="<?=site_url('admin/kapasitas')?>">Kapasitas Ruang</a></li>
      <li<?=(isset($page)&&$page=='kriteria')?' class="active"':''?>><a href="<?=site_url('admin/kriteria')?>">Kriteria Kelulusan</a></li>
      <li class="nav-header">Manage</li>
      <li<?=(isset($page)&&$page=='akun')?' class="active"':''?>><a href="<?=site_url('admin/akun')?>">Akun</a></li>
      -->
      <?php } ?>
    </ul>
  </div><!--/.well -->
</div><!--/span-->
