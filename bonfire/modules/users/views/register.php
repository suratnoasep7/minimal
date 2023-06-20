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
<div class="col-lg-3">
&nbsp;
</div>
<div class="col-lg-6">
<div class="widget">
<div class="widget-header"> <i class="icon-list-alt"></i>
<h3> Halaman Register</h3>
</div>
<div class="widget-content">
<section id="register">
    <h1 class="page-header"><?php echo lang('us_sign_up'); ?></h1>
    <?php if (validation_errors()) : ?>
    <div class="alert alert-error fade in">
        <?php echo validation_errors(); ?>
    </div>
    <?php endif; ?>
    <div class="row-fluid">
        <div class="col-lg-12">
            <?php echo form_open(site_url(REGISTER_URL), array('class' => "form-horizontal", 'autocomplete' => 'off')); ?>
                <fieldset>
                    <?php Template::block('user_fields', 'user_fields', $fieldData); ?>
                </fieldset>
                <fieldset>
                    <?php
                    // Allow modules to render custom fields. No payload is passed
                    // since the user has not been created, yet.
                    Events::trigger('render_user_form');
                    ?>
                </fieldset>
                <fieldset>
                    <div class="control-group" style="margin-top:10px;">
                        <div class="controls">
                            <input class="btn btn-primary" type="submit" name="register" id="submit" value="<?php echo lang('us_register'); ?>" />
                        </div>
                    </div>
                </fieldset>
            <?php echo form_close(); ?>
            <p class='already-registered'>
                <?php echo lang('us_already_registered'); ?>
                <?php echo anchor(LOGIN_URL, lang('bf_action_login')); ?>
            </p>
        </div>
    </div>
</section>
</div>
</div>
</div>
<div class="col-lg-3">
&nbsp;
</div>