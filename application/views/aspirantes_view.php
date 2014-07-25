 <div class="section-colored principal">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-md-8 col-lg-9">
        </div>


        <div class="col-sm-6 col-md-4 col-lg-3">
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
          <th>Apellido paterno</th>
          <th>Apellido materno</th>
          <th>Nombre</th>
          <th>Telefono</th>
          <th>Celular</th>
        </tr>
      </thead>
      <tbody>


                <?php
                $i=0;

                         foreach ($users as $user){
                           $i = $i+1;
                           echo '<tr>';
                           echo '<td>'.$i.'</td>';
                           echo '<td class="left-txt">'.strtoupper($user->paterno).'</td>';
                           echo '<td class="left-txt">'.strtoupper($user->materno).'</td>';
                           echo '<td class="left-txt">'.strtoupper($user->nombre).'</td>';
                           echo '<td class="left-txt">'.strtoupper($user->tel_particular).'</td>';
                           echo '<td class="left-txt">'.strtoupper($user->tel_movil).'</td>';

                           echo '</tr>';
                                                 }
                         ?>

      </tbody>
    </table>
  </div>

</div></div></div>



  </div>
