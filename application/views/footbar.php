      <!-- Example row of columns -->
      <div class="row-fluid">
        <div class="span5">
<!--
          <h2>Registrasi</h2>
-->
          <?php
          $news = $this->pmb->get_statik_news();
          ?>
          <strong><?= $news->title ?></strong> (<?= $news->created_at ?>)
          <p><?= substr($news->content,0,100) ?>..</p>
          <p><a class="btn" href="<?= site_url($news->permalink) ?>">selengkapnya &raquo;</a></p>
        </div>

        <?php if (session('username')) { ?>
        <div class="span3">
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
        <div class="span4">
            <p>&nbsp;</p>
            <ul>
                <li><a href="<?=site_url('dashboard/profile')?>">Update data pribadi</a></li>
                <li><a href="<?=site_url('dashboard/gantipassword')?>">Ganti password</a></li>
                <li><a href="<?=site_url('logout')?>">Logout</a></li>
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
