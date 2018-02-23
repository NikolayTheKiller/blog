<?php include ROOT . '/views/layouts/header.php'; ?>
<h1>Регистрация нового пользователя</h1>

<form action="/user/register/" method="POST">
    <p>input your name:</p>
    <input type="text" name="name">
    <p>input your email:</p>
    <input type="email" name="email">
    <p>input your password</p>
    <input type="password" name="password">
    <br><br>
    <input type="submit" name="submit" value="reg">
</form>
<?php if ($result): ?>
                    <p>Вы зарегистрированы!</p>
                <?php else: ?>
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
<?php endif; ?>


<?php include ROOT.'/views/layouts/footer.php'; ?>
        
       
        
        