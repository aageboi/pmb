<?=$this->load->view('header')?>
<?=$this->load->view('navbar')?>
<div class="row-fluid">
    <div class="span3">
        <div class="well sidebar-nav">
            <ul class="nav">
              <li><i class="icon-chevron-down"></i> <strong><?=ucfirst(session('username'))?></strong></li>
            </ul>
            <ul class="nav nav-tabs">
              <li><a href="<?=site_url('dashboard')?>"><i class="icon-home"></i> Dashboard</a></li>
              <li><a href="<?=site_url('dashboard/registrasi')?>"><i class="icon-list"></i> Formulir Pendaftaran</a></li>
              <?php if ($this->pmb->is_registered() && ! $this->pmb->is_verified()) { ?>
              <li><a href="<?=site_url('dashboard/konfirmasibayar')?>"><i class="icon-tags"></i> Konfirmasi Pembayaran</a></li>
              <?php } ?>
              <?php if ($this->pmb->is_verified()) { ?>
              <?php if (! $this->pmb->already_test()) { ?>
              <li><a href="<?=site_url('dashboard/cetak')?>"><i class="icon-print"></i> Cetak Kartu Ujian</a></li>
              <li><a href="<?=site_url('dashboard/ujian')?>"><i class="icon-pencil"></i> Ujian Online</a></li>
              <?php } ?>
              <li><a href="<?=site_url('dashboard/lihathasil')?>"><i class="icon-book"></i> Lihat hasil ujian</a></li>
              <?php } ?>
              <li><a href="<?=site_url('dashboard/profile')?>"><i class="icon-user"></i> Profile</a></li>
              <li><a href="<?=site_url('dashboard/gantipassword')?>"><i class="icon-lock"></i> Ganti Password</a></li>
              <li><a href="<?=site_url('logout')?>" onclick="return confirm('Anda hendak logout?');"><i class="icon-off"></i> Logout</a></li>
            </ul>
        </div>
    </div>
    <div class="span9">
        <?=$this->load->view('error_message')?>
        <?=$this->load->view($yield)?>
    </div>
</div>
<hr>
<?=$this->load->view('footer')?>
