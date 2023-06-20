<div class="admin-box">
	<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
	<fieldset>
		<legend><?php echo lang('permissions_details') ?></legend>

		<div class="control-group<?php echo form_error('name') ? ' error' : ''; ?>">
			<label for="name" class="control-label"><?php echo lang('permissions_name'); ?></label>
			<div class="controls">
				<input id="name" type="text" name="name" class="input-large" value="<?php echo set_value('name', isset($permissions->name) ? $permissions->name : ''); ?>" />
				<span class="help-inline"><?php echo form_error('name'); ?></span>
			</div>
		</div>
		<div class="control-group<?php echo form_error('description') ? ' error' : ''; ?>">
			<label for="description" class="control-label"><?php echo lang('permissions_description'); ?></label>
			<div class="controls">
				<input id="description" type="text" name="description" maxlength="100" value="<?php echo set_value('description', isset($permissions->description) ? $permissions->description : ''); ?>" />
				<span class="help-inline"><?php echo form_error('description'); ?></span>
			</div>
		</div>		
		<?php echo form_dropdown('module_id', $module_list, set_value('module_id',isset($permissions->module_id) ? $permissions->module_id : 0), 'Modul')?>			
		<?php $optionstype = array(
			'0'		=> 'Proses',
			'1'		=> 'Transaksi',
			'2'		=> 'Report',
			'3'		=> 'Maintenance',
			'4'		=> 'Admin',
			'5'		=> 'Main Menu',
			'6'		=> 'Jurnal',
			'7'		=> 'Kas Jalan',
			'8'		=> 'Ticketing',
			'9'		=> 'Paket',
			'10'	=> 'Kas & Bank',
			'11'	=> 'Kas Kecil',
			'12'	=> 'Customer',
			'13'  => 'Service',
			'14'  => 'Analisa',
			'15'  => 'Wisata',
			'32'  => 'Reguler',
			'33'  => 'Dumptruck',
			'24'  => 'Opentrip',
			'16'  => 'Call Center',
			'17'	=> 'Absensi',
			'18'  => 'Master',
			'19'  => 'Recruitment',
			'20'  => 'Training',
			'21'  => 'Employee',
			'22'  => 'Dashboard',
			'23'  => 'Projects',
			'25'  => 'Approval',
			'26'  => 'Assets',
			'27'  => 'Email',
			'28'  => 'Meeting',
			'29'  => 'Sewa',
			'30'  => 'Loan',
			'31'  => 'Supplier',
			'34'  => 'Purchase Request',
			'35'  => 'Purchase Order',
			'36'  => 'Goods Receipt',
			'37'  => 'Shuttle',
			'38'  => 'Mapping',
			'39'  => 'External',
			'40'  => 'Cargo',
			'41'  => 'Accounting Reguler',
			'42'  => 'Operational',
			'43'  => 'Evaluation',
			'44'  => 'Call Center',
			'45'  => 'Operasional Sewa Bus',
			'46'  => 'Support'			
		); ?>

		<?php echo form_dropdown('type_id', $type_list, set_value('type_id',isset($permissions->type_id) ? $permissions->type_id : 0), 'Type Menu')?>           
		<div class="control-group">
			<label for="status" class="control-label"><?php echo lang('permissions_status'); ?></label>
			<div class="controls">
				<select name="status" id="status">
					<option value="active" <?php echo set_select('status', 'active', isset($permissions->status) && $permissions->status == 'active'); ?>><?php echo lang('permissions_active'); ?></option>
					<option value="inactive" <?php echo set_select('status', 'inactive', isset($permissions->status) && $permissions->status == 'inactive'); ?>><?php echo lang('permissions_inactive'); ?></option>
				</select>
			</div>
		</div>

		<!-- <?php $optionscolor = array(
			'bg-aqua'   => 'bg-aqua',
			'bg-red'    => 'bg-red',
			'bg-green'  => 'bg-green',
			'bg-yellow' => 'bg-yellow',
		); ?>
		<?php echo form_dropdown('color', $optionscolor, set_value('color',isset($permissions->color) ? $permissions->color : 0), 'Color Menu')?>           

		<div class="control-group<?php echo form_error('icon') ? ' error' : ''; ?>">
			<label for="icon" class="control-label">Icon</label>
			<div class="controls">
				<input id="icon" type="text" name="icon" class="input-large" value="<?php echo set_value('icon', isset($permissions->icon) ? $permissions->icon : ''); ?>" />
				<span class="help-inline"><?php echo form_error('icon'); ?></span>
			</div>
		</div> -->

	</fieldset>
	<fieldset class='form-actions'>
		<input type="submit" name="save" class="btn btn-primary" value="<?php echo lang('permissions_save'); ?>" />
		<?php
		echo lang('bf_or') . ' ' . anchor(SITE_AREA . '/settings/permissions', lang('bf_action_cancel'));
		?>
	</fieldset>
	<?php echo form_close(); ?>
</div>