<?=$this->load->view('header')?>
<style type="text/css">
  body {
    padding-top: 60px;
    padding-bottom: 40px;
  }
  .sidebar-nav {
    padding: 9px 0;
  }

  @media (max-width: 980px) {
    /* Enable use of floated navbar text */
    .navbar-text.pull-right {
      float: none;
      padding-left: 5px;
      padding-right: 5px;
    }
  }
</style>

    <?=$this->load->view('admin/navbar')?>

    <?=$this->load->view($yield)?>

<?=$this->load->view('footer')?>
