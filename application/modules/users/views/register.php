<script type="text/javascript">
var url = "<?php echo site_url('skpd/perusahaan/') ?>";
</script>
<?php

$errorClass   = empty($errorClass) ? ' error' : $errorClass;
$controlClass = empty($controlClass) ? 'span6' : $controlClass;
$fieldData = array(
    'errorClass'    => $errorClass,
    'controlClass'  => $controlClass,
    );

    ?>
    <style scoped='scoped'>
        #register p.already-registered {
            text-align: center;
        }
    </style>
    <section id="wrapper">
        <div class="login-register" style="background-color: #2980b9">
            <div class="login-box card">
                <div class="card-body">
                   <center> <h2 class="page-header"><?php echo lang('us_sign_up'); ?></h2></center>
                   <br>
   <!--  <?php if (validation_errors()) : ?>
    <div class="alert alert-error fade in">
        <?php echo validation_errors(); ?>
    </div>
    <?php endif; ?>
    <div class="alert alert-info fade in">
        <h4 class="alert-heading"><?php echo lang('bf_required_note'); ?></h4>
        <?php
        if (isset($password_hints)) {
            echo $password_hints;
        }
        ?>
    </div> -->

    <?php echo form_open(site_url(REGISTER_URL), array('class' => "form-horizontal", 'autocomplete' => 'off','enctype'=>'multipart/form-data')); ?>
    <fieldset>
        <?php Template::block('user_fields', 'user_fields', $fieldData); ?>
    </fieldset>
    <fieldset>
        <?php
                    // Allow modules to render custom fields. No payload is passed
                    // since the user has not been created, yet.
        Events::trigger('render_user_form');
        ?>
        <!-- Start of User Meta -->
        <!-- <?php $this->load->view('users/user_meta', array('frontend_only' => false)); ?>  -->
        <!-- End of User Meta -->
    </fieldset>
    <fieldset>
        
        <div class="form-group text-center m-t-20">
            <div class="col-md-12">
                <input class="btn btn-primary" type="submit" name="register" id="submit" value="<?php echo lang('us_register'); ?>" />
                <!-- <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit" name="register" id="submit" value="<?php echo lang('us_register'); ?>">Register</button> -->

            </div>
        </div>
    </fieldset>
    <div class="form-group m-b-0">
        <div class="col-sm-12 text-center">
            <?php echo form_close(); ?> 
            <p class='already-registered'>
                <?php echo lang('us_already_registered'); ?>
                <?php echo anchor(LOGIN_URL, lang('bf_action_login')); ?>
            </p>
        </div>
    </div>

</div>
</div>
</div>
</section> 



