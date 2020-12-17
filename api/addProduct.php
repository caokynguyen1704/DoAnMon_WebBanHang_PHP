<script src="../js/jquery-3.5.1.min.js"></script>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<form method="POST">

  <div class="input-group">
  
  <input type="text" name="name" required placeholder="Tên Sản Phẩm" class="form-control">
  <input type="number" name="price" required  placeholder="Giá Tiền" class="form-control">
  <input type="number" class="form-control" placeholder="Sản Phẩm Còn Trong Kho" name="kho" required>
</div>
  
  <br>
  <div class="form-group form-control-sm">
  <label>Danh Mục</label>
  <div class="form-row">
    <div class="col-sm">
    <select name="caterogy" class="form-control form-control-sm" required>
        
        <?php 
         require 'pdo.php';
         $stmt_aP = $pdo->query("SELECT * FROM category ORDER BY id");
         $rows_aP = $stmt_aP->fetchAll(PDO::FETCH_ASSOC);
         foreach ( $rows_aP as $row ) {
          echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
          }
        ?>
    </select>
    </div>
  </div>
  
  </div>
  <br>
  <div class="form-group">
    <label>Hình Ảnh (URL)</label>
    <input type="text" class="form-control form-control-sm" name="picture" required>
  </div>

  <div class="form-group">
    <label>Miêu tả chi tiết</label>
    <input type="text" class="form-control form-control-sm" name="detail" required>
  </div>
  <input type="submit" name="addProduct" value="Thêm"/>
</form>

<?php
if (isset($_POST['addProduct'])){
    require "pdo.php";
    $sql = 'INSERT INTO `product`(`name`, `image`, `price`, `describe`, `warehouse`, `categoryId`) VALUES (:nameP,:imageP,:priceP,:describeP,:warehouseP,:categoryId)';
    $stmt_ADDRESS = $pdo->prepare($sql);
    $stmt_ADDRESS->execute(array(':nameP' =>$_POST['name'],
                                ':priceP' =>$_POST['price'],
                                ':imageP'=>$_POST['picture'],
                                ':describeP'=>$_POST['detail'],
                                ':warehouseP'=>$_POST['kho'],
                                ':categoryId'=>$_POST['caterogy']
                            ));
                            header( 'Location: ./index.php' ) ;
                            return;
}
?>