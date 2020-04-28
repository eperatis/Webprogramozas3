<?php echo validation_errors(); ?>
<?php echo form_open(); ?>

<?php echo form_label('Város neve:','emp_name'); ?>
<?php echo form_input('name',set_value('name',$emp->name),[ 'id' => 'emp_name']); ?>
<?php echo form_error('name');?>
<br/>
<?php echo form_input('postal_code',set_value('postal_code',$emp->postal_code), ['placeholder' => 'Irányítószám']); ?>
<?php echo form_error('postal_code'); ?>
<br/>

<?php echo form_submit('submit','Beküld'); ?>
<?php echo form_close(); ?>