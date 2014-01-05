<nav class="navbar navbar-default" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">D100466</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      <li class="active"><a href="<?=Site::base_url()?>?module=Saturs">Saturs</a></li>
      <li><a href="#">-</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="<?=Site::base_url()?>?module=Module">Module</a></li>
            <li><a href="<?=Site::base_url()?>?module=TestClass">Test Class</a></li>
            <li><a href="<?=Site::base_url()?>?module=Users">Users</a></li>
          <li class="divider"></li>
          <li><a href="#">-</a></li>
          <li class="divider"></li>
          <li><a href="#">-</a></li>
        </ul>
      </li>
    </ul>
    <form class="navbar-form navbar-left" role="search">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#">Link</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">- <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="#">-</a></li>
          <li><a href="#">-</a></li>
          <li><a href="#">-</a></li>
          <li class="divider"></li>
          <li><a href="#">-</a></li>
        </ul>
      </li>
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>
