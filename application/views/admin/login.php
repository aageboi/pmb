<?=$this->load->view('header')?>
<style type="text/css">
  body {
    padding-top: 40px;
    padding-bottom: 40px;
    background-color: #f5f5f5;
  }

  .form-signup {
    max-width: 400px;
    padding: 19px 29px 29px;
    margin: 0 auto 20px;
    border: 1px solid #e5e5e5;
    -webkit-border-radius: 5px;
       -moz-border-radius: 5px;
            border-radius: 5px;
    -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
       -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
            box-shadow: 0 1px 2px rgba(0,0,0,.05);
  }
  .form-signin {
    max-width: 300px;
    padding: 19px 29px 29px;
    margin: 0 auto 20px;
    background-color: #fff;
    border: 1px solid #e5e5e5;
    -webkit-border-radius: 5px;
       -moz-border-radius: 5px;
            border-radius: 5px;
    -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
       -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
            box-shadow: 0 1px 2px rgba(0,0,0,.05);
  }
  .form-signup .form-signup-heading,
  .form-signin .form-signin-heading,
  .form-signup .checkbox,
  .form-signin .checkbox {
    margin-bottom: 10px;
  }
  .form-signup input[type="text"],
  .form-signin input[type="text"],
  .form-signup input[type="password"],
  .form-signin input[type="password"] {
    font-size: 16px;
    height: auto;
    margin-bottom: 15px;
    padding: 7px 9px;
  }

</style>
<div class="row-fluid">
    <div class="span8 offset2">
      <?=$this->load->view('admin/error_message')?>

      <form class="form-signin pull-left" method="post" action="<?=site_url('admin/sessions/login')?>">
        <h2 class="form-signin-heading">Login</h2>
        <input type="text" class="input-block-level" placeholder="email" name="email" value="<?=$this->input->post('email')?>" autocomplete="off">
        <span class="help-block">contoh: namauser@gmail.com</span>
		<input type="password" class="input-block-level" placeholder="password" name="password">
        <span class="help-block">minimal 6 karakter</span>
		<button class="btn btn-large btn-primary" type="submit"><i class="icon-lock"></i> masuk</button>
		
      </form>

      <form class="form-signup well pull-right" method="post" action="<?=site_url('admin/sessions/daftar')?>">
        <h2 class="form-signin-heading">Daftar</h2>
        <div class="control-group <?=(form_error('namax'))?'error':''?>">
            <div class="controls">
                <input type="text" name="namax" placeholder="nama akun" value="<?=$this->input->post('namax')?>">
				<span class="help-block">minimal 6 karakter</span>
                <?php if (form_error('namax')) { ?><br><span class="help-inline"><?php echo form_error('namax'); ?></span><?php } ?>
            </div>
        </div>
        <div class="control-group <?=(form_error('emailx'))?'error':''?>">
            <div class="controls">
                <input type="text" name="emailx" placeholder="email" value="<?=$this->input->post('emailx')?>" autocomplete="off">
				<span class="help-block">contoh: namauser@gmail.com</span>
                <?php if (form_error('emailx')) { ?><br><span class="help-inline"><?php echo form_error('emailx'); ?></span><?php } ?>
            </div>
        </div>
        <div class="control-group <?=(form_error('passwordx'))?'error':''?>">
            <div class="controls">
                <input type="password" name="passwordx" placeholder="password">
				<span class="help-block">minimal 6 karakter</span>
                <?php if (form_error('passwordx')) { ?><br><span class="help-inline"><?php echo form_error('passwordx'); ?></span><?php } ?>
            </div>
        </div>
        <div class="control-group <?=(form_error('ulangiPassword'))?'error':''?>">
            <div class="controls">
                <input type="password" name="ulangiPassword" placeholder="ulangi password">
				<span class="help-block">harus sama dengan diatas</span>
                <?php if (form_error('ulangiPassword')) { ?><br><span class="help-inline"><?php echo form_error('ulangiPassword'); ?></span><?php } ?>
            </div>
        </div>

        <button class="btn btn-large btn-primary" type="submit"><i class="icon-user"></i> daftar</button>
      </form>
    </div>
</div>

<?=$this->load->view('footer')?>
