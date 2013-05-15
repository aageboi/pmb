<?php if (isset($breadcrumb) && $breadcrumb) { ?>
<ul class="breadcrumb">
    <?php foreach ($breadcrumb as $name => $url) {
        if (isset($url)) {
    ?>
        <li><a href="<?=site_url($url)?>"><?=$name?></a> <span class="divider">/</span></li>
    <?php } else { ?>
        <li><?=$name?></a></li>
    <?php }
    } ?>
</ul>
<?php }
