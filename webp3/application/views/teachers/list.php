<?php $this->load->view('assets/header'); ?>

<?php if($teachers == NULL || empty($teachers)) : ?>
    <p>Nincs rögzítve tanár!</p>
<?php else: ?>
    <table class="table">
        <thead>
            <tr>
                <th>Vezetéknév</th>
                <th>Keresztnév</th>
                <th>Osztály</th>
                <th>Műveletek</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($teachers as &$emp): ?>
            <tr>
                <td><?=$emp->lastName?></td>
                <td><?=$emp->firstName?></td>
                <td><?=$emp->osztaly?></td>
                <td>
                    <?php echo anchor(base_url('teachers/profile/'.$emp->id),'Elérhetőség',["class"=>"btn btn-info btn-large pull-right"]);?>
                    <?php if (!$this->ion_auth->logged_in()): ?>
                    <?php else: ?>
                    <?php echo anchor(base_url('teachers/edit/'.$emp->id),'Módosítás',["class"=>"btn btn-info btn-large pull-right"]);?>
                    <?php echo anchor(base_url('teachers/delete/'.$emp->id),'Törlés',["class"=>"btn btn-danger btn-large pull-right"]);?>
                    <?php endif ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

<?php $this->load->view('assets/footer'); ?>
