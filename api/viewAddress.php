
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col-sm">Họ Tên</th>
      <th scope="col-sm">Số Điện Thoại</th>
      <th scope="col-sm">Địa Chỉ</th>
      <th scope="col-sm"></th>
    </tr>
  </thead>
  <tbody>
<?php
require 'pdo.php';
    $sql = 'SELECT * FROM address WHERE idUser = :id';
    $stmt_viewAddress = $pdo->prepare($sql);
    $stmt_viewAddress->execute(array(':id' =>$_SESSION['user_id']));
    $rows_viewAdress = $stmt_viewAddress->fetchAll(PDO::FETCH_ASSOC);
    if (count($rows_viewAdress)==0){ echo "Bạn chưa có địa chỉ";}
    else{
        foreach ( $rows_viewAdress as $row ) {
        echo '
        <tr>
        <td>'.$row['fullname'].'</td>
        <td>'.$row['phone'].'</td>
        <td>'.$row['detail']."-".$row['wards']."-".$row['district']."-".$row['city'].'</td>
        <td><a href="?delAddress='.$row['id'].'">(x)</a></td>
      </tr>
        ';
        }
    }
?>

    
  </tbody>
</table>
<?php
if (isset($_GET['delAddress'])){
    require 'pdo.php';
    $sql = 'DELETE FROM `address` WHERE id= :id';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':id' =>$_GET['delAddress']));
    header( 'Location: ./index.php' ) ;
    return;
}
?>