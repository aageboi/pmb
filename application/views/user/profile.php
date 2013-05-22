<?php $class = (get_message('error')) ? 'error' : ''; ?>
<form class="form-horizontal" method="post">
    <fieldset>
        <legend>Profile Akun <?= ucfirst($data->role) ?></legend>
        <div class="control-group <?=(form_error('nama'))?'error':''?>">
            <label class="control-label" for="nama">Nama Akun</label>
            <div class="controls">
                <input type="text" name="nama" id="nama" value="<?= $data->nama_akun ?>">
                <span class="help-inline"><?php echo form_error('nama'); ?></span>
				<span class="help-block">minimal 6 karakter</span>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="email">Email</label>
            <div class="controls">
                <strong><?= $data->email ?></strong>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="status">Gabung sejak</label>
            <div class="controls">
                <strong><?= strftime("%d %B %Y, %r", strtotime($data->created_at)) ?></strong>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="status">Status</label>
            <div class="controls">
                <?php if ($data->status == '1') { ?>
                <span class="label label-success">Aktif</span>
                <?php } else { ?>
                <span class="label label-warning">Tidak Aktif</span>
                <?php } ?>
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary btn-large"><i class="icon-ok"></i> Simpan</button>
        </div>
    </fieldset>
</form>
