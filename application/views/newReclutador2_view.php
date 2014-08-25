<?php // Change the css classes to suit your needs

$attributes = array('class' => '', 'id' => '');
echo form_open('reclutadores2', $attributes); ?>
<div class='container'>
  <div class='row'>
    <div class='col-md-8 col-md-offset-2'>
      <div class='box-formularios animated fadeInUp'>
        <h4>Nuevo Usuario</h4>
        <hr>

                <p>
                    <label for="username">Username <span class="required">*</span></label>
                    <?php echo form_error('username'); ?>
                    <br /><input id="username" type="text" class="form-control" name="username" maxlength="100" value="<?php echo set_value('username'); ?>"  />
              </p>


              <p>
                      <label for="password">Password <span class="required">*</span></label>
                      <?php echo form_error('password'); ?>
                      <br /><input id="password" type="password" class="form-control" name="password" maxlength="200" value="<?php echo set_value('password'); ?>"  />
              </p>

              <p>
                      <label for="tipo_user">Tipo <span class="required">*</span></label>
                      <?php echo form_error('tipo_user'); ?>

                      <?php // Change the values in this array to populate your dropdown as required ?>
                      <?php $options = array(
                                                                ''  => 'Seleccione un perfil',
                                                                'A'    => 'Administrador',
                                                                'R'    => 'Reclutador'
                                                              ); ?>

                      <br /><?php echo form_dropdown('tipo_user', $options, set_value('tipo_user'))?>
              </p>

              <p>
                      <label for="nombre">Nombre <span class="required">*</span></label>
                      <?php echo form_error('nombre'); ?>
                      <br /><input id="nombre" type="text" class="form-control" name="nombre" maxlength="100" value="<?php echo set_value('nombre'); ?>"  />
              </p>

              <p>
                      <label for="apellidop">Apellido Paterno <span class="required">*</span></label>
                      <?php echo form_error('apellidop'); ?>
                      <br /><input id="apellidop" type="text" class="form-control" name="apellidop" maxlength="100" value="<?php echo set_value('apellidop'); ?>"  />
              </p>

              <p>
                      <label for="apellidom">Apellido Materno <span class="required">*</span></label>
                      <?php echo form_error('apellidom'); ?>
                      <br /><input id="apellidom" type="text" class="form-control" name="apellidom" maxlength="100" value="<?php echo set_value('apellidom'); ?>"  />
              </p>

              <p>
                      <label for="mail">Mail <span class="required">*</span></label>
                      <?php echo form_error('mail'); ?>
                      <br /><input id="mail" type="text" class="form-control" name="mail" maxlength="300" value="<?php echo set_value('mail'); ?>"  />
              </p>

              <p>
                      <label for="telefono">Télefono <span class="required">*</span></label>
                      <?php echo form_error('telefono'); ?>
                      <br /><input id="telefono" type="text" class="form-control" name="telefono" maxlength="11" value="<?php echo set_value('telefono'); ?>"  />
              </p>

              <p>
                      <label for="celular">Celular <span class="required">*</span></label>
                      <?php echo form_error('celular'); ?>
                      <br /><input id="celular" type="text" name="celular" class="form-control" maxlength="11" value="<?php echo set_value('celular'); ?>"  />


              </p>

              <p>

                      <?php 
                        $attributes = array('class' => 'class="btn btn-primary"');
                        echo form_submit( 'submit', 'Aceptar', $attributes['class']); ?>
              </p>

        </div>
      </div>
    </div>
  </div>




<?php echo form_close(); ?>
