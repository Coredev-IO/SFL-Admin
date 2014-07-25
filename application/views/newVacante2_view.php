<?php // Change the css classes to suit your needs

$attributes = array('class' => '', 'id' => '');
echo form_open('vacantes2', $attributes); ?>
<div class='container'>
  <div class='row'>
    <div class='col-md-8 col-md-offset-2'>
      <div class='box-formularios animated fadeInUp'>
        <h4>Nueva Vacante</h4>
        <hr>



          <p>
                  <label for="vacante">Vacante <span class="required">*</span></label>
                  <?php echo form_error('vacante'); ?>
                  <br /><input id="vacante" class="form-control" type="text" name="vacante" maxlength="250" value="<?php echo set_value('vacante'); ?>"  />
          </p>

          <p>
                  <label for="empresa">Empresa <span class="required">*</span></label>
                  <?php echo form_error('empresa'); ?>
                  <br /><input id="empresa" type="text" class="form-control" name="empresa" maxlength="200" value="<?php echo set_value('empresa'); ?>"  />
          </p>

          <p>
                  <label for="descripcion">Descripcion <span class="required">*</span></label>
            <?php echo form_error('descripcion'); ?>
            <br />

            <?php echo form_textarea( array( 'name' => 'descripcion', 'rows' => '5', 'cols' => '80', 'value' => set_value('descripcion') ) )?>
          </p>
          <p>
                  <label for="lugar">Lugar <span class="required">*</span></label>
                  <?php echo form_error('lugar'); ?>
                  <br /><input id="lugar" type="text" name="lugar" class="form-control" maxlength="250" value="<?php echo set_value('lugar'); ?>"  />
          </p>

          <p>
                  <label for="salario">Salario <span class="required">*</span></label>
                  <?php echo form_error('salario'); ?>
                  <br /><input id="salario" type="text" class="form-control" name="salario" maxlength="20" value="<?php echo set_value('salario'); ?>"  />
          </p>

          <p>
                  <label for="horario">Horario <span class="required">*</span></label>
                  <?php echo form_error('horario'); ?>
                  <br /><input id="horario" type="text" class="form-control" name="horario" maxlength="100" value="<?php echo set_value('horario'); ?>"  />
          </p>

          <p>
                  <label for="escolaridad">Escolaridad <span class="required">*</span></label>
                  <?php echo form_error('escolaridad'); ?>
                  <br /><input id="escolaridad" type="text" class="form-control" name="escolaridad" maxlength="300" value="<?php echo set_value('escolaridad'); ?>"  />
          </p>

          <p>
                  <label for="experiencia">Experiencia</label>
            <?php echo form_error('experiencia'); ?>
            <br />

            <?php echo form_textarea( array( 'name' => 'experiencia', 'rows' => '5', 'cols' => '80', 'value' => set_value('experiencia') ) )?>
          </p>
          <p>
                  <label for="contacto">Contacto</label>
                  <?php echo form_error('contacto'); ?>
                  <br /><input id="contacto" class="form-control" type="text" name="contacto" maxlength="100" value="<?php echo set_value('contacto'); ?>"  />
          </p>

          <p>
                  <label for="contacto_mail">Contacto mail <span class="required">*</span></label>
                  <?php echo form_error('contacto_mail'); ?>
                  <br /><input id="contacto_mail" class="form-control" type="text" name="contacto_mail" maxlength="300" value="<?php echo set_value('contacto_mail'); ?>"  />
          </p>

          <p>
                  <label for="status">Estatus <span class="required">*</span></label>
                  <?php echo form_error('status'); ?>

                  <?php // Change the values in this array to populate your dropdown as required ?>
                  <?php $options = array(
                                                            ''  => 'Please Select',
                                                            'A'    => 'Activa'
                                                          ); ?>

                  <br /><?php echo form_dropdown('status', $options, set_value('status'))?>
          </p>


          <p>
                  <?php echo form_submit( 'submit', 'Aceptar'); ?>
          </p>
      </div>
    </div>
  </div>
</div>



<?php echo form_close(); ?>
