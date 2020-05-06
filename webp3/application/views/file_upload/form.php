<?php echo $errors; ?>
<?php echo form_open_multipart(); ?>
    <?php echo form_upload('file'); ?>
    <?php echo form_submit('submit','Mentés'); ?>
<?php echo form_close(); ?>
    