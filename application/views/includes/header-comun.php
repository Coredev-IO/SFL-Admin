<header class="navbar navbar-static-top bs-docs-nav navbar-default animated fadeInDown" id="top" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="<?=base_url()?>index.php/home" class="navbar-brand img-top"><img src="<?=base_url()?>Recursos/img/talent.jpg" alt="" width="130px" /></a>
    </div>
    <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
      <ul class="nav navbar-nav">
        
        <li>
          <a href="<?=base_url()?>index.php/aspirantesView/"><i class="fa fa-book"></i> Aspirantes</a>
        </li>
        <li>
          <a href="<?=base_url()?>index.php/vacantes/"><i class="fa fa-briefcase"></i> Vacantes</a>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a><i class='fa fa-user'></i><?php echo ' '.$username; ?></a></li>
        <li><a href="<?=base_url()?>index.php/home/logout">Cerrar Sesión</a></li>
      </ul>
    </nav>
  </div>
</header>
