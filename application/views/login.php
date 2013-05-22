<?=$this->load->view('header')?>
<?=$this->load->view('navbar')?>
<br>
<div class="row-fluid">
  <div class="span3">&nbsp;</div>
  <div class="span5">
    <form class="well form-signin" method="post" action="<?=site_url('login')?>">
      <h2>silakan login</h2>
      <?=$this->load->view('error_message')?>
      <div class="control-group">
        <div class="controls">
          <input type="text" placeholder="Alamat Email" name="username" value="<?=isset($email)?$email:''?>" class="input-block-level">
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <input type="password" placeholder="Password" name="password" class="input-block-level">
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <button type="submit" class="btn btn-primary btn-large"><i class="icon-lock"></i> masuk</button><br><br>
          <ul>
              <li>
            <a href="<?=site_url('signup')?>">Buat akun baru</a><br>
          </li>
              <li>
            <a href="<?=site_url('forgot')?>">Lupa password</a><br>
          </li>
          </ul>
        </div>
      </div>
    </form>
  </div>
  <div class="span3">&nbsp;</div>
</div>
<hr>
<?=$this->load->view('footer')?>
