<?php
    require 'pdo.php';
    $stmt = $pdo->query("SELECT * FROM category ORDER BY id");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (count($rows)==0){
    }else{
    }
    

?>
<nav class="navbar navbar-expand-sm bg-color-grey navbar-dark">
  <ul class="navbar-nav">
  <?php
    foreach ( $rows as $row ) {
    echo '<li class="nav-item">
        <a class="nav-link of-btn'.$row['id'].'" href="#">'.$row['name'].'</a>
    </li>';
    }
    ?>
  </ul>
</nav>

<?php
  foreach ($rows as $row){
    $sql1 = 'SELECT * FROM product WHERE categoryId= :id';
    $stmt1 = $pdo->prepare($sql1);
    $stmt1->execute(array(':id' =>$row['id']));
    $rows1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
    // echo '<div class="bg-color-gray">
    //     <a class="nav-link" name="'.$row['name'].'">'.$row['name'].'</a>
    // </div>';
    echo '
    <div class="of'.$row['id'].'"  style="display:none;">
      <div class="swiper-container">';
      foreach ($rows1 as $row1){
        echo '
        <div class="slider-box1">
       
        <div class="img-box1">
            <img src="'.$row1['image'].'">
        </div>
        <p class="detail1">'.$row1['name'].'
        </p>
        <div class="cart1">
            <a href="?product='.$row1['id'].'">'.change($row1['price']).' VNĐ </a>
        </div>
    </div>';
      };
    echo '    
      </div>
    </div>
    ';
    echo "<script type='text/javascript'>";
    for ($i=0;$i<count($rows);$i++){
      echo "$('.of-btn".$rows[$i]['id']."').click(function(e){\n$('.of".$rows[$i]['id']."').show();\n";
      for ($j=0;$j<count($rows);$j++){
        if ($i!=$j){
          echo "$('.of".$rows[$j]['id']."').hide();\n";
        }
      }
      echo "});\n";
    }
    echo "</script>";
  }
?>
