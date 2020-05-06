<h1> 1 új fájl sikeresen feltöltve </h1>

<table>
    <thead>
        <tr>
            <th>Kulcs</th>
            <th>Érték</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($data as $key => $value): ?>
        <tr>
            <td><?=$key?></td>
            <td><?=$value?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php if($data['is_image'] == 1): ?>
    <img src="<?=base_url('uploads/'.$data['file_name'])?>"
         alt="<?=$data['file_name']?>"/>
<?php endif; ?>






