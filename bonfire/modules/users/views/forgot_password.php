<div class="col-lg-3">
&nbsp;
</div>
<div class="col-lg-6">
<div class="widget" style="min-height:500px;">
<div class="widget-header"> <i class="icon-list-alt"></i>
<h3> <?php echo lang('us_reset_password'); ?></h3>
</div>
<div class="widget-content">
<?php if (validation_errors()) : ?>
	<div class="alert alert-error fade in">
		<?php echo validation_errors(); ?>
	</div>
<?php endif; ?>
<div class="alert alert-info fade in">
	Masukan Nomor Whatsapp atau Alamat Email Anda yang terdaftar di HRD
</div>
<?php echo form_open($this->uri->uri_string(), array('class' => "form-horizontal", 'autocomplete' => 'off')); ?>
	<div class="control-group <?php echo iif( form_error('email') , 'error'); ?>">
		<label class="control-label required" for="email">Nomor Whatsapp / Alamat Email</label>
		<div class="controls">
			<input class="form-control required" type="text" name="email" id="email" value="<?php echo set_value('email') ?>" />
		</div>
	</div>
	<div class="control-group" style="margin-top:10px;">
		<div class="controls">
			<input class="btn btn-primary" type="submit" name="send" value="<?php e(lang('us_send_password')); ?>" />
		</div>
	</div>
<?php echo form_close(); ?>
</div>
</div>
</div>
<div class="col-lg-3">
&nbsp;
</div>