<div class="menu">


    <div class="news">
        <h1>
        <? echo $data['date'];?> <? echo $data['headline'];?>
        </h1>
        <?
if (file_exists('resources/assets/images/'.$data['id'].'.jpg')) {
   ?>
        <img class="Image" src="/resources/assets/images/<?php echo $data['id']; ?>.jpg">
        <?
}
?>

   
        <p class="preview">
            <? echo $data['preview'];?>
        </p>
        <p>
            <? echo $data['text'];?>
        </p></br>
    </div>


</div>