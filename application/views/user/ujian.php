<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Universitas Tarumanegara :: Penerimaan Mahasiswa Baru <?=date('Y')?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 20px;
        padding-bottom: 40px;
      }

      /* Custom container */
      .container-narrow {
        margin: 0 auto;
        max-width: 700px;
      }
      .container-narrow > hr {
        margin: 30px 0;
      }

      /* Main marketing message and sign up button */
      .jumbotron {
        margin: 60px 0;
        text-align: center;
      }
      .jumbotron h1 {
        font-size: 72px;
        line-height: 1;
      }
      .jumbotron .btn {
        font-size: 21px;
        padding: 14px 24px;
      }

      /* Supporting marketing content */
      .marketing {
        margin: 60px 0;
      }
      .marketing p + h4 {
        margin-top: 28px;
      }
      .jawaban {resize:none;}
      .masthead{top:0;position:fixed;width:55%;background-color:#fff;z-index:100;}
      .muted{color:rgb(162, 14, 14) !important;}
    </style>
    <link href="<?=base_url()?>assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="<?=base_url()?>assets/js/html5shiv.js"></script>
    <![endif]-->

    <script>
    function countdown(element, hours, minutes, seconds)
    // function countdown(element, minutes, seconds)
    {
        // set time for the particular countdown
        var time = hours*3600 + minutes*60 + seconds;
        // var time = minutes*60 + seconds;
        var interval = setInterval(function() {
            var el = document.getElementById(element);
            // if the time is 0 then end the counter
            if (time == 0) {
                el.innerHTML = "waktu habis";
                clearInterval(interval);
                return;
            }
            var hours = Math.floor( time / 3600 );
            if (hours < 10) hours = "0" + hours;

            var minutes = time % 3600;
            var minutes = Math.floor( minutes / 60 );
            if (minutes < 10) minutes = "0" + minutes;

            var seconds = time % 60;

            if (seconds < 10) seconds = "0" + seconds;
            var text = hours + ':' + minutes + ':' + seconds;
            // var text = hours + ':' + minutes + ':' + seconds;
            el.innerHTML = text;
            time--;
        }, 1000);
    }
    countdown("cdwn", 2, 0, 0);
    // countdown("cdwn", 59, 0);
    </script>

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?=base_url()?>assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?=base_url()?>assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?=base_url()?>assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?=base_url()?>assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="<?=base_url()?>assets/ico/favicon.png">
    <script src="<?=base_url()?>assets/js/jquery.js"></script>
  </head>

  <body>

    <div class="container-narrow">
      <div class="masthead">
        <ul class="nav nav-pills pull-right">
          <li class="active"><h1 id="cdwn">00:00:00</h1></li>
        </ul>
        <h4 class="muted">Soal Ujian Saringan Masuk Univ. Tarumanegara <?=date('Y')?></h4>
        <ul class="nav nav-tabs" id="soal">
            <?php
            $j = 0;
            foreach ($data['nama_pel'] as $q => $mapel) { ?>
            <li<?=($j==0)?' class="active"':''?>>
                <a href="#<?=strtolower(str_replace(' ','',$mapel))?>" data-toggle="tab">
                    <?=str_replace('Bahasa','B.',$mapel)?>
                </a>
            </li>
            <?php
                $j++;
            } ?>
        </ul>
      </div>

      <hr>

  <form method="post">
  <div class="tab-content" id="soalContent">

        <br>
      <?=$this->load->view('error_message')?>

      <?php
        $m = 0;
        foreach ($data['nama_pel'] as $q => $mapel) {
            $i = 1;
      ?>

      <div class="tab-pane fade<?=($m==0)?' active in':''?>" id="<?=strtolower(str_replace(' ','',$mapel))?>">

        <?php foreach ($data['soal'][$m] as $key => $row) { ?>

        <br>
        <p>
            <span class="pull-left"><?=$i?>. &nbsp;</span>
            <?= trim(str_replace(array('<p>','</p>','<div id="__tbSetup">&nbsp;</div>'),'',$row->isi_soal), "\n") ?>
        </p>

          <p>
                  <input type="radio" name="jawaban[<?=$row->id?>]" id="jawaban-a-<?=$row->id?>" value="a">
                  a. <?=$row->isi_pilihan_a?>
          </p>
          <p>
              <input type="radio" name="jawaban[<?=$row->id?>]" id="jawaban-b-<?=$row->id?>" value="b">
              b. <?=$row->isi_pilihan_b?>
          </p>
          <p>
              <input type="radio" name="jawaban[<?=$row->id?>]" id="jawaban-c-<?=$row->id?>" value="c">
              c. <?=$row->isi_pilihan_c?>
          </p>
          <p>
              <input type="radio" name="jawaban[<?=$row->id?>]" id="jawaban-d-<?=$row->id?>" value="d">
              d. <?=$row->isi_pilihan_d?>
          </p>
          <hr>

        <?php
            $i++;
        } ?>

      </div>

      <?php
        $m++;
      }
      ?>

  </div>
        <p align="center">
            <button type="submit" class="btn btn-primary btn-large">kirim</button>
        </p>
  </form>

<script>
  $('#soal a:first').tab('show');
  $('#soal a').click(function (e) {
    e.preventDefault();
    $(this).tab('show');
  });
</script>
<?=$this->load->view('footer')?>
