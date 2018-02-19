
<form action="" method="post" style="margin-left: 30px">
    <p>имя категории:</p>
    <input type="text" name="name">
    <p>статус:</p>
    <input type="radio" name="status" value="1">Активна<br>
    <input type="radio" name="status" value="0">Неактивна<br>
    <p>подкатегория для:</p>  
   
    <select name="child"> 
        <option value="0">без родителя</option>
      
         <?php foreach ($categories as $cat): ?>
     
        <option value="<?php echo $cat['id']; ?>"><?php echo $cat['name']; ?></option>
        
        <?php endforeach;?>
    </select>     
    <br><br>
    <input type="submit" name="submit" value="создать" style="margin-bottom: 30px">
</form> 
 <hr>
 <a href="/admin">назад в админ-панель</a>