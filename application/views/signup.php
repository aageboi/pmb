<div class="row-fluid">
  <div class="span10 offset3">
    <h2 class="offset2">Registrasi akun</h2>

    <form class="form-horizontal" method="post">
      <div class="control-group <?=(form_error('nama'))?'error':''?>">
        <label class="control-label" for="nama">Username</label>
        <div class="controls">
          <input type="text" id="nama" placeholder="Username" name="nama" value="<?php echo set_value('nama'); ?>">
            <span class="help-inline"><?php echo form_error('username'); ?></span>
        </div>
      </div>
      <div class="control-group <?=(form_error('email'))?'error':''?>">
        <label class="control-label" for="email">Email</label>
        <div class="controls">
          <input type="text" id="email" placeholder="Email" name="email" value="<?php echo set_value('email'); ?>">
            <span class="help-inline"><?php echo form_error('email'); ?></span>
        </div>
      </div>
      <div class="control-group <?=(form_error('pass'))?'error':''?>">
        <label class="control-label" for="pass">Password</label>
        <div class="controls">
          <input type="password" id="pass" placeholder="Password" name="pass">
            <span class="help-inline"><?php echo form_error('pass'); ?></span>
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <button type="submit" class="btn btn-primary">Daftar</button>
        </div>
      </div>
    </form>
  </div>
</div>
