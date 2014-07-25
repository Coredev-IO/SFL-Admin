
<div class="section-colored principal">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-8 col-lg-9">
        <div class="panel panel-default">
          <div class="panel-heading">Nuevo Expediente Clínico</div>
          <div class="panel-body">


            <?php echo form_open('reclutadores/newReclutador'); ?>
              <div class="form-group">
                <label for="inputNamePaciente" class="col-sm-2 control-label">Responsable</label>
                <div class="col-sm-10">
                  <h1>gggg</h1>
                  <?php echo form_input(array('name'=>'username', 'id'=>'username', 'type'=>'text', 'value'=>set_value('username'), 'placeholder' => 'Ingrese el username del responsable de la mascota', 'autofocus'=>'autofocus', 'class'=>'form-control')); echo '<br>'; ?>
                </div>
              </div>

              <?=validation_errors(); ?>
          </div>
        </div>
      </div>

      <div class="col-sm-12 col-md-4 col-lg-3">
        <div class="thumbnail">
          <p></p>
          <i class="fa fa-camera-retro fa-5x"></i>
          <br>Agregar una foto</br>
          <p></p>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="section-colored principal">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-8 col-lg-9">
        <div class="row">
          <div class="col-sm-6 col-md-8 col-lg-9">

          </div>
          <div class="col-sm-6 col-md-4 col-lg-3">
            <?php echo form_input(array('name'=>'botonSubmit', 'id'=>'botonSubmit', 'type'=>'submit', 'value'=>'Enviar', 'class'=>'btnAdd'));
                  echo form_close(); ?>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-4 col-lg-3">
      </div>
    </div>
  </div>
</div>
