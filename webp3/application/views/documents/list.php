<?php $this->load->view('assets/header'); ?>

<?php if($documents == NULL || empty($documents)) : ?>
    <p>Nincs fájl feltöltve!</p>
<?php else: ?>
    <table class="table">
        <thead>
            <tr>
                <th>Dokumentumok</th>
                <th>Letöltés</th>
                <th>Műveletek</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($documents as &$emp): ?>
            <tr>
                <td><?=$emp->name?></td>
                <td>
                    <?php echo anchor(base_url('documents/download/'.$emp->id),'Letöltés',["class"=>"btn btn-light"]);?>
                </td>
                <td>
                    <?php echo anchor(base_url('documents/delete/'.$emp->id),'Törlés',["class"=>"btn btn-danger btn-large pull-right"]);?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

<?php $this->load->view('assets/footer'); ?>
