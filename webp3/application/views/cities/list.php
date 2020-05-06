<?php echo anchor(base_url('cities/insert'),'Új hozzáadása'); ?>
<?php if($cities == NULL || empty($cities)) : ?>
    <p>Nincs rögzítve város!</p>
<?php else: ?>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Post Code</th>
                <th>Műveletek</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($cities as &$emp): ?>
            <tr>
                <td><?=$emp->id?></td>
                <td><?=$emp->name?></td>
                <td><?=$emp->postal_code?></td>
                <td>
                    <?php echo anchor(base_url('cities/edit/'.$emp->id),'Módosítás');?>
                    <?php echo anchor(base_url('cities/delete/'.$emp->id),'Törlés');?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>


