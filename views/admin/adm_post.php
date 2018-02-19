

<table>
<tr>
    <th>название статьи|</th>
    <th>категоия статьи</th>    
</tr>

<?php foreach ($posts as $onePost):?>
<?php $par=$onePost['category_id'];?>
<?php $compare= Category::getCategoryById($par);?>
<tr>    
    <td style="color: red"><?php echo $onePost['name']; ?></td>
    <td><?php echo $compare['name']; ?></td>
    <td><a href="update/<?php echo $onePost['id']; ?>">редактировать статью</a></td>
    <td><a href="delete/<?php echo $onePost['id']; ?>" style="margin-left: 20px">удалить статью</a></td>
    <td><a href="extra/<?php echo $onePost['id']; ?>" style="margin-left: 20px">добавить категорию</a></td>
    <td><a href="comment/<?php echo $onePost['id']; ?>" style="margin-left: 20px">управление комментариями</a></td>
    <?php endforeach; ?>
   
</tr>

</table>
<hr>

<p>статьи по категориям:</p>
<form action="" method="post">
    
    <select name="sort">
        <option disabled selected>выбрать категорию</option>
        <?php foreach ($categories as $categoryList): ?>
        <option value="<?php echo $categoryList['id']; ?>"><?php echo $categoryList['name']; ?></option>
        <?php endforeach; ?>
    </select>
   <input type="submit" name="submit" value="сортировать" />
</form>
<hr>
<a href="/admin" style="border: 2px solid blue; padding: 3px;">назад</a>

