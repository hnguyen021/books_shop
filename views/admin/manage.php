<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">ID </th>
      <th scope="col">TEN SACH</th>
      <th scope="col">HINH SACH</th>
      <th scope="col">MO TA SACH</th>
      <th scope="col">TAC GIA</th>
      <th scope="col">THE LOAI</th>
      <th scope="col">NAM XUAT BAN</th>
      <th scope="col">QUOC GIA</th>
      <th scope="col">GIA SACH</th>
      <th scope="col">UPDATE</th>
      <th scope="col">DELETE</th>
      
    </tr>
  </thead>
  <tbody>
  <?php
   for($i=0;$i<count($books);$i++){

  ?>
    <tr>
      <th scope="row"><?=$books[$i]->idsach?></th>
      <td><?=$books[$i]->tensach?></td>
      
      <td><img src="<?$books[$i]->hinhsach?>" style="max-height: 80px"></td>
      <td><?=$books[$i]->motasach?></td>
      <td><?=$books[$i]->tacgiasach?></td>
      <td><?=$books[$i]->idtheloai?></td>
      <td><?=$books[$i]->namxuatban?></td>
      <td><?=$books[$i]->idquocgia?></td>
      <td><?=$books[$i]->giasach?></td>
      <td><button type="button" class="btn btn-info"><a href="?controller=admin&action=update&id=<?=$books[$i]->idsach?>">UPDATE</a></button></td>
      <td><button type="button" class="btn btn-info"><a href="?controller=admin&action=delete&id=<?=$books[$i]->idsach?>">DELETE</a></button></td>
    </tr>
    <?php
   }
    ?>
  </tbody>
</table>