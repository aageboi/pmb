<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Universitas Tarumanagara :: Penerimaan Mahasiswa Baru <?=date('Y')?></title>

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
        max-width: 900px;
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
      .masthead{top:0;position:fixed;width:900px;background-color:#fff;z-index:100;}
      .muted{color:rgb(162, 14, 14) !important;}
    </style>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="<?=base_url()?>assets/js/html5shiv.js"></script>
    <![endif]-->

    <script>
    function getCookie( name ) {
        var start = document.cookie.indexOf( name + "=" );
        var len = start + name.length + 1;
        if ( ( !start ) && ( name != document.cookie.substring( 0, name.length ) ) ) {
            return null;
        }
        if ( start == -1 ) return null;
        var end = document.cookie.indexOf( ';', len );
        if ( end == -1 ) end = document.cookie.length;
        return unescape( document.cookie.substring( len, end ) );
    }

    function setCookie( name, value, expires, path, domain, secure ) {
        var today = new Date();
        today.setTime( today.getTime() );
        if ( expires ) {
            expires = expires * 1000 * 60 * 60 * 24;
        }
        var expires_date = new Date( today.getTime() + (expires) );
        document.cookie = name+'='+escape( value ) +
            ( ( expires ) ? ';expires='+expires_date.toGMTString() : '' ) + //expires.toGMTString()
            ( ( path ) ? ';path=' + path : '' ) +
            ( ( domain ) ? ';domain=' + domain : '' ) +
            ( ( secure ) ? ';secure' : '' );
    }

    function deleteCookie( name, path, domain ) {
        if ( getCookie( name ) ) document.cookie = name + '=' +
            ( ( path ) ? ';path=' + path : '') +
            ( ( domain ) ? ';domain=' + domain : '' ) +
            ';expires=Thu, 01-Jan-1970 00:00:01 GMT';
    }
    function countdown(element, hours, minutes, seconds)
    {
        // set time for the particular countdown
        var time = hours*3600 + minutes*60 + seconds;
        var interval = setInterval(function() {
            var el = document.getElementById(element);
            // if the time is 0 then end the counter
            if (time == 0) {
                el.innerHTML = "waktu habis";
                clearInterval(interval);
                document.getElementById("ujian").submit();
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
            el.innerHTML = text;
            time--;
        }, 1000);
    }
    countdown("cdwn", 2, 0, 0);
    </script>

    <script src="<?=base_url()?>assets/js/jquery.js"></script>
  </head>

  <body>

    <noscript>
        <div class="alert alert-error">
            Halaman ini memerlukan pengaturan javascript aktif. Harap aktifkan dahulu javascript pada browser ini.
        </div>
    </noscript>

    <div class="container-narrow">
      <div class="masthead">
        <ul class="nav nav-pills pull-right">
          <li class="active"><h1 id="cdwn">00:00:00</h1></li>
        </ul>
        <h4 class="muted">Soal Ujian Saringan Masuk Univ. Tarumanagara <?=date('Y')?></h4>
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
            <li id="li-preview">
                <a href="#preview" data-toggle="tab">
                    Jawaban anda
                </a>
            </li>
        </ul>
      </div>

      <hr>

  <form method="post" id="ujian">
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
        <p style="text-indent: 1em;">
            <span class="pull-left"><?=$i?>. &nbsp;</span>
            <?= trim(str_replace(array('<p>','</p>','<div id="__tbSetup">&nbsp;</div>'),'',$row->isi_soal), "\n") ?>
        </p>

        <div class="row-fluid">
            <div class="span1"></div>
            <div class="span6">
              <p>
                    <input type="radio" name="jawaban[<?=$row->id?>]" id="jawaban-a-<?=$row->id?>" value="a" class="jawaban" rel="<?=$q.'_'.$key?>">
                    a. <?=$row->isi_pilihan_a?>
              </p>
              <p>
                  <input type="radio" name="jawaban[<?=$row->id?>]" id="jawaban-b-<?=$row->id?>" value="b" class="jawaban" rel="<?=$q.'_'.$key?>">
                  b. <?=$row->isi_pilihan_b?>
              </p>
            </div>

            <div class="span5">
              <p>
                  <input type="radio" name="jawaban[<?=$row->id?>]" id="jawaban-c-<?=$row->id?>" value="c" class="jawaban" rel="<?=$q.'_'.$key?>">
                  c. <?=$row->isi_pilihan_c?>
              </p>
              <p>
                  <input type="radio" name="jawaban[<?=$row->id?>]" id="jawaban-d-<?=$row->id?>" value="d" class="jawaban" rel="<?=$q.'_'.$key?>">
                  d. <?=$row->isi_pilihan_d?>
              </p>
            </div>
        </div>
        <hr>

        <?php
            $i++;
        } ?>

      </div>

      <?php
        $m++;
      }
      ?>

      <div class="tab-pane fade in" id="preview">
        <?php
        $n = 0;
        foreach ($data['nama_pel'] as $q => $mp) {
            // echo '<span class="span6"><h5>'.$mp.'</h5></span>';
            echo '<h5>'.$mp.'</h5>';
            $j = 1;
            foreach ($data['soal'][$n] as $k => $r) {
                // if ($j % 5 == 1)
                // echo '<span class="span2">';

                echo "{$j}. &nbsp;<span class='label' id='{$q}_{$k}'>Belum dijawab</span><br>";

                // if ($j % 5 == 0)
                // echo '</span>';

                $j++;
            }
            echo '<br>';
            $n++;
        }
        ?>


          <?php # if (strtolower(end($data['nama_pel'])) === strtolower($mapel)) { ?>
          <div class="row-fluid">
            <div class="span12">
            <p align="center">
                <br>
                <button type="submit" class="btn btn-primary btn-large" id="selesai">
                    <i class="icon-exclamation-sign"></i> selesai</button>
            </p>
            </div>
          </div>
          <?php # } ?>
      </div>
  </div>

  </form>

<script>
  window.onbeforeunload = function() {
    jawaban = "Pastikan seluruh pertanyaan sudah dijawab!\nKirim jawaban anda?";
    return jawaban;
  };

  $('#soal a').click(function (e) {
    e.preventDefault();
    $(this).tab('show');
  });

  $(".jawaban").click(function(){
    idsoal = $(this).attr('rel');
    jawaban = $(this).val();
    $("#"+idsoal).addClass('label-success').html(jawaban);
  });

</script>
<?=$this->load->view('footer')?>
