<?php $this->load->view('assets/header'); ?>

<img src="<?=print_r($data->{'path'}).base_url()?>" />

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

<?php $this->load->view('assets/footer'); ?>

