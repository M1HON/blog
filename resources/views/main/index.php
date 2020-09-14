<div class="menu">
    <?php
    //print_r($news);
    foreach ($data as $post) : ?>


        <div class="post">


            <? 

echo '<a href = "/show/'.$post['id'].'/"><h1>' .$post['headline']. '</h1></a>';?>
        </div>

    <?php endforeach; ?>
    <div class="post">
        <?


$number_of_pages= array_pop($data);
for($page=1; $page<$number_of_pages+1; $page++)
{
    echo '<a href="/page/' . $page . '/">' . $page . '</a> ';
}
?>
    </div>
</div>