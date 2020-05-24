<?php $this->load->view('assets/header'); ?>
<div style="text-align: center">
<h1><?php echo lang('login_heading');?></h1>
<p><?php echo lang('login_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/login");?>

  <p>
    <?php echo lang('login_identity_label', 'identity');?>
      <br>
    <?php echo form_input($identity);?>
  </p>

  <p>
    <?php echo lang('login_password_label', 'password');?>
      <br>
    <?php echo form_input($password);?>
  </p>

  


  <p><?php echo form_submit('submit', lang('login_submit_btn'),["class"=>"btn btn-primary btn-large pull-right"]);?></p>

<?php echo form_close();?>


</div>
<?php $this->load->view('assets/footer'); ?>