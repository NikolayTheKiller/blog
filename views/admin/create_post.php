<?php include ROOT.'/views/layouts/header.php'; ?>
<form action="" method="post" enctype="multipart/form-data" style="margin-left: 20px">
    <p>введите название статьи</p>
    <input type="text" name="title"><br>
    <p>напишине статью</p>
    <textarea cols="80" rows="10" name="content"></textarea>
    <p>введите имя автора</p>
    <input type="text" name="author"><br>
    <p>добавить изображение</p>
    <input type="file" name="picture">
   
    <br><br>
     <input type="submit" name="submit" value="создать" style="margin-bottom: 30px">
</form>
<?php include ROOT.'/views/layouts/footer.php'; ?>

