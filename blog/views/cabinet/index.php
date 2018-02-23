<?php include ROOT . '/views/layouts/header.php'; ?>



            <h3>Кабинет пользователя</h3>
            
            <h4>Привет, <?php echo $user['name'];?>!</h4>
            <ul>
                <li><a href="/cabinet/edit">Редактировать данные</a></li>
               
            </ul>
     

<?php include ROOT . '/views/layouts/footer.php'; ?>