<?php include ROOT.'/views/layouts/header.php'; ?>
<h1>Редактировать данные пользователя:</h1>
<form action="" method="post">
    <p>input your name:</p>
    <input type="text" name="name">    
    <p>input your password</p>
    <input type="password" name="password">
    <br><br>
    <input type="submit" name="submit" value="сохранить">
</form>
<?php include ROOT.'/views/layouts/footer.php'; ?>