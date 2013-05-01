<?php
    $class = (get_message('error')) ? 'error' : '';
?>
<form class="form-horizontal" method="post">
    <fieldset>
        <legend>Ganti Password</legend>
        <div class="control-group <?=(form_error('password'))?'error':''?>">
            <label class="control-label" for="password">Password Anda</label>
            <div class="controls">
                <input type="password" name="password" id="password" placeholder="password lama">
                <span class="help-inline"><?php echo form_error('password'); ?></span>
            </div>
        </div>

        <div class="control-group <?=(form_error('passwordBaru'))?'error':''?>">
            <label class="control-label" for="passwordBaru">Password Baru</label>
            <div class="controls">
                <input type="password" name="passwordBaru" id="passwordBaru" placeholder="password baru">
                <span class="help-inline"><?php echo form_error('passwordBaru'); ?></span>
            </div>
        </div>

        <div class="control-group <?=(form_error('ulangiPassword'))?'error':''?>">
            <label class="control-label" for="ulangiPassword">Ulangi Password Baru</label>
            <div class="controls">
                <input type="password" name="ulangiPassword" id="ulangiPassword" placeholder="ulangi password baru">
                <span class="help-inline"><?php echo form_error('ulangiPassword'); ?></span>
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="button" class="btn">Batal</button>
        </div>
    </fieldset>
</form>
