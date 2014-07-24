
<div class='row inicial'>
    <div class='col-md-12 col'>
        <center>
            <img src="<?=base_url()?>Recursos/img/panel.png" alt="" width="250px" />
        </center>
    </div>
    <div class='col-md-4 col-md-offset-4'>
        <div class="title">
          <h4>Iniciar Sesión</h2>
        </div>
        <div class="login">
            <div class="login-screen">

                <?php echo form_open( 'verifylogin'); ?>


                <div class="login-form">
                    <div class="control-group">
                        <input type="text" class="form-control" value="" placeholder="Username" id="username" name="username" autofocus>
                    </div>

                    <div class="control-group">
                        <input type="password" class="form-control" value="" placeholder="Password" id="login-pass" id="passowrd" name="password">
                    </div>

                    <input class="btn btn-principal" type="submit" value="INICIAR" />

                </div>

            </div>

        </div>
        <?php echo validation_errors(); ?>

    </div>
</div>
