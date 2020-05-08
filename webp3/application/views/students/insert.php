<?php $this->load->view('assets/header'); ?>
<div class="row d-flex justify-content-center">
    <div class="text-center col-md-6">
    <?php echo form_open(); ?>

    <?php echo form_label('Kereszt név:','emp_firstName'); ?>
    <?php echo form_input('firstName', set_value('firstName',''),['class'=>'form-control' ],['id' => 'emp_firstName']); ?>
    <div class="alert-danger"><strong><?php echo form_error('firstName'); ?></strong></div>
    <br>
    <?php echo form_label('Vezeték név:','emp_lastName'); ?>
    <?php echo form_input('lastName', set_value('lastName',''),['class'=>'form-control' ],['id' => 'emp_lastName']); ?>
    <div class="alert-danger"><strong><?php echo form_error('lastName'); ?></strong></div>
    <br>
    <?php echo form_label('Osztály:','emp_osztaly'); ?>
    <?php 
            $options = [
            '1' => '1',
            '2' => '2',
            '3' => '3',
            '4' => '4',
            ];

            echo form_dropdown('osztaly', $options, '1',['class'=>'form-control'],['id' => 'emp_osztaly']);
        ?>
    <div class="alert-danger"><strong><?php echo form_error('osztaly'); ?></strong></div>
    <br>
    <?php echo form_submit('submit','Küldés',["class"=>"btn btn-primary btn-large pull-right"]); ?>
    <?php echo form_close(); ?>
    </div>
</div>
<?php $this->load->view('assets/footer'); ?>