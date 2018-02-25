<?php include ROOT.'/views/layouts/header.php'; ?>
<?php foreach ($fullPost as $item=> $i): ?>
<h3 style="margin-left: 25px"><?php echo $i['name']; ?></h3>
<p style="margin-left: 25px"><?php echo $i['content']; ?></p>
<p style="margin-left: 25px"><?php echo $i['pub_date']; ?></p>
<p style="margin-left: 25px"><?php echo $i['author']; ?></p>
<?php if($i['path_t_pict']==TRUE):?>
<img src="/<?php echo $i['path_t_pict']; ?>" style="margin-left: 25px">
<?php endif; ?>
<input type="hidden" id="p_id" value="<?php echo $i['id']; ?>" >
<?php endforeach; ?>
<br>
<a href="/category/" style="margin-left: 25px">назад к категориям</a>
<ul style="margin-left: 40px; margin-bottom: 40px" class="comm"></ul>
<!-- ДОБАВИТЬ НОВЫЙ КОММЕНТАРИЙ (НЕ ОТВЕТ НА КОММЕНТ)-->
 <div id="make_comment">
    <h3>Оставить комментарий</h3>
    <form action="" method="post">
        <input type="text" name="text" id="newcom" style="margin-left: 20px">
        <input type="button" value="сохранить" name="submit" onclick="newcomm(ident)">
    </form>
 </div>

<!-- ФОРМА ОТВЕТА НА КОММЕНТАРИИ  -->
<div id="hideform">
  <form action="" method="post" class="form" style="display: none">
        <h3 style="color: red">Ответить на комментарий</h3>
            <input type="hidden" name="id_comment" id="id_comment" value="" class="reset">
            <textarea name="text" rows="5" cols="50" id="text" class="reset"></textarea><br> 
            <input type="button" name="submit" value="сохранить"  onclick="replycomment()">
  </form>
</div>
<!-- JS -->
<script>
 $(document).ready(function(){});
    var ident = $('#p_id').val();// id поста (не комментария)
    showcomments(ident);//вызов метода -показ всех комментариев
    //МЕТОД ДЛЯ ВЫВОДА ВСЕХ КОММЕНТАРИЕВ
    function showcomments(ident){
    $.post('/showcomm/'+ident,{},function(data){
    var res = JSON.parse(data);
    for(var i=0; i < res.length; i++){
    if(res[i]['parent_id']==0){
    $('#comments').append('<li id="'+res[i]['comment_id']+'" >'+res[i]['text']+'<br><input type="button" value="Ответить" class="send" onclick="reply('+res[i]['comment_id']+","+res[i]['post_id']+')">\n\
<input type="button" value="Удалить" class="delete" onclick="deletec('+res[i]['comment_id']+')"></li>');}
    if(res[i]['parent_id']>0 ){     
    $('#'+res[i]['parent_id']+'').append('<li id="'+res[i]['comment_id']+'">--------'+res[i]['text']+'<br><input type="button" value="Ответить" class="send" onclick="reply('+res[i]['comment_id']+","+res[i]['post_id']+')">\n\
<input type="button" value="Удалить" class="delete" onclick="deletec('+res[i]['comment_id']+')"></li>');
    }}    
 });};
  
  //ДОБАВИТЬ НОВЫЙ КОММЕНТ (НЕ ОТВЕТИТЬ )
 function newcomm(ident){
    $.post('/newcomm/'+ident,{text:$('#newcom').val()},function(data){
    //вытащить последний id в таблице и аппендоm вставить в li
    var res = JSON.parse(data);
    if(res[0]['role']=='ban'){location="/user/logout";}else{
    $('#comments').append('<li id="'+res[0]['comment_id']+'" >'+res[0]['text']+'<br><input type="button" value="Ответить" class="send" onclick="reply('+res[0]['comment_id']+","+res[0]['post_id']+')">\n\
<br><input type="button" value="Удалить" class="delete" onclick="deletec('+res[0]['comment_id']+')"></li>');
    $("#newcom").val('');}}
         );};
    //ВЫЗОВ ПОП-АП ОКНА С ФОРМОЙ ДЛЯ ОТВЕТА НА КОММЕНТ (Ф-ция отправки ответа ниже)
  var pop='';
  function reply(c_id,post_id){
    $('#id_comment').val(c_id);
        pop = $('.form').bPopup({            
        speed: 650,
        transition: 'slideIn',
        transitionClose: 'slideBack'      
        }); 
    };
    // ОТПРАВКА ОТВЕТА НА КОММЕНТАРИЙ - ВЫЗЫВАЕТСЯ ПРИ НАЖАТИИ НА КНОПКУ В ФОРМЕ (onclick=())
    //только эта ф-ция перезагружает страницу
    function replycomment(){
       
        var comm = $('#id_comment').val();
        $.post('/preply/'+ident,{text:$('#text').val(),parent:comm},function(data){
                var res = JSON.parse(data);
                if(res[0]['role']=='ban'){location="/user/logout";}else{
                $('#'+res[0]['parent_id']+'').append('<li id="'+res[0]['comment_id']+'" >--->'+res[0]['text']+'<br><input type="button" value="Ответить" class="send" onclick="reply('+res[0]['comment_id']+","+res[0]['post_id']+')">\n\
    <input type="button" value="Удалить" class="delete" onclick="deletec('+res[0]['comment_id']+')"></li>');
                $('.reset').val(''); pop.close();}
    });        
    }
        
   function deletec(comment_id){
   $.post('/crushcomm',{comm:comment_id},function(){
       $('#'+comment_id+'').hide();
   });
   }
   
   
  
   
    



</script>
<!--КОНЕЦ JS -->
<!-- СЮДА СКРИПТ ЗАКИДЫВАЕТ КОММЕНТАРИИ -->
<div class="showComm">
    <ul id="comments">  
    </ul>
</div>
<?php include ROOT.'/views/layouts/footer.php'; ?>