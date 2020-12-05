<script src="../js/jquery-3.5.1.min.js"></script>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<form method="POST">
<div class="form-group form-control-sm">
    <label>Họ Tên Người Nhận</label>
    <input type="text" class="form-control form-control-sm" name="fullname" required>
  </div>
  <br>
  <div class="form-group form-control-sm">
    <label>Số Điện Thoại</label>
    <input type="text" class="form-control form-control-sm" name="phone" required>
  </div>
  <br>
  <div class="form-group form-control-sm">
  <label>Địa Chỉ</label>
  <div class="form-row">
    <div class="col-sm">
    <select name="city" class="city form-control form-control-sm" required>
        <option value="">Chọn Tỉnh/ Thành Phố</option>
    </select>
    </div>
    <div class="col-sm">
    <select name="district" class="district form-control form-control-sm" required>
        <option value="">----</option>
    </select>
    </div>
    <div class="col-sm">
    <select class="ward form-control form-control-sm" required>
        <option value="">----</option>
    </select>
    </div>
    <input id="ward" name="ward" type="hidden"/>
    <input id="district" name="district" type="hidden"/>
    <input id="city" name="city" type="hidden"/>
  </div>
  
  </div>
  <br>
  <div class="form-group">
    <label>Địa chỉ chi tiết</label>
    <input type="text" class="form-control form-control-sm" name="details" required>
  </div>
  <input type="submit" name="add" onclick="if(($('.city').val()=='')||($('.district').val()=='')||($('.ward').val()=='')){ alert('Vui lòng điền đủ các trường'); return false;}" value="Thêm"/>
</form>
<script>
String.prototype.allTrim = String.prototype.allTrim ||
     function(){
        return this.replace(/\s+/g,' ')
                   .replace(/^\s+|\s+$/,'');
     };
    $(document).ready(function(e){
        $.getJSON( "api/city_api.php", function(e) {
            for (var i=0;i<e.length;i++){
               $('.city').append(`<option value="${e[i]['id']}"> 
                                        ${e[i]['name']} 
                                    </option>`); 
            }
        })
    })
    $(".city").change(function(e){
        $("#city").val($(".city option:selected").text().allTrim())
        $.getJSON( `api/district_api.php?city=${$('.city').val()}`, function(e) {
            $('.district').empty();
            $('.district').append(`<option value=""> 
                                        Chọn Quận/ Huyện
                                    </option>`); 
            for (var i=0;i<e.length;i++){
                $('.district').append(`<option value="${e[i]['id']}"> 
                                        ${e[i]['name']} 
                                    </option>`); 
            }
        })
    })
    $(".district").change(function(e){
        $("#district").val($(".district option:selected").text().allTrim())
        $.getJSON( `api/ward_api.php?district=${$('.district').val()}`, function(e) {
            $('.ward').empty();
            $('.ward').append(`<option value=""> 
                                        Chọn Phường/ Xã
                                    </option>`); 
            for (var i=0;i<e.length;i++){
                $('.ward').append(`<option value="${e[i]['id']}"> 
                                        ${e[i]['name']} 
                                    </option>`); 
            }
        })
    })
    $(".ward").change(function(e){
        $("#ward").val($(".ward option:selected").text().allTrim())
    })
</script>
<?php
if (isset($_POST['add'])){
    require "pdo.php";
    $sql = 'INSERT INTO `address`(`idUser`, `fullname`, `phone`, `city`, `district`, `wards`, `detail`) VALUES (:idUser ,:fullname , :phone , :city , :district , :ward , :detail )';
    $stmt_ADDRESS = $pdo->prepare($sql);
    $stmt_ADDRESS->execute(array(':idUser' =>$_SESSION['user_id'],
                                ':fullname'=>$_POST['fullname'],
                                ':phone'=>$_POST['phone'],
                                ':city'=>$_POST['city'],
                                ':district'=>$_POST['district'],
                                'ward'=>$_POST['ward'],
                                ':detail'=>$_POST['details']
                            ));
                            header( 'Location: ./index.php' ) ;
                            return;
}
?>