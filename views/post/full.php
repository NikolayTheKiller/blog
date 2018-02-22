<?php include ROOT.'/views/layouts/header.php'; ?>
<?php foreach ($fullPost as $item=> $i): ?>
<h3 style="margin-left: 25px"><?php echo $i['name']; ?></h3>
<p style="margin-left: 25px"><?php echo $i['content']; ?></p>
<p style="margin-left: 25px"><?php echo $i['pub_date']; ?></p>
<p style="margin-left: 25px"><?php echo $i['author']; ?></p>
<?php if($i['path_t_pict']==TRUE):?>
<img src="/<?php echo $i['path_t_pict']; ?>" style="margin-left: 25px">
<?php endif; ?>
<?php endforeach; ?>

<br>
<a href="/category/" style="margin-left: 25px">назад к категориям</a>
<ul style="margin-left: 40px; margin-bottom: 40px" class="comm"></ul>
<script>
 $(document).ready(function(){});

 $.post('/showcomm/119',{},function(data){
    var res = JSON.parse(data);
    for(var i=0; i < res.length; i++){
        if(res[i]['parent_id']==0){
        $('#comments').append('<li id="'+res[i]['comment_id']+'" >'+res[i]['text']+'</li>');}
        if(res[i]['parent_id']>0 ){
              
                 $('#'+res[i]['parent_id']+'').append('<li id="'+res[i]['comment_id']+'">--------'+res[i]['text']+'</li>');
             
        }
    }
    console.log(res[0]['text']);
     
 });
 


</script>
<div >
<ul id="comments">
  
</ul>
</div>
<?php include ROOT.'/views/layouts/footer.php'; ?>