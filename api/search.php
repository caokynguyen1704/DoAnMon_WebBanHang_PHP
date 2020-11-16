<?php
    require 'pdo.php';
    $sql = 'SELECT * FROM product WHERE name LIKE :tensp';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':tensp' =>"%".$_GET['search']."%"));
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (count($rows)==0){
        echo "Không tìm thấy sản phẩm";
    }else{
    }
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


?>
<div class="swiper-container">
<div class="swiper-wrapper">
<?php

foreach ( $rows as $row ) {
    
    echo '<div class="swiper-slide">
            <div class="slider-box">
                <p class="time"><span class="badge badge-warning" style="z-index:1;">new</span></p>
                <div class="img-box">
                    <img src="'.$row['image'].'">
                </div>
                <p class="detail">'.$row['name'].'
                </p>
                <div class="cart">
                    <a href="#">'.change($row['price']).' VNĐ </a>
                </div>
            </div>
        </div>';
}
?>
</div>
</div>