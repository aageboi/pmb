      <!-- Example row of columns -->
      <div class="row-fluid">

        <div class="span3">
          <p><strong>INFORMASI FAKULTAS</strong></p>
          <p>
            <a href="<?= site_url('fak-ekonomi') ?>">Fakultas Ekonomi</a><br>
            <a href="<?= site_url('fak-teknik') ?>">Fakultas Teknik</a><br>
            <a href="<?= site_url('fak-hukun') ?>">Fakultas Hukum</a><br>
            <a href="<?= site_url('fak-kedokteran') ?>">Fakultas Kedokteran</a><br>
            <a href="<?= site_url('fak-psikologi') ?>">Fakultas Psikologi</a><br>
            <a href="<?= site_url('fak-srd') ?>">Fakultas Seni Rupa dan Desain</a><br>
            <a href="<?= site_url('fak-ti') ?>">Fakultas Teknologi Informasi</a><br>
            <a href="<?= site_url('fak-ilkom') ?>">Fakultas Ilmu Komunikasi</a><br>
          </p>
        </div>

        <div class="span3">
          <p><strong>JALUR BEASISWA</strong></p>
          <p><a href="<?= site_url('jalur-pu') ?>">Jaringan Prestasi Unggulan (JPU)</a><br>
          <a href="<?= site_url('jalur-pp') ?>">Jaringan Penelusuran Prestasi (JPP)</a><br>
          <a href="<?= site_url('jalur-pk') ?>">Jaringan Prestasi Khusus (JPK)</a><br>
          <a href="<?= site_url('jalur-pun') ?>">Jaringan Prestasi Ujian Nasional (JPUN)</a><br>
          <a href="<?= site_url('jalur-kk') ?>">Jaringan Khusus Kerjasama (JKK)</a></p>

          <p><strong>JALUR REGULER</strong></p>
          <p><a href="<?= site_url('jalur-usm-jakarta') ?>">Ujian Saringan Masuk (USM) Jakarta</a><br>
          <a href="<?= site_url('jalur-usm-daerah') ?>">Ujian Saringan Masuk (USM) Daerah</a></p>
        </div>

        <?php if (session('username')) { ?>


        <div class="well span6">
        <div class="span5">
            <p>
                <strong>Hai, <?= session('username')?></strong>
            </p>
            <ul>
                <li><a href="<?=site_url('dashboard')?>">Dashboard</a></li>
                <li><a href="<?=site_url('dashboard/registrasi')?>">Registrasi</a></li>
                <li><a href="<?=site_url('petunjuk#syarat')?>">Syarat Pendaftaran</a></li>
                <li><a href="<?=site_url('dashboard/lihathasil')?>">Lihat hasil ujian</a></li>
            </ul>
        </div>
        <div class="span7">
            <p>&nbsp;</p>
            <ul>
                <li><a href="<?=site_url('dashboard/profile')?>">Update data pribadi</a></li>
                <li><a href="<?=site_url('dashboard/gantipassword')?>">Ganti password</a></li>
                <li><a href="<?=site_url('logout')?>">Logout</a></li>
            </ul>
        </div>
        </div>

        <?php } else { ?>

        <div class="span3">
            <?php $alamat = $this->pmb->get_statik('alamat'); ?>
            <?= $alamat->content ?>
        </div>

        <div class="span3">
            <form class="well form-horizontal" method="post" action="<?=site_url('login')?>">
              <div class="control-group">
                  <input type="text" placeholder="Alamat Email" name="username" class="input-block-level">
              </div>
              <div class="control-group">
                  <input type="password" placeholder="Password" name="password" class="input-block-level">
              </div>
              <div class="control-group">
                  <button type="submit" class="btn btn-primary"><i class="icon-lock"></i> masuk</button><br><br>
                  <ul>
                      <li>
                    <a href="<?=site_url('signup')?>">Buat akun baru</a><br>
                  </li>
                      <li>
                    <a href="<?=site_url('forgot')?>">Lupa password</a><br>
                  </li>
                  </ul>
              </div>
            </form>
        </div>

        <?php } ?>

      </div>

      <hr>
