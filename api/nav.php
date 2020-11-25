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
<a src="#" onclick="if($('.cartorder').css('display')=='none') {$('.cartorder').show();$('.login').hide();}else{$('.cartorder').hide();}" class="btn btn-secondary"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
<a src="#" onclick="if($('.login').css('display')=='none'){$('.login').show();$('.cartorder').hide();}else{$('.login').hide();}" class="btn btn-secondary">Đăng Nhập</a>
    </div>
  </div>
    
</nav>
<div class="container-fluid cartorder" 
  style="background-color: #cbcba9; ;display: none ;position:absolute; width:90%; height:80%; padding: 5px; left: 5%; box-shadow: 5px 5px 8px grey;">
This is cart
</div>

<div class="container-fluid login" 
  style="background-color: #cbcba9; ;display: none ;position:absolute; width:90%; height:80%; padding: 5px; left: 5%; box-shadow: 5px 5px 8px grey;">
This is login
</div>