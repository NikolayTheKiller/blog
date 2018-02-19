<?php foreach ($post_name as $pn): ?>
<h2>Добавить статью "<i> <?php echo $pn['name'];?></i>" в еще одну  категорию</h2>
<?php endforeach;?>
<form action="" method="post">
    <select name="extra_cat">
        <?php foreach ($extra_cat as $cat_name): ?>
        <option value="<?php echo $cat_name['id']; ?>"><?php echo $cat_name['name']; ?></option>
        <?php endforeach;?>
    </select>
    <input type="submit" name="submit" value="Добавить">
</form>
<?php
echo '<pre>';
           print_r($_POST);
           echo '<pre>';