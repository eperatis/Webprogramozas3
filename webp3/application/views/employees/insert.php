<?php echo validation_errors(); ?>
<?php echo form_open_multipart(); ?>

<?php echo form_label('Dolgozó neve:','emp_name'); ?>
<?php echo form_input('name',set_value('name',''),[ 'id' => 'emp_name',
                                  /*'required' => 'required'*/]); ?>
<?php echo form_error('name');?>
<br/>
<?php echo form_input('tin',set_value('tin',''), [ /*'required' => 'requried',*/
                                  'placeholder' => 'Adóazonosító']); ?>
<?php echo form_error('tin'); ?>
<br/>
<?php echo form_input('ssn',set_value('ssn',''),[ /*'required' => 'required',*/
                                'placeholder' => 'TAJ']); ?>
<?php echo form_error('ssn'); ?>
<br>
<?php echo form_open_multipart(); ?>
<?php echo form_upload('file'); ?>
<?php echo $errors; ?>
<br>
<?php echo form_submit('submit','Beküld'); ?>
<?php echo form_close(); ?>