      <!-- Example row of columns -->
      <div class="row-fluid">
        <div class="span5">
<!--
          <h2>Registrasi</h2>
-->
          <strong>Pendaftaran Mahasiswa Baru S-1 Tahun Akademik 2013/2014</strong> (2012-08-28)
          <p>Pendaftaran mahasiswa baru program sarjana (S1) tahun akademik 2013/2014 akan segera dibuka. Silakan cek di masing-masing Jalur Penerimaan untuk tanggal dan persyaratan pendaftaran..</p>
          <p><a class="btn" href="#">selengkapnya &raquo;</a></p>
        </div>

        <?php if (session('username')) { ?>
        <div class="span3">
            <p>
                <strong>Hai, <?= session('username')?></strong>&nbsp;
                (<a href="<?= site_url('logout')?>">logout</a>)
            </p>
            <ul>
                <li><a href="<?=site_url('dashboard')?>">Dashboard</a></li>
                <li><a href="<?=site_url('dashboard/registrasi')?>">Registrasi</a></li>
                <li><a href="">Syarat Pendaftaran</a></li>
                <li><a href="">Kriteria kelulusan</a></li>
            </ul>
        </div>
        <div class="span4">
            <p>&nbsp;</p>
            <ul>
                <li><a href="">Laporan</a></li>
                <li><a href="">Lihat hasil ujian</a></li>
                <li><a href="">Update data pribadi</a></li>
                <li><a href="<?=site_url('dashboard/gantipassword')?>">Ganti password</a></li>
            </ul>
        </div>
        <?php } else { ?>

        <div class="span3">
<!--
          <h2>Pengumuman</h2>
-->
          <strong>Lihat Hasil Ujian</strong>
          <br><br>
          <form class="form-search">
            <input type="text" class="input-medium search-query" name="idreg" placeholder="Nomor Ujian">
            <button type="submit" class="btn"><i class="icon-search"></i></button>
          </form>
          <p>
            Nomor registrasi sepuluh digit contoh : 011161XXXX<br>
            <a href="<?=site_url('login')?>">lupa nomor registrasi</a>
          </p>
        </div>
        <div class="span4">
            <form class="well form-horizontal" method="post" action="<?=site_url('login')?>">
              <div class="control-group">
                  <input type="text" placeholder="Alamat Email" name="username" class="input-block-level">
              </div>
              <div class="control-group">
                  <input type="password" placeholder="Password" name="password" class="input-block-level">
              </div>
              <div class="control-group">
                  <button type="submit" class="btn btn-primary"><i class="icon-lock"></i> Login</button><br><br>
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
