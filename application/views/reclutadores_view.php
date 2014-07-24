 <div class="section-colored principal">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-md-8 col-lg-9">
        </div>


        <div class="col-sm-6 col-md-4 col-lg-3">
        <a href="<?=base_url()?>index.php/reclutadores/newReclutador" id='btnCorreo' class="btn btn-primary" >Nuevo Reclutador <i class="fa fa-user fa-lg"></i> </a>
        </div>

      </div>


<div class="container">
<div class="row">
<div class="col-sm-12">
                        <?php 
                         
                         foreach ($users as $user){
                          echo '<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">';
                                echo '<div class="panel panel-default">';
                            
                                    echo '<div class="panel-body">';

                                if ($user->tipo_user ==='R'){
                                    echo '<i class="fa fa-suitcase fa-5x"></i>';
                                    echo '<br> Reclutador <br>';
                                }
                                else{
                                    echo '<i class="fa fa-shield fa-5x"></i>';
                                    echo '<br> Administrador <br>';
                                }
                                
                                echo '<button type="button" class="btn btn-primary">Consulta</button>';
                       
                          echo '</div></div></div>';
                         }
                         ?>
</div></div></div>


    </div>
  </div>