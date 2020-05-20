<?php $this->load->view('assets/header'); ?>
<div class="row d-flex justify-content-center">
    <div class="text-center col-md-6">
    <?php echo form_open_multipart(); ?>

    <?php echo form_label('Dokumentum neve:','emp_name'); ?>
    <?php echo form_input('name', set_value('name',''),['class'=>'form-control' ],['id' => 'emp_name']); ?>
    <div class="alert-danger"><strong><?php echo form_error('name'); ?></strong></div>
    <br>
    <?php echo form_upload('file',["class"=>"form-control"],["id"=>"file_type"]); ?>
    <br>
    <?php echo form_submit('submit','Küldés',["class"=>"btn btn-primary btn-large pull-right"]); ?>
    <?php echo form_close(); ?>
    </div>
</div>
<?php $this->load->view('assets/footer'); ?>