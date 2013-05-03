<form class="form-horizontal" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend>Konfirmasi Pembayaran</legend>
        <div class="control-group <?=(form_error('method'))?'error':''?>">
            <label class="control-label" for="method">Pembayaran Melalui</label>
            <div class="controls">
                <select name="method" id="method" class="span4">
                    <option value="direct">Bayar Langsung</option>
                    <option value="bank">Transfer Bank</option>
                </select>
                <span class="help-inline"><?php echo form_error('method'); ?></span>
            </div>
        </div>

        <div class="control-group <?=(form_error('to'))?'error':''?>">
            <label class="control-label" for="to">Pembayaran Ke</label>
            <div class="controls">
                <select name="to" id="to" class="span8">
                    <option value="bca">BCA Cab. Jakarta Selatan norek. 1910192929</option>
                    <option value="bni">BNI Cab. Jakarta Selatan norek. 1910192929</option>
                    <option value="bni">BRI Cab. Jakarta Selatan norek. 1910192929</option>
                </select>
                <span class="help-inline"><?php echo form_error('to'); ?></span>
            </div>
        </div>

        <div class="control-group <?=(form_error('date'))?'error':''?>">
            <label class="control-label" for="date">Tanggal Pembayaran</label>
            <div class="controls">
                <input type="text" name="date" id="date" placeholder="<?=date('d-m-Y')?>" class="span3">
                <span class="help-inline"><?php echo form_error('date'); ?></span>
            </div>
        </div>

        <div class="control-group <?=(form_error('desc'))?'error':''?>">
            <label class="control-label" for="desc">Keterangan</label>
            <div class="controls">
                <textarea name="desc" id="desc" class="span8" rows="5"></textarea>
                <span class="help-inline"><?php echo form_error('desc'); ?></span>
            </div>
        </div>

        <div class="control-group <?=(form_error('bukti'))?'error':''?>">
            <label class="control-label" for="bukti">Upload bukti pembayaran</label>
            <div class="controls">
                <input type="file" name="bukti">
                <span class="help-block">Ukuran maksimal 100Kb. Format foto: jpg, jpeg, png</span>
                <span class="help-inline"><?php echo form_error('bukti'); ?></span>
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="button" class="btn">Batal</button>
        </div>
    </fieldset>
</form>
