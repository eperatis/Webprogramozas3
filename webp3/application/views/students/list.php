<?php if($students == NULL || empty($students)) : ?>
    <p>Nincs rögzítve diák!</p>
<?php else: ?>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>firstname</th>
                <th>lastname</th>
                <th>class</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($students as &$emp): ?>
            <tr>
                <td><?=$emp->id?></td>
                <td><?=$emp->firstName?></td>
                <td><?=$emp->lastName?></td>
                <td><?=$emp->osztaly?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>