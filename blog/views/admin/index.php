<h1>Админ-панель</h1>
<a href="admincategory/create" style="border: 3px solid red; padding: 5px;">Добавить категорию</a>
<br><br>
<a href="adminpost/index" style="border: 3px solid red; padding: 5px;">Управление статьями</a>
<br><br>
<a href="/adminpost/add" style="border: 3px solid red; padding: 5px;">Создать новую статью</a>
<br><br>
<p><strong>Добавить фото в слайдер:</strong></p>
<form method="post" enctype="multipart/form-data">
    <input type="file" name="slider">
    <input type="submit" name="submit" value="добавить">
</form>
<br><br>

<a href="/" style="border: 3px solid black; padding: 5px"><i>На сайт</i>!</a>
<hr>
<h1>список всех категорий</h1>
<table>
<tr>
    <th>id|</th>
    <th>имя категории|</th>
    <th>родитель</th>
    <th>статус</th>
    
</tr>
<?php ksort($categories); ?>
<?php foreach ($categories as $categoryList):?>

<tr>
    <td><?php echo $categoryList['id']; ?></td>
    <td><?php echo $categoryList['name']; ?></td>
    <td><?php echo $categoryList['parent_id']; ?></td>
    <td><?php echo $categoryList['status']; ?></td>

    <td><a href="/admincategory/delete/<?php echo $categoryList['id']; ?>" title="Удалить">удалить</a></td>
    <td><a href="/admincategory/update/<?php echo $categoryList['id']; ?>" title="Изменить">редактировать</a></td>
    <td><a href="/adminpost/add/<?php echo $categoryList['id']; ?>" title="Добавить">добавить статью</a></td>     
</tr>
<?php endforeach; ?>

</table>


