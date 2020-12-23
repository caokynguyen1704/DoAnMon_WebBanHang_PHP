
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Sản Phẩm</th>
      <th scope="col">Giá</th>
      <th scope="col">Trạng Thái</th>
      <th scope="col">x</th>
    </tr>
  </thead>
  <tbody>
<?php
function status($code){
    if ($code==null){
        return "Đang xử lý";
    }
    if ($code==1){
        return "Đã tiếp nhận";
    }
    if ($code==2){
        return "Đang Đóng Gói";
    }
    if ($code==3){
        return "Đang Gửi Đơn Vị Vận Chuyển";
    }
    if ($code==4){
        return "Đang Giao";
    }
    if ($code==5){
        return "Giao Thành Công";
    }
}
require 'pdo.php';
    $sql = 'SELECT * FROM `order` WHERE `idUser` = :id';
    $stmt_viewOrder = $pdo->prepare($sql);
    $stmt_viewOrder->execute(array(':id' =>$_SESSION['user_id']));
    $rows_viewOrder = $stmt_viewOrder->fetchAll(PDO::FETCH_ASSOC);
    if (count($rows_viewOrder)==0){ echo "Bạn chưa mua hàng";}
    else{
        foreach ( $rows_viewOrder as $row ) {
            $arr=json_decode($row['listProduct'],true);
            
            if (gettype($arr)=="array"){
                $list="";
                for($i=0;$i<count($arr);$i++){
                    $list_new='
                    <li><a href="?product='.$arr[$i]['id'].'">'.$arr[$i]['name']." x".$arr[$i]['soluong'].'</a></li>';
                    $list=$list.$list_new;
                }
        echo '
            <tr>
            <td><ul>'.$list.'</ul></td>
            <td>'.$row['totalPrice'].'</td>
            <td>'.status($row['status']).'</td>';
            if ($row['status']==null){echo '<td><a href="?delOrder='.$row['id'].'">Hủy Đơn</a></td>';}
            echo '</tr>
        ';}
        }
    }
?>

    
  </tbody>
</table>
<?php
if (isset($_GET['delOrder'])){
    require 'pdo.php';

    $sql1 = 'SELECT * FROM `order` WHERE `id` = :id1';
    $stmt_viewOrder1 = $pdo->prepare($sql1);
    $stmt_viewOrder1->execute(array(':id1' =>$_GET['delOrder']));
    $rows_viewOrder1 = $stmt_viewOrder1->fetchAll(PDO::FETCH_ASSOC);
if ($rows_viewOrder1['status']==null){
    $sql = 'DELETE FROM `order` WHERE id= :id';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':id' =>$_GET['delOrder']));
    header( 'Location: ./index.php' ) ;
    return;
}
}
?>