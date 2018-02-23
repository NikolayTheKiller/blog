<h4>управление комментариями</h4>

<?php foreach ($comments as $comment):?>
    <?= $comment['text'].'-----'?>
<a href="/delete/comment/<?= $comment['comment_id'];  ?>" style="margin-left: 20px">Удалить</a>
   
<br>
<?php endforeach; ?>
