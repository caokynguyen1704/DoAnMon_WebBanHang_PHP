
<form method="POST">
  <div class="form-group">
    <label>Tên Danh Mục:</label>
    <input type="text" class="form-control form-control-sm" name="category" required>
  </div>
  <input type="submit" name="addCategory" onclick="if(($('.category').val()=='')){ alert('Vui lòng điền đủ các trường'); return false;}" value="Thêm"/>
</form>

<?php
if (isset($_POST['addCategory'])){
    require "pdo.php";
    $sql = 'INSERT INTO `category`(`name`) VALUES (:category)';
    $stmt_ADDca = $pdo->prepare($sql);
    $stmt_ADDca->execute(array(':category' =>$_POST['category']));
    header( 'Location: ./index.php' ) ;
    return;
}
?>