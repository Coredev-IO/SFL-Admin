 <div class="section-colored principal">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-md-8 col-lg-9">
        </div>


        <div class="col-sm-6 col-md-4 col-lg-3">
        <?php 
        echo '<a type="button" href="'.base_url().'index.php/reclutadores2" class="btn btn-primary btn-acciones">Nuevo Reclutador <i class="fa fa-user fa-lg"></i></a>'; ?>
        </div>

      </div>

</div>
<div class="container box-reclutadores-big">
<div class="row">
<div class="col-md-12">
                        <?php

                         foreach ($users as $user){
                          echo '<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">';
                                echo '<div class="panel panel-default box-reclutadores animated fadeInUp">';

                                    echo '<div class="panel-body">';

                                if ($user->tipo_user ==='R'){
                                    echo '<i class="fa fa-suitcase fa-5x"></i>';
                                    echo '<br> Reclutador <br>';
                                }
                                else{
                                    echo '<i class="fa fa-shield fa-5x"></i>';
                                    echo '<br> Administrador <br>';
                                }
                                echo ''.$user->username.'<br><br>';
                                echo '<a type="button" href="'.base_url().'index.php/reclutadores2/borrar/'.$user->id.'" class="btn btn-danger btn-acciones"><i class="fa fa-trash-o"></i> Borrar</a>&nbsp';
                                echo '<a type="button" href="'.base_url().'index.php/reclutadores2/actualizar/'.$user->id.'" class="btn btn-primary btn-acciones"><i class="fa fa-edit"></i> Editar</a>';

                                 // echo '<a type="button" href="'.base_url().'index.php/'.$user->id.'" class="btn btn-primary">Consulta</a>';

                          echo '</div></div></div>';
                         }
                         ?>
</div></div></div>



  </div>
