<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('assets/header'); ?>
<div style="text-align: center">
    <h1>Képzeletbeli iskola kezdőlap</h1>
    <h2>A menüsorban a diákokat választva megtekintheti iskolánk tanulóit</h2>
    <h2>
        A menüsorban a tanárokat választva megtekintheti iskolánk tanárait és a tanárok elérhetőségét
        <br>
        illetve letöltheti azok osztály névsorát
    </h2>
    <h2>Admin bejelentkezés a login gombra kattintva!</h2>
    <h3>(Csak egy super admin bejelentkezés van (email: admin@admin.com pass: password)!)</h3>
</div>
<?php $this->load->view('assets/footer'); ?>