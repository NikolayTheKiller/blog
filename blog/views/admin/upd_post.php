<?php include ROOT.'/views/layouts/header.php'; ?>
<h2 style="text-align: center"><i>Редактировать статью</i></h2>
<form action="" method="post" style="margin-left: 20px">
    <p>введите название статьи</p>
    <?php foreach ($oldVersion as $item=> $i): ?>
    <input type="text" name="title" value="<?php echo $i['name']; ?>"><br>
    <p>напишине статью</p>
    <textarea cols="80" rows="10" name="content"><?php echo $i['content']; ?></textarea>
    <p>введите имя автора</p>
    <input type="text" name="author" value="<?php echo $i['author']; ?>"><br>
   
    <p>выберите категорию для статьи</p>
    <select name="parent">
        <option value="<?php echo $i['category_id']; ?> selected">без изменений<?php echo $i['category_id']; ?> </option>
        <?php endforeach; ?>
        <?php foreach ($cat as $p_cat): ?>
        <option value="<?php echo $p_cat['id']; ?>"><?php echo $p_cat['name']; ?></option>
        <?php endforeach; ?>
    </select>
    <br><br>
     <input type="submit" name="submit" value="редактировать" style="margin-bottom: 30px">
</form>
<hr>
<a href="/adminpost/index" style="border: 2px solid blue; padding: 3px">Назад</a>

