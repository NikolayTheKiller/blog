<!-- создать новую статью (не добавить в имеющуюся категорию)-->
<h2><i>Создать новую статью</i></h2>
<form method="post" enctype="multipart/form-data" style="margin-left: 20px">
     <p>введите название статьи</p>
    <input type="text" name="title"><br>
    <p>напишине статью</p>
    <textarea cols="80" rows="10" name="content"></textarea>
    <p>введите имя автора</p>
    <input type="text" name="author"><br>
    <p>добавить изображение</p>
    <input type="file" name="picture">
    <br><br>
    <p>выбрать категорию для статьи</p>    
    <select name="category[]" multiple size="3">
        <option disabled selected>выбрать категорию</option>
        <?php foreach ($cat as $value): ?>
            <option value="<?= $value['id']; ?>"><?= $value['name']; ?></option>
        <?php endforeach; ?>
    </select>    
    <br><br>
     <input type="submit" name="submit" value="создать" style="margin-bottom: 30px">
    
    
    
    
    
</form>