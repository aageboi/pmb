<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container-fluid">
      <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="brand" href="<?=base_url()?>">PMB UNTAR</a>
      <div class="nav-collapse collapse">

        <ul class="nav">
          <li<?=(! isset($page))?' class="active"':''?>><a href="<?=site_url('admin/')?>"><i class="icon-home"></i> Home</a></li>
          <li class="dropdown<?=(isset($page)&&$page=='manage')?' active':''?>">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-chevron-down"></i> Manage <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="<?=site_url('admin/akun')?>"><i class="icon-user"></i> Akun</a></li>
              <li><a href="<?=site_url('admin/registrasi')?>"><i class="icon-user"></i> Registrasi</a></li>
              <li class="divider"></li>
              <li><a href="<?=site_url('admin/nilai/gambar')?>"><i class="icon-book"></i> Nilai Gambar</a></li>
              <li class="divider"></li>
              <li class="dropdown-submenu">
                <a href="#" onclick="javascript:void(0)"><i class="icon-th-list"></i> Laporan</a>
                <ul class="dropdown-menu">
                  <li<?=(isset($page)&&$page=='absensi')?' class="active"':''?>><a href="<?=site_url('admin/absensi')?>"><i class="icon-chevron-right"></i> Absensi</a></li>
                  <li<?=(isset($page)&&$page=='nilai')?' class="active"':''?>><a href="<?=site_url('admin/nilai')?>"><i class="icon-chevron-right"></i> Nilai</a></li>
                </ul>
              </li>
              <li class="dropdown-submenu">
                <a href="#" onclick="javascript:void(0)"><i class="icon-file"></i> Data Master</a>
                <ul class="dropdown-menu">
                  <li<?=(isset($page)&&$page=='agama')?' class="active"':''?>><a href="<?=site_url('admin/agama')?>"><i class="icon-chevron-right"></i> Agama</a></li>
                  <li<?=(isset($page)&&$page=='jenkel')?' class="active"':''?>><a href="<?=site_url('admin/jenkel')?>"><i class="icon-chevron-right"></i> Jenis Kelamin</a></li>
                  <li<?=(isset($page)&&$page=='jurusan')?' class="active"':''?>><a href="<?=site_url('admin/jurusan')?>"><i class="icon-chevron-right"></i> Jurusan</a></li>
                  <li<?=(isset($page)&&$page=='kewarganegaraan')?' class="active"':''?>><a href="<?=site_url('admin/kewarganegaraan')?>"><i class="icon-chevron-right"></i> Kewarganegaraan</a></li>
                  <li<?=(isset($page)&&$page=='kodesekolah')?' class="active"':''?>><a href="<?=site_url('admin/kodesekolah')?>"><i class="icon-chevron-right"></i> Kode Sekolah</a></li>
                  <li<?=(isset($page)&&$page=='pekerjaan')?' class="active"':''?>><a href="<?=site_url('admin/pekerjaan')?>"><i class="icon-chevron-right"></i> Pekerjaan</a></li>
                  <li<?=(isset($page)&&$page=='pendidikan')?' class="active"':''?>><a href="<?=site_url('admin/pendidikan')?>"><i class="icon-chevron-right"></i> Pendidikan</a></li>
                  <li<?=(isset($page)&&$page=='provinsi')?' class="active"':''?>><a href="<?=site_url('admin/provinsi')?>"><i class="icon-chevron-right"></i> Provinsi</a></li>
                  <li<?=(isset($page)&&$page=='statusnikah')?' class="active"':''?>><a href="<?=site_url('admin/statusnikah')?>"><i class="icon-chevron-right"></i> Status Pernikahan</a></li>
                  <li<?=(isset($page)&&$page=='sumberbiaya')?' class="active"':''?>><a href="<?=site_url('admin/sumberbiaya')?>"><i class="icon-chevron-right"></i> Sumber Biaya</a></li>
                  <li><a href=""></a></li>
                  <li><a href=""></a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li <?=(isset($page)&&$page=='statik')?'class="active"':''?>><a href="<?=site_url('admin/statik')?>"><i class="icon-pencil"></i> Sites</a></li>
        </ul>

        <ul class="nav pull-right">
            <li id="fat-menu" class="dropdown">
              <a href="#" id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown"><?=session('un')?> <b class="caret"></b></a>
              <ul class="dropdown-menu" role="menu" aria-labelledby="drop3">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="<?=site_url('admin/sessions/logout')?>">Logout</a></li>
              </ul>
            </li>
        </ul>

      </div><!--/.nav-collapse -->
    </div>
  </div>
</div>
