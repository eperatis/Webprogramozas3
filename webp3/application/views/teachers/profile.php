<?php if (!$this->ion_auth->logged_in()): ?>
    <?php redirect(base_url('auth/login')); ?>
<?php else: ?>


<?php $this->load->view('assets/header');  ?>
<?php echo form_open(); ?>
<div class="d-flex justify-content-center">
    <div class="text-center">
        <div style="text-align: center;
                background-color: white;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                ">
            <img style="width: 100%;
                        height: auto;
                        " src="<?php echo base_url();echo $data->{'path'}; ?>" />
            <p>
                <strong>Név:</strong>
                <?php print_r($data->{'lastName'}); ?>
                <?php echo ' '; ?>
                <?php print_r($data->{'firstName'}); ?>
            </p>
            <p>
                <strong>Email:</strong>
                <?php print_r($data->{'email'}); ?>
            </p>
            <p>
                <strong>Tanított osztály:</strong>
                <?php print_r($data->{'osztaly'}); ?>
                <?php echo '. osztály'; ?>
            </p>
            <?php echo anchor(base_url('students/export/'.$data->osztaly),'Osztály névsor letöltése',["class"=>"btn btn-danger btn-large pull-right mb-1"]);?>
        </div>
    </div>
</div>
<?php echo form_close(); ?>
<?php $this->load->view('assets/footer'); ?>

<?php endif ?>