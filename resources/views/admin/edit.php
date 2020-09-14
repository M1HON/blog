<div class="menu">
  <div class="post">
    <?


$number_of_pages= array_pop($data);
for($page=1; $page<$number_of_pages+1; $page++)
{
    echo '<a href="/edit/' . $page . '/">' . $page . '</a> ';
}?>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Название</th>
          <th scope="col">Дата создания</th>
          <th scope="col">Удалить</th>
          <th scope="col">Редактировать</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $number = 0;
        foreach ($data as $post) :
          $number++;
        ?>
          <tr>
            <th scope="row"><?= $post['id']; ?></th>
            <td><?= $post['headline']; ?></td>
            <td><?= $post['date']; ?></td>
            <? echo' <td><a type="button" style="color: white;" class="btn btn-primary" href="/change/'.$post['id'].'/">Редактировать</a></td>
              <td><a type="button" style="color: white;" class="btn btn-danger" href="/delete/'.$post['id'].'/">Удалить</a></td>';?>
          </tr>
        <?php
        endforeach; ?>

      </tbody>
    </table>
  </div>