<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head>
	<title>The Blog</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="/views/css/images/favicon.ico" />
	<link rel="stylesheet" href="/views/css/style.css" type="text/css" media="all" />
	<!--[if IE 6]>
		<link rel="stylesheet" href="/views/css/ie6.css" type="text/css" media="all" />
		<script src="/views/js/png-fix.js" type="text/javascript"></script>
	<![endif]-->
	<script src="/views/js/jquery-1.4.2.js" type="text/javascript"></script>
	<script src="/views/js/jquery.jcarousel.js" type="text/javascript"></script>
	<script src="/views/js/js-func.js" type="text/javascript"></script>
        <script src="/views/js/accordion.js" type="text/javascript"></script>
</head>
<body>
<!-- Header -->
<div id="header">
	<div class="shell">
		<h1 id="logo" class="notext"><a href="#">Привет</a></h1>
		<div id="navigation">
			<ul>
			    <li><a href="/" class="active">Главная</a></li>
                            <?php if(User::isGuest()): ?>
			    <li><a href="/user/register/">Регистрация</a></li>
                            <li><a href="/user/login/">Вход</a></li>
                            <li><a href="/category/">Категории</a></li> 
                            <?php else: ?>                                        
                            
                            <li><a href="/category/">Категории</a></li> 
			    <li><a href="/user/logout/">Выход</a></li>
                            <li><a href="/cabinet/index/">Кабинет</a></li>
                            <?php endif; ?>
			    <li><a href="#">Контакты</a></li>
			   
			</ul>
		</div>
	</div>
</div>
<!-- End Header -->