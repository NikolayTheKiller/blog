<table>
    <tr>
    <th>имя пользователя |</th>
    <th>статус |</th>
    <th>действие</th>
    </tr>
    <?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo $user['name']; ?></td>
        <?php if($user['role'] == null): ?>
        <td>активен</td>
        <td><a href="ban/<?= $user['id']; ?>" >забанить</a></td>
        <?php elseif ($user['role'] == ban):?>
        <td style="color: red">забанен</td>
        <td><a href="deban/<?= $user['id']; ?>" style="color: red">разбанить</a></td>
        <?php endif; ?>
    </tr>
    <?php endforeach; ?>
    
    
    
    
    
    
    
    
    
</table>




  

