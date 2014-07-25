 <div class="section-colored principal">
<div class="container">
  <div class="row">
    <div class="col-sm-6 col-md-8 col-lg-9">
    </div>


    <div class="col-sm-6 col-md-4 col-lg-3">
    <a href="<?=base_url()?>index.php/vacantes2" id='btnCorreo' class="btn btn-primary right" >Nueva Vacante <i class="fa fa-briefcase"></i> </a>
    </div>

  </div>

</div>
<div class="container box-reclutadores-big">
<div class="row">
<div class="col-md-12">
    <div class="panel panel-default box-reclutadores animated fadeInUp">


    <table class="table table-striped">
      <thead>
        <tr>
          <th></th>
          <th>Fecha</th>
          <th>Vacante</th>
          <th>Empresa</th>
          <th>Lugar</th>
          <th>Contacto</th>
        </tr>
      </thead>
      <tbody>


                <?php
                $i=0;

                         foreach ($vacantes as $vacante){
                           $i = $i+1;
                           echo '<tr>';
                           echo '<td>'.$i.'</td>';
                           echo '<td class="left-txt">'.$vacante->fecha.'</td>';
                           echo '<td class="left-txt">'.strtoupper($vacante->vacante).'</td>';
                           echo '<td class="left-txt">'.strtoupper($vacante->empresa).'</td>';
                           echo '<td class="left-txt">'.strtoupper($vacante->lugar).'</td>';
                           echo '<td class="left-txt">'.strtoupper($vacante->contacto).'</td>';
                           echo '</tr>';
                                                 }
                         ?>

      </tbody>
    </table>
  </div>

</div></div></div>



  </div>
