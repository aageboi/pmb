<div class="span3">
  <div class="well sidebar-nav">
    <ul class="nav nav-list">
      <!--<li class="nav-header">Data Universitas</li>-->
      <li<?=(isset($page)&&$page=='soal')?' class="active"':''?>><a href="<?=site_url('admin/soal')?>">Bank Soal</a></li>
      <li<?=(isset($page)&&$page=='grade')?' class="active"':''?>><a href="<?=site_url('admin/grade')?>">Grade</a></li>
      <li<?=(isset($page)&&$page=='jadwal')?' class="active"':''?>><a href="<?=site_url('admin/jadwal')?>">Jadwal Pembayaran</a></li>
      <li<?=(isset($page)&&$page=='jalur')?' class="active"':''?>><a href="<?=site_url('admin/jalur')?>">Jalur Pendaftaran</a></li>
      <li<?=(isset($page)&&$page=='pelajaran')?' class="active"':''?>><a href="<?=site_url('admin/pelajaran')?>">Pelajaran</a></li>
      <li<?=(isset($page)&&$page=='periode')?' class="active"':''?>><a href="<?=site_url('admin/periode')?>">Periode</a></li>
      <li<?=(isset($page)&&$page=='prodi')?' class="active"':''?>><a href="<?=site_url('admin/prodi')?>">Program Studi</a></li>
      <li<?=(isset($page)&&$page=='ruang')?' class="active"':''?>><a href="<?=site_url('admin/ruang')?>">Ruang Ujian</a></li>
      <li<?=(isset($page)&&$page=='syarat')?' class="active"':''?>><a href="<?=site_url('admin/syarat')?>">Syarat Pendaftaran</a></li>
      <li class="nav-header">Master</li>
      <li<?=(isset($page)&&$page=='agama')?' class="active"':''?>><a href="<?=site_url('admin/agama')?>">Agama</a></li>
      <!--
      <li<?=(isset($page)&&$page=='dokumen')?' class="active"':''?>><a href="<?=site_url('admin/dokumen')?>">Dokumen</a></li>
      -->
      <li<?=(isset($page)&&$page=='jenkel')?' class="active"':''?>><a href="<?=site_url('admin/jenkel')?>">Jenis Kelamin</a></li>
      <li<?=(isset($page)&&$page=='jurusan')?' class="active"':''?>><a href="<?=site_url('admin/jurusan')?>">Jurusan</a></li>
      <li<?=(isset($page)&&$page=='kewarganegaraan')?' class="active"':''?>><a href="<?=site_url('admin/kewarganegaraan')?>">Kewarganegaraan</a></li>
      <li<?=(isset($page)&&$page=='kodesekolah')?' class="active"':''?>><a href="<?=site_url('admin/kodesekolah')?>">Kode Sekolah</a></li>
      <li<?=(isset($page)&&$page=='pekerjaan')?' class="active"':''?>><a href="<?=site_url('admin/pekerjaan')?>">Pekerjaan</a></li>
      <li<?=(isset($page)&&$page=='pendidikan')?' class="active"':''?>><a href="<?=site_url('admin/pendidikan')?>">Pendidikan</a></li>
      <li<?=(isset($page)&&$page=='provinsi')?' class="active"':''?>><a href="<?=site_url('admin/provinsi')?>">Provinsi</a></li>
      <li<?=(isset($page)&&$page=='statusnikah')?' class="active"':''?>><a href="<?=site_url('admin/statusnikah')?>">Status Pernikahan</a></li>
      <li<?=(isset($page)&&$page=='sumberbiaya')?' class="active"':''?>><a href="<?=site_url('admin/sumberbiaya')?>">Sumber Biaya</a></li>
      <!--
      <li><a href="#">Kapasitas Ruang</a></li>
      <li<?=(isset($page)&&$page=='kapasitas')?' class="active"':''?>><a href="<?=site_url('admin/kapasitas')?>">Kapasitas Ruang</a></li>
      <li<?=(isset($page)&&$page=='kriteria')?' class="active"':''?>><a href="<?=site_url('admin/kriteria')?>">Kriteria Kelulusan</a></li>
      -->
      <li class="nav-header">Manage</li>
      <li<?=(isset($page)&&$page=='akun')?' class="active"':''?>><a href="<?=site_url('admin/akun')?>">Akun</a></li>
    </ul>
  </div><!--/.well -->
</div><!--/span-->
