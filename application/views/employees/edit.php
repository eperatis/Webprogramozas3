<?php echo validation_errors(); ?>
<?php echo form_open(); ?>

<?php echo form_label('Dolgozó neve:','emp_name'); ?>
<?php echo form_input('name',set_value('name',$emp->name),[ 'id' => 'emp_name',
                                  /*'required' => 'required'*/]); ?>
<?php echo form_error('name');?>
<br/>
<?php echo form_input('tin',set_value('tin',$emp->tin), [ /*'required' => 'requried',*/
                                  'placeholder' => 'Adóazonosító']); ?>
<?php echo form_error('tin'); ?>
<br/>
<?php echo form_input('ssn',set_value('ssn',$emp->ssn),[ /*'required' => 'required',*/
                                'placeholder' => 'TAJ']); ?>
<?php echo form_error('ssn'); ?>
<?php echo form_submit('submit','Beküld'); ?>
<?php echo form_close(); ?>