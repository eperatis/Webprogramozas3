<?php echo anchor(base_url('students/insert'),'Új hozzáadása'); ?>
<?php if($students == NULL || empty($students)) : ?>
    <p>Nincs rögzítve diák!</p>
<?php else: ?>
    <table>
        <thead>
            <tr>
                <th>Vezetéknév</th>
                <th>Keresztnév</th>
                <th>Osztály</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($students as &$emp): ?>
            <tr>
                <td><?=$emp->lastName?></td>
                <td><?=$emp->firstName?></td>
                <td><?=$emp->osztaly?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>