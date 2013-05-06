<?=$this->load->view('header')?>
<?=$this->load->view('navbar')?>
<div class="row-fluid">
    <div class="span3">
        <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li><strong><?=ucfirst(session('username'))?></strong></li>
            </ul>
            <hr>
            <ul class="nav nav-list">
              <li><a href="<?=site_url('dashboard')?>">Dashboard</a></li>
              <li><a href="<?=site_url('dashboard/registrasi')?>">Formulir Pendaftaran</a></li>
              <li><a href="<?=site_url('dashboard/konfirmasibayar')?>">Konfirmasi Pembayaran</a></li>
              <li><a href="<?=site_url('dashboard/ujian')?>">Ujian Online</a></li>
              <li><a href="<?=site_url('dashboard/lihathasil')?>">Lihat hasil ujian</a></li>
              <li><a href="<?=site_url('dashboard/gantipassword')?>">Ganti Password</a></li>
              <li><a href="<?=site_url('logout')?>">Logout</a></li>
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
