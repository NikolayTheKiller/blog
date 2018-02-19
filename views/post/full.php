<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head>
	<title>The Blog</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="/views/css/images/favicon.ico" />
	<link rel="stylesheet" href="/views/css/style.css" type="text/css" media="all" />
	<script src="/views/js/jquery-3.2.1.js" type="text/javascript"></script>
        <script src="/views/js/popup.js" type="text/javascript"></script>
</head>
    <body>

<?php foreach ($fullPost as $item=> $i): ?>
<h3><?php echo $i['name']; ?></h3>
<p><?php echo $i['content']; ?></p>
<p><?php echo $i['pub_date']; ?></p>
<p><?php echo $i['author']; ?></p>
<?php if($i['path_t_pict']==TRUE):?>
<img src="/<?php echo $i['path_t_pict']; ?>" >
<?php endif; ?>
    <?php $ident = $i['id']; ?>
<?php endforeach; ?>
<a href="/category/">назад к категориям</a>
    <div id="make_comment">
    <h3>Оставить комментарий</h3>
    <form action="" method="post">
        <input type="text" name="text" id="newcom" style="margin-left: 20px">
        <input type="button" value="сохранить" name="submit" onclick="newcomm('<?php echo $ident; ?>')">
    </form>
    </div>
<br><br>
<h3>Ответить на комментарий</h3>
<div id="form">
<form action="" method="post">
    <input type="hidden" name="id_comment" id="id_comment" value="">
    <input type="hidden" name="id_p" id="id_p" value="">
    <textarea name="text" rows="5" cols="50" id="text"></textarea>
    <br>
    <input type="button" value="сохранить" onclick="sendByAjax()" name="submit" id="f" style="display: block">
</form>
</div>
<script>
$(document).ready(function(){});
function reply(ids,ibs)
   {   
       $('#id_comment').val(ids);
       $('#id_p').val(ibs);
      var pop = $('#form').bPopup({
            speed: 650,
            transition: 'slideIn',
	    transitionClose: 'slideBack'
        });  
        $('#f').on('click',function(){
            pop.close();
        });
   }
    
 function sendByAjax(){
     var comm = $('#id_comment').val();
     var post = $('#id_p').val();
     
     $.post('/post/reply/'+comm+'/'+post,{text:$('#text').val()},function(){
            location.reload();});   
 }   
 
function newcomm(ident){
    $.post('/post/'+ident,{text:$('#newcom').val()},function(data){  
         //var parser = JSON.stringify(data);
        //var result = JSON.parse(parser);
     //console.log(result,'div');
            location.reload();
            
    });
 
}





</script>
    


<hr>
    <div >
    <ul style="margin-left: 20px" class="getcomm"><?php echo $showComments ?></ul>
    </div>
<hr>

<?php include ROOT.'/views/layouts/footer.php'; 