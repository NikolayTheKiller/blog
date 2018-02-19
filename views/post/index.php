<?php include ROOT.'/views/layouts/header.php'; ?>
<?php foreach ($post as $item):?>
<h1 style="margin-left: 30px"><a href="/post/<?php echo $item['id']; ?>"><?php echo $item['name']; ?></a></h1>
<p style="margin-left: 30px"><?php echo $item['short_content']; ?></p>
<?php if($item['path_t_pict']==TRUE):?>
<img src="/<?php echo $item['path_t_pict']; ?>" style="margin-left: 30px">
<?php endif; ?>
<a href="/post/<?php echo $item['id']; ?>" style="margin-left: 30px">читать полную версию</a>
<hr>

<?php endforeach;?>
<?php echo $pagination->get();?>
<a href="/category/"><h3>Назад в категории!</h3></a>
