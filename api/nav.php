<nav class="navbar navbar-expand-lg  navbar-light bg-color-grey notPhone">
  <a class="navbar-brand" href="./">SHOPING</a>
  <div class="row" style="width: 90%;">
    <div class="col-2">
    </div>
    <div class="col-5">
        <div class="search bg-color-white">
            <form class="form-inline my-2 my-lg-0 " style="background-color: white;">
                <input class="remove-border" name="search" placeholder="Tìm sản phẩm" style="width: 85%;">
                <button type="submit" class="remove-border" style="width: 15%; height: 15%"><i class="fa fa-search" aria-hidden="true"></i></button>
            </form>
        </div>
    </div>
    <div class="col-2"></div>
    <div class="col-sm">
      
<a src='#' onclick='btncart()' class='btn btn-secondary'><i class='fa fa-shopping-cart' aria-hidden='true'></i></a>
<?php if (!(isset($_SESSION['user_id']))){
        echo "<a src='#' onclick='btnlogin()' class='btn btn-secondary'>Đăng Nhập</a>";
        }else{
          echo "<a href='api/logout.php' class='btn btn-secondary'>Đăng Xuất</a>";
        }
?>
    </div>
  </div>
<script>
  <?php 
    if (isset($_SESSION["error"])){
      echo "$(document).ready(function() { 
        $('.login').show();
        $('.cartorder').hide();
       });";
    }
  ?>
  function btncart(){
    if($('.cartorder').css('display')=='none') {$('.cartorder').show();$('.login').hide();}else{$('.cartorder').hide();};
  }
  function btnlogin(){
    if($('.login').css('display')=='none'){$('.login').show();$('.cartorder').hide();}else{$('.login').hide();}
  }
</script>    
</nav>
<div class="container-fluid cartorder" 
  style="position:absolute;z-index:2; background-color: #cbcba9; ;display: none ; width:90%; height:80%; padding: 5px; left: 5%; box-shadow: 5px 5px 8px grey;">
This is cart
</div>

<div class="container-fluid login" 
  style="position:absolute; z-index:2 ;background-color: #cbcba9; ;display: none ; width:90%; height:80%; padding: 5px; left: 5%; box-shadow: 5px 5px 8px grey;">
<?php require 'login.php'; ?>
</div>