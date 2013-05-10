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
    </style>
    <link href="<?=base_url()?>assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="<?=base_url()?>assets/js/html5shiv.js"></script>
    <![endif]-->

    <script>
    function countdown(element, minutes, seconds) {
        // set time for the particular countdown
        var time = minutes*60 + seconds;
        var interval = setInterval(function() {
            var el = document.getElementById(element);
            // if the time is 0 then end the counter
            if(time == 0) {
                el.innerHTML = "countdown's over!";
                clearInterval(interval);
                return;
            }
            var minutes = Math.floor( time / 60 );
            if (minutes < 10) minutes = "0" + minutes;
            var seconds = time % 60;
            if (seconds < 10) seconds = "0" + seconds;
            var text = minutes + ':' + seconds;
            el.innerHTML = text;
            time--;
        }, 1000);
    }
    countdown("cdwn", 45, 0);
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
        <h3 class="muted">Soal Ujian</h3>
      </div>

      <hr>
      <?=$this->load->view('error_message')?>

      <form method="post">
      <?php $i=1;
        if ($data)
        foreach ($data as $key => $row) {
      ?>
      <div class="row-fluid marketing" id="q<?=$i?>">

        <p class="lead">
            <?= strip_tags($row->isi_soal) ?>
        </p>

        <div class="span12">
          <p>
            <div class="input-prepend">
              <span class="add-on"><input type="radio" name="jawaban[<?=$row->id?>]" id="jawaban-a-<?=$row->id?>" value="a"></span>
              <span class="add-on"><label for="jawaban-a-<?=$row->id?>"><?=$row->isi_pilihan_a?></label></span>
            </div>
          </p>
          <p>
            <div class="input-prepend">
              <span class="add-on"><input type="radio" name="jawaban[<?=$row->id?>]" id="jawaban-b-<?=$row->id?>" value="b"></span>
              <span class="add-on"><label for="jawaban-b-<?=$row->id?>"><?=$row->isi_pilihan_b?></label></span>
            </div>
          </p>
          <p>
            <div class="input-prepend">
              <span class="add-on"><input type="radio" name="jawaban[<?=$row->id?>]" id="jawaban-c-<?=$row->id?>" value="c"></span>
              <span class="add-on"><label for="jawaban-c-<?=$row->id?>"><?=$row->isi_pilihan_c?></label></span>
            </div>
          </p>
          <p>
            <div class="input-prepend">
              <span class="add-on"><input type="radio" name="jawaban[<?=$row->id?>]" id="jawaban-d-<?=$row->id?>" value="d"></span>
              <span class="add-on"><label for="jawaban-d-<?=$row->id?>"><?=$row->isi_pilihan_d?></label></span>
            </div>
          </p>
          <p align="center">
            <?php if ($i > 1) { ?>
            <input type="button" class="prevQuestion" value=" &laquo; sebelumnya" rel='<?=$i?>'>
            <?php } ?>
            <?php if (count($data) == $i) { ?>
            <input type="submit" class="nextQuestion" value="Kirim" rel='<?=$i+1?>'>
            <?php } else { ?>
            <input type="button" class="nextQuestion" value="selanjutnya &raquo; " rel='<?=$i+1?>'>
            <?php } ?>
          </p>
        </div>
      </div>
      <?php
        $i++;
      }
      ?>
      </form>
      <input type="hidden" id="totalQuestion" value="<?=count($data)?>" />
      <input type="hidden" id="currentQuestion" value="1" />

      <script>
        $(function(){
            var cq = $("#currentQuestion").val();
            var tq = $("#totalQuestion").val();
            $('.marketing').hide();
            $('#q'+cq).show();
            $(".marketing").delegate('.nextQuestion','click',function(){
                nq = $(this).attr('rel');
                if (nq > tq) {
                    selesai = confirm('Selesai menjawab semua soal?');
                    if (selesai)
                        alert('Terima kasih');
                    else
                        return false;
                } else {
                    $("#currentQuestion").val(nq);
                    $('.marketing').hide();
                    $('#q'+nq).show();
                }
            });
            $(".marketing").delegate('.prevQuestion','click',function(){
                pq = $(this).attr('rel');
                pq = pq - 1;
                $("#currentQuestion").val(pq);
                $('.marketing').hide();
                $('#q'+pq).show();
            });
        });
      </script>

<?=$this->load->view('footer')?>
