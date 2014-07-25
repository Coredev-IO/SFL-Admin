<?php // Change the css classes to suit your needs

$attributes = array('class' => '', 'id' => '');
echo form_open('reclutadores_admin', $attributes); ?>

<p>
        <label for="username">username <span class="required">*</span></label>
        <?php echo form_error('username'); ?>
        <br /><input id="username" type="text" name="username" maxlength="100" value="<?php echo set_value('username'); ?>"  />
</p>

<p>
        <label for="password">password <span class="required">*</span></label>
        <?php echo form_error('password'); ?>
        <br /><input id="password" type="password" name="password" maxlength="200" value="<?php echo set_value('password'); ?>"  />
</p>

<p>
        <label for="tipo_user">tipo_user <span class="required">*</span></label>
        <?php echo form_error('tipo_user'); ?>

        <?php // Change the values in this array to populate your dropdown as required ?>
        <?php $options = array(
                                                  ''  => 'Please Select',
                                                  'A'    => 'Administrador',
                                                  'R'    => 'Reclutador'
                                                ); ?>

        <br /><?php echo form_dropdown('tipo_user', $options, set_value('tipo_user'))?>
</p>

<p>
        <label for="nombre">Nombre <span class="required">*</span></label>
        <?php echo form_error('nombre'); ?>
        <br /><input id="nombre" type="text" name="nombre" maxlength="100" value="<?php echo set_value('nombre'); ?>"  />
</p>

<p>
        <label for="apellidop">ApellidoP <span class="required">*</span></label>
        <?php echo form_error('apellidop'); ?>
        <br /><input id="apellidop" type="text" name="apellidop" maxlength="100" value="<?php echo set_value('apellidop'); ?>"  />
</p>

<p>
        <label for="apellidom">ApellidoM <span class="required">*</span></label>
        <?php echo form_error('apellidom'); ?>
        <br /><input id="apellidom" type="text" name="apellidom" maxlength="100" value="<?php echo set_value('apellidom'); ?>"  />
</p>

<p>
        <label for="mail">mail <span class="required">*</span></label>
        <?php echo form_error('mail'); ?>
        <br /><input id="mail" type="text" name="mail" maxlength="300" value="<?php echo set_value('mail'); ?>"  />
</p>

<p>
        <label for="telefono">telefono <span class="required">*</span></label>
        <?php echo form_error('telefono'); ?>
        <br /><input id="telefono" type="text" name="telefono" maxlength="11" value="<?php echo set_value('telefono'); ?>"  />
</p>

<p>
        <label for="celular">celular <span class="required">*</span></label>
        <?php echo form_error('celular'); ?>
        <br /><input id="celular" type="text" name="celular" maxlength="11" value="<?php echo set_value('celular'); ?>"  />
</p>


<p>
        <?php echo form_submit( 'submit', 'Submit'); ?>
</p>

<?php echo form_close(); ?>
