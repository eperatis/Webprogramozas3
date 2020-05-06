<?php echo anchor(base_url('employees/insert'),'Új hozzáadása'); ?>
<?php if($employees == NULL || empty($employees)): ?>
    <p>Nincs rögzítve egyetlen alkalmazott sem!</p>
<?php else: ?>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>SSN</th>
                <th>TIN</th>
                <th>Műveletek</th>
            </tr>
        </thead>
        
        <tbody>
            <?php foreach($employees as &$emp): ?>
            <tr>
                <td><?=$emp->id?></td>
                <td><?=$emp->name?></td>
                <td><?=$emp->ssn?></td>
                <td><?=$emp->tin?></td>
                <td>
                    <?php echo anchor(base_url('employees/edit/'.$emp->id),'Módosítás');?>
                    <?php echo anchor(base_url('employees/delete/'.$emp->id),'Törlés');?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

