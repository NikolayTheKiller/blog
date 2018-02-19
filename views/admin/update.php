<h4>редактивать категорию #<?php echo $id; ?></h4>        

       <?php $parent=$safe['parent_id']; ?>
       <?php $parentN= Category::getCategoryById($parent); ?>
      
               
            <form method="post">        
                <p>имя:</p>
               
                <input type="text" name="name"value="<?php echo $safe['name']; ?>">
              
                <p>статус:</p>
                <input type="radio" name="status" value="1">Активна<br>
                <input type="radio" name="status" value="0">Неактивна<br>
                <p>подкатегория для:</p>
                <select name="child">
                <option value="<?php echo $safe['parent_id']; ?>"><?php echo $parentN['name']; ?></option>              
                <option value="0">без родителя</option>      
                <?php foreach ($categories as $cat): ?>
                <?php if($id==$cat['id']): continue; //подкатегория не может быть = самой себе?>
                <?php endif; ?>
                <option value="<?php echo $cat['id']; ?>"><?php echo $cat['name']; ?></option>                
                <?php endforeach;?>
                </select>  
                <input type="submit" name="submit" value="редактировать" />
            </form>
            
            <hr>
            <a href="/admin">назад в админ-панель</a>
