    <style type="text/css">
      body {
        padding-top: 20px;
        padding-bottom: 60px;
        background-image: url('<?=base_url()?>assets/img/bglogo.gif');
        font-family: Verdana, Geneva, sans-serif;
        font-size: 12px;
      }

    /*h1,h2,h3,h4 {font-family:"Lucida Console", Monaco, monospace;} */
      h1,h2,h3,h4 {font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif}

      /* Custom container */
      .container {
        margin: 0 auto;
        max-width: 1000px;
      }
      .container > hr {
        /*margin: 60px 0;*/
      }

      /* Main marketing message and sign up button */
      .jumbotron {
        margin: 5px 0;
        text-align: center;
      }
      .jumbotron h1 {
        font-size: 100px;
        line-height: 1;
      }
      .jumbotron .lead {
        font-size: 24px;
        line-height: 1.25;
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

      /* Customize the navbar links to be fill the entire space of the .navbar */
      .navbar .navbar-inner {
        padding: 0;
      }
      .navbar .nav {
        margin: 0;
        display: table;
        width: 100%;
      }
      .navbar .nav li {
        display: table-cell;
        width: 1%;
        float: none;
      }
      .navbar .nav li a {
        font-weight: bold;
        text-align: center;
        border-left: 1px solid rgba(255,255,255,.75);
        border-right: 1px solid rgba(0,0,0,.1);
      }
      .navbar .nav li:first-child a {
        border-left: 0;
        border-radius: 3px 0 0 3px;
      }
      .navbar .nav li:last-child a {
        border-right: 0;
        border-radius: 0 3px 3px 0;
      }
    </style>

      <div class="masthead">
        <h3 class="muted">Penerimaan Mahasiswa Baru <?=date("Y")?></h3>
        <div class="navbar">
          <div class="navbar-inner">
            <div class="container">
              <ul class="nav">
                <li <?=(!isset($page))?'class="active"':''?>><a href="<?=site_url()?>"><i class="icon-home"></i> Home</a></li>
                <li <?=(isset($page)&&$page=='petunjuk')?'class="active"':''?>><a href="<?=site_url('petunjuk')?>"><i class="icon-question-sign"></i> Help</a></li>
                <li <?=(isset($page)&&$page=='pengumuman')?'class="active"':''?>><a href="<?=site_url('pengumuman')?>"><i class="icon-info-sign"></i> Informasi</a></li>
              </ul>
            </div>
          </div>
        </div><!-- /.navbar -->
      </div>
