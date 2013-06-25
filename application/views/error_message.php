    <?php if (get_message('error')) { ?>
    <div class="alert alert-error">
        <?=get_message('error')?>
    </div>
    <?php } ?>
    <?php if (get_message('info')) { ?>
    <div class="alert alert-success">
        <?=get_message('info')?>
    </div>
    <?php } ?>
