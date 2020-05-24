<?php $this->load->view('assets/header'); ?>

<?php if($students == NULL || empty($students)) : ?>
    <p>Nincs rögzítve diák!</p>
<?php else: ?>
    <table class="table">
        <thead>
            <tr>
                <th>Vezetéknév</th>
                <th>Keresztnév</th>
                <th>Osztály</th>
                <?php if (!$this->ion_auth->logged_in()): ?>
                <?php else: ?>
                <th>Műveletek</th>
                <?php endif ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach($students as &$emp): ?>
            <tr>
                <td><?=$emp->lastName?></td>
                <td><?=$emp->firstName?></td>
                <td><?=$emp->osztaly?></td>
                <?php if (!$this->ion_auth->logged_in()): ?>
                <?php else: ?>
                <td>
                    <?php echo anchor(base_url('students/edit/'.$emp->id),'Módosítás',["class"=>"btn btn-info btn-large pull-right"]);?>
                    <?php echo anchor(base_url('students/delete/'.$emp->id),'Törlés',["class"=>"btn btn-danger btn-large pull-right"]);?>
                </td>
                <?php endif ?>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
<?php endif; ?>
<?php $this->load->view('assets/footer'); ?>