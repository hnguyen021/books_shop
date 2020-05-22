
<table class="table">
  <thead>
    <tr>
      <th scope="col">Mã Hóa Đơn</th>
      <th scope="col">Ngày Tạo</th>
      <th scope="col">Tổng Tiền</th>
      <th scope="col">Trạng Thái</th>
      <th scope="col"> Xử Lý</th>
    </tr>
  </thead>
  <tbody>
  <?php
   for($i=0;$i<count($billss);$i++){

  ?>
    <tr>
      <th scope="row">00<?=$billss[$i]->idgiohang?></th>
      <td><?=$billss[$i]->ngaylap?></td>
      <td><?=$billss[$i]->tongtien?></td>
      <?php if($billss[$i]->xuly == 0){
        
      ?>
       <td>Chưa Xử Lý</td>
     <?php
      }else{
        
      
     ?>
      <td>Đã Xử Lý</td>
     <?php
      }
     ?>
      <td><button type="button" class="btn btn-info"><a href="?controller=admin&action=handle&id=<?=$billss[$i]->idgiohang?>">Xử Lý</a></button></td>
    </tr>
    <?php
        }
    ?>
  </tbody>
</table>