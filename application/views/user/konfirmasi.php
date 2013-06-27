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

        <div class="control-group <?=(form_error('amount'))?'error':''?>">
            <label class="control-label" for="amount">Jumlah Transfer</label>
            <div class="controls">
                <span class="add-on">Rp.</span>
                <input type="text" name="amount" id="amount" placeholder="Jumlah" class="span3" value="<?=set_value('amount')?>">
                <span class="help-inline"><?php echo form_error('amount'); ?></span>
            </div>
        </div>

        <div class="control-group <?=(form_error('date'))?'error':''?>">
            <label class="control-label" for="date">Tanggal Pembayaran</label>
            <div class="controls">
                <input type="text" name="date" id="date" placeholder="<?=date('d-m-Y')?>" class="span3" value="<?=set_value('date') ? set_value('date') : date('d-m-Y')?>">
                <span class="help-inline"><?php echo form_error('date'); ?></span>
                <span class="help-block">DD-MM-YYYY</span>
            </div>
        </div>

        <div class="control-group <?=(form_error('bukti'))?'error':''?>">
            <label class="control-label" for="bukti">Upload bukti pembayaran</label>
            <div class="controls">
                <input type="file" name="bukti">
                <span class="help-block">Ukuran file maksimal 100Kb. Format file: jpg, jpeg, png</span>
                <span class="help-inline"><?php echo form_error('bukti'); ?></span>
            </div>
        </div>

        <div class="control-group <?=(form_error('desc'))?'error':''?>">
            <label class="control-label" for="desc">Keterangan</label>
            <div class="controls">
                <textarea name="desc" id="desc" class="span8" rows="5"><?=set_value('desc')?></textarea>
                <span class="help-inline"><?php echo form_error('desc'); ?></span>
                <span class="help-block">isikan keterangan yang diperlukan</span>
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary btn-large"><i class="icon-ok"></i> Simpan</button>
        </div>
    </fieldset>
</form>
