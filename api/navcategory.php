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
        <a class="nav-link" href="#">'.$row['name'].'</a>
    </li>';
    }
    ?>
  </ul>
</nav>