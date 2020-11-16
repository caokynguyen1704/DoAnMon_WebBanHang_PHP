<?php
    require 'pdo.php';
    $stmt = $pdo->query("SELECT * FROM product ORDER BY id DESC");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (count($rows)==0){
    }else{
    }


?>

<div class="heading"><h1>HÀNG MỚI NHẬP</h1></div>
<div class="swiper-container">
<div class="swiper-wrapper">
<?php
function change($t){
    $kq="";
    for ($i=strlen($t)-1;$i>=0;$i--){
        if (((strlen($t)-$i-1)%3==0)){
            $kq=$t[$i].".".$kq;
        }else{
            $kq=$t[$i].$kq;
        }
    }
    return $kq;
    }
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
<!--swiper  slider end-->


<script type="text/javascript" src="js/swiper.min.js"></script>
<script src="js/script.js"></script>