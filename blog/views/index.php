<?php include ROOT.'/views/layouts/header.php'; ?>

<!-- Slider -->
<div id="slider">
	<div class="shell">
		<div class="slider-left">
			<h2>Lorem ipsum dolor sit amet</h2>
			<p>Quisque eleifend, arcu a dictum v1arius, risus neque venenatis arcu, a semper massa. Quisque eleifend, arcu a dictum v1arius, risus neque venenatis arcu, a semper massa.</p>
			<a href="#" class="order-now">Order Now</a>
		</div>
		<div class="slider-right">
			<div class="slider-content">
				<ul>
                                    <?php foreach ($sliderShow as $slide): ?>
                                    <li><img src="/<?php echo $slide['path_t_pict']; ?>" style="height: 350px; width: 1080px" /></li>
				    <?php endforeach; ?>
                                    
				</ul>
			</div>
                    
			<div class="slider-nav">
				<ul>
				    <li><a href="#">1</a></li>
				    <li><a href="#">2</a></li>
				    <li><a href="#">3</a></li>
				    <li><a href="#">4</a></li>
				    <li><a href="#">5</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- End Slider -->
<!-- Main -->
<div id="main">
	<div class="shell">
		<div id="sidebar">
			<div class="text-container">
				<h2>Каталог:</h2>                  
                                 <?php echo '<ul>'. $cat_menu .'</ul>'; ?>   
                                                           
			</div>
			<div class="post">
                          
                            <?php foreach ($new as $article): ?>
				<h2>Последние статьи</h2>
                                <?php if($article['path_t_pict']==TRUE): ?>
                                <img src="/<?php echo $article['path_t_pict']; ?>" alt="" />
                                <?php endif;?>
                                <p><?php echo $article['short_content']; ?></p>
				<a href="/post/<?php echo $article['id']; ?>" class="more">more</a>
                            <?php endforeach; ?>    
			</div>
		</div>
		<div id="content">
			<div class="col">
				<div class="post">
					<h2>What is this place?</h2>
					<img src="/views/css/images/post-image2.gif" alt="" class="right" />
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dictum, neque ut imperdiet pellentesque, nulla tellus tempus magna, sed consectetur orci metus a justo. Aliquam ac congue nunc. Mauris a tortor ut massa egestas tempus. Pellentesque tincidunt fermentum diam sagittis ullamcorper.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dictum, neque ut imperdiet pellentesque, nulla tellus tempus magna, sed consectetur orci metus a justo. Aliquam ac tellus tempus magna, sed consectetur orci metus a justo. Aliquam ac congue nunc. </p>
					<div class="cl">&nbsp;</div>
					<a href="#" class="more">more</a>
				</div>
			</div>
			<div class="col cols-2">
				<div class="post">
					<h2>Who we are?</h2>
					<img src="/views/css/images/post-image3.gif" alt="" class="right" />
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dictum, neque ut imperdiet pellentesque, nulla tellus tempus Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dictum, neque ut imperdiet pellentesque, nulla tellus tempus magna, sed consectetur orci metus a justo. Aliquam ac congue nunc. </p>
					<div class="cl">&nbsp;</div>
					<a href="#" class="more">more</a>
				</div>
			</div>
			<div class="col cols-2 last">
				<div class="post">
					<h2>What we do?</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dictum, neque ut imperdiet pellentesque, nulla tellus tempus magna, sed consectetur orci metus a justo. Aliquam ac congue nunc. Mauris a tortor ut massa egestas Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dictum, neque ut imperdiet pellentesque, nulla tellus tempustincidunt fermentum diam sagittis ullamcorper.</p>
					<a href="#" class="more left">more</a>
					<img src="/views/css/images/post-image4.gif" alt="" class="right" />
					<div class="cl">&nbsp;</div>
				</div>
			</div>
		</div>
		<div class="cl">&nbsp;</div>
	</div>
</div>
<!-- End Main -->
<?php include ROOT.'/views/layouts/footer.php'; ?>
