<?php include ROOT . '/views/layouts/header.php'; ?>
    <form action="/user/login/" method="post">
            <p>введите ваш email:</p>
         <input type="email" name="email">   
            <p>введите ваш пароль:</p>
         <input type="password" name="password"> 
         <p>запомнить меня:</p>
         <input type="checkbox" name="remember">
         <input type="submit" value="auth" name="submit">
    </form>
    <?php if (isset($errors) && is_array($errors)): ?>
          <ul>
             <?php foreach ($errors as $error): ?>
                   <li> - <?php echo $error; ?></li>
             <?php endforeach; ?>
          </ul>
    <?php endif; ?>
<?php include ROOT.'/views/layouts/footer.php'; ?>
