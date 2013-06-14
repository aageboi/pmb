<div class="row-fluid">
  <div class="span10">
    <h1>Download Dokumen</h1>
    <hr>
    <p>
        <ul>
        <?php foreach ($data as $key => $dokumen) { ?>
            <li>
                <i class="icon-download-alt"></i> <a target="_blank" href="<?= site_url('assets/doc/'.$dokumen->name) ?>"><?= $dokumen->title ?></a> <i>(<?= strftime('%d %b %Y, %T', strtotime($dokumen->created_at)) ?>)</i>
            </li>
        <?php } ?>
        </ul>
    </p>
    <hr>
  </div>
</div>
