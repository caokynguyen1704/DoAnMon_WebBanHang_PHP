<?php
  function change($t){
    $kq="";
    for ($i=strlen($t)-1;$i>=0;$i--){
        if ((((strlen($t)-$i-1)%3==0))&&(($i!=strlen($t)-1))){
            $kq=$t[$i].".".$kq;
        }else{
            $kq=$t[$i].$kq;
        }
    }
    return $kq;
    }
    require 'pdo.php';
    $sql = 'SELECT * FROM product WHERE id = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':id' =>$_GET['product']));
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (count($rows)==0){
        echo "Không tìm thấy sản phẩm";
    }else{
        ECHO '<form method="POST">';
        if (isset($_SESSION['role'])){
            if ($_SESSION['role']==1){
                echo '<button type="submit" name="delProduct" class="btn btn-danger">Xóa</button>';
            }
        }
        echo '<div class="container">
    

        <img src="'.$rows[0]["image"].'" width="40%" height="80%" style="float: left;"/>
        <div class="container">
            <center><h1>'. $rows[0]["name"] .'</h1></center>
            <br>
            <h3><b>GIÁ BÁN:   </b>'.change($rows[0]["price"]).' đ</h3>
            
            <h6><b>TRONG KHO:   </b>'. $rows[0]["warehouse"].'</h6>
            <h6><b>Miêu tả:</b></h6>
            <p>'. $rows[0]["describe"].'</p>
           
            <input type="hidden" name="productAdd" value="1"/>
            <button type="submit" name="add" class="btn btn-primary btn-block ';
            if ($rows[0]["warehouse"]==0){
                echo "disabled";
            }
            
            echo'"><i class="fa fa-cart-plus fa-2x" aria-hidden="true"></i></button>
            ';
            
            echo '
        </div>
        
        </div>
        </form>';
    }
?>

<?php
    require 'addCart.php';
    if (isset($_POST['productAdd'])){
        if(isset($_POST['add'])){
        addCart($rows[0]['id'],$rows[0]['name'],1,$rows[0]['price'],$rows[0]['image']);
        header( 'Location: ./index.php' ) ;
        return;}
    }
    if (isset($_POST['delProduct'])){
        require 'pdo.php';
        $sql_del = 'DELETE FROM `product` WHERE id = :id';
        $stmt_del = $pdo->prepare($sql_del);
        $stmt_del->execute(array(':id' =>$_GET['product']));
        header( 'Location: ./index.php' ) ;
        return;
    }
?>