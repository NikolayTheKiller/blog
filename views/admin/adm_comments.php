<h4>управление комментариями</h4>
<table>
    <tr><th>комментарий</th><th>автор</th><th>дата публикации</th><th>удаление</th></tr>
<?php foreach ($comments as $comment):?>
    <tr>
        <td><?= $comment['text'];?></td>
        <td><?= $comment['name'];?></td>
        <td><?= $comment['pub_date'];?></td>
        <td><a href="/delete/comment/<?= $comment['comment_id'];?>" style="margin-left: 20px">Удалить</a></td>
    </tr> 
<?php endforeach; ?>
</table>