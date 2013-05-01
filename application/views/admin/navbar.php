<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container-fluid">
      <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="brand" href="<?=base_url()?>">PMB UNTAR</a>
      <div class="nav-collapse collapse">

        <ul class="nav">
          <li<?=(isset($page)OR!isset($page))?' class="active"':''?>><a href="<?=site_url('admin/')?>">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>

        <ul class="nav pull-right">
            <li id="fat-menu" class="dropdown">
              <a href="#" id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown"><?=session('un')?> <b class="caret"></b></a>
              <ul class="dropdown-menu" role="menu" aria-labelledby="drop3">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="<?=site_url('admin/sessions/logout')?>">Logout</a></li>
              </ul>
            </li>
        </ul>

      </div><!--/.nav-collapse -->
    </div>
  </div>
</div>
