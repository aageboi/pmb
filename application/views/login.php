<?=$this->load->view('header')?>
<?=$this->load->view('navbar')?>
<!-- Jumbotron -->
<div class="row-fluid">
  <div class="span6 offset4" align="center">
    <?=$this->load->view('error_message')?>
  </div>
  <div class="span4 offset3">
    <form class="form-horizontal" method="post" action="<?=site_url('login')?>">
      <div class="control-group">
        <label class="control-label" for="username">Email</label>
        <div class="controls">
          <input type="text" id="username" placeholder="Email" name="username" value="<?=isset($email)?$email:''?>">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="password">Password</label>
        <div class="controls">
          <input type="password" id="password" placeholder="Password" name="password">
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <label class="checkbox">
            <input type="checkbox"> Remember me
          </label>
          <button type="submit" class="btn">Sign in</button>
        </div>
      </div>
    </form>
  </div>
</div>
<hr>
<?=$this->load->view('footer')?>

