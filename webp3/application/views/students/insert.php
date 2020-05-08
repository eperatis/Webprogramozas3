<?php echo validation_errors(); ?>
<?php echo form_open(); ?>

<?php echo form_label('Kereszt név:','emp_firstName'); ?>
<?php echo form_input('firstName', set_value('firstName',''),['id' => 'emp_firstName']); ?>
<?php echo form_error('firstName'); ?>
<br>
<?php echo form_label('Vezeték név:','emp_lastName'); ?>
<?php echo form_input('lastName', set_value('lastName',''),['id' => 'emp_lastName']); ?>
<?php echo form_error('lastName'); ?>
<br>
<?php echo form_label('Osztály:','emp_osztaly'); ?>
<?php echo form_input('osztaly', set_value('osztaly',''),['id' => 'emp_osztaly']); ?>
<?php echo form_error('osztaly'); ?>
<br>
<?php echo form_submit('submit','Küldés'); ?>
<?php echo form_close(); ?>