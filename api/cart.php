<?php

function change1($t){
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
    if (isset($_SESSION['json'])){
        $list_new=array();
        $vitri=0;
        $sotien=0;
        for ($i=0;$i<count($_SESSION['json']);$i++){
            $bool=true;
            $quanity=0;
            
            if($_SESSION['json'][$i]['id']==-1){
                $bool=false;
            }
            if (count($list_new)>0){
                for ($k=0;$k<count($list_new);$k++){
                    if (($_SESSION['json'][$i]['id']==$list_new[$k]['id'])||($_SESSION['json'][$i]['id']==-1)){
                        $bool=false;
                    }
                }
            }
            if ($bool){
                $sotien=$sotien+$_SESSION['json'][$i]['gia'];
                for ($j=$i;$j<count($_SESSION['json']);$j++){
                    if ($_SESSION['json'][$i]['id']==$_SESSION['json'][$j]['id']){
                        $quanity=$quanity+1;
                    
                    }
                }
                
                $arr=array('id'=>$_SESSION['json'][$i]['id'],
                            'name'=>$_SESSION['json'][$i]['name'],
                            'gia'=>$_SESSION['json'][$i]['gia'],
                            'soluong'=>$quanity,
                        'image'=>$_SESSION['json'][$i]['image']);
                $list_new[$vitri]=$arr;
                $vitri=$vitri+1;
            }
        }
        $_SESSION['cart']=$list_new;
        $json_post=json_encode($_SESSION['cart']);
            echo '
                <div class="row">
                    <div  class="col-sm"  style=" width:100%; height:490px;overflow: scroll; overflow-x: hidden;">';
                    foreach ($list_new as $ro){
                    echo '
                        <div  style="background-color: white; width:100%; height:100px">
                            <img style="float: left;" src="'.$ro['image'].'" width="100px" height="100px"/>    
                            <center><b><a href="?product='.$ro['id'].'">'.$ro['name'].'</a></b></center>
                            <p>x'.$ro['soluong'].'</p>
                            <b>'.change1($ro['gia']).' VNĐ</b>
                            <a href="?delProduct='.$ro['id'].'">(x)</a>
                        </div> ';
                    }
                    echo '
                    </div>
                    <div class="col-sm">
                        ';
echo "<b>TỔNG: ".($sotien)." VNĐ</b>";
                        echo '<br><h3>Địa chỉ thanh toán</h3>';
                        require 'pdo.php';
                        $sql_vAddress = 'SELECT * FROM address WHERE idUser = :id';
                        $stmt_vAddress = $pdo->prepare($sql_vAddress);
                        $stmt_vAddress->execute(array(':id' =>$_SESSION['user_id']));
                        $rows_vAdress = $stmt_vAddress->fetchAll(PDO::FETCH_ASSOC);
                        echo "<form method='POST'>";
                        echo '<select name="address_" class="diachi form-control form-control-sm" required>';
                        if (count($rows_vAdress)>0){
                            
                            foreach ( $rows_vAdress as $row_address ) {
                                echo '<option value="'.$row_address['id'].'">'.$row_address['detail']."-".$row_address['wards']."-".$row_address['district']."-".$row_address['city'].'</option>';
                            }
                           
                        }
                        echo " </select>";
                        if (count($rows_vAdress)>0){
                            echo '<div class="info_address">
                            <p><b>Tên: </b>'.$rows_vAdress[0]['fullname'].'</p>
                            <p><b>Số Điện Thoại: </b>'.$rows_vAdress[0]['phone'].'</p>
                            <p><b>Địa Chỉ: </b>'.$rows_vAdress[0]['detail']."-".$rows_vAdress[0]['wards']."-".$rows_vAdress[0]['district']."-".$rows_vAdress[0]['city'].'</p>
                            </div>';
                            echo "";
                        }
                        echo '
                        <input type="submit" name="buy" value="Đặt hàng"></form>
                    </div> 
                </div>
            ';
        
    }else{
        echo "Chưa có mặt hàng";
    }
   
?>
<?php
if (isset($_POST['buy'])){
    print_r($_POST);
    if (isset($_POST['address_'])){
        if (count($_SESSION['cart'])>0){
        require "pdo.php";
        $sql_buy = 'INSERT INTO `order`(`idUser`, `listProduct`, `idAddress`, `totalPrice`) VALUES (:idUser, :list, :idAddress, :total)';
                        $stmt_buy = $pdo->prepare($sql_buy);
                        $stmt_buy->execute(array(':idUser' =>$_SESSION['user_id'],
                                                ':list'=>json_encode($_SESSION['cart']),
                                                ':idAddress'=>$_POST['address_'],
                                                ':total'=>$sotien
                                                ));
                                                print_r($stmt_buy);
                                                unset($_SESSION['cart']);
                                                unset($_SESSION['json']);
                                                header( 'Location: ./index.php' ) ;
     return;
                                            }                                 
    }
    else{
        echo "Vui lòng chọn địa chỉ";
    }
    // 
}
?>
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

         $(".diachi").change(function(e){
        $.getJSON( `api/address_api.php?idaddress=${$('.diachi').val()}`, function(e) {
            $('.info_address').empty();
            $('.info_address').append(` <p><b>Tên: </b>${e[0]['fullname']}</p>
                      <p><b>Số Điện Thoại: </b>${e[0]['phone']}</p>
                      <p><b>Địa Chỉ: </b>${e[0]['address']}</p>
                      `); 
        })
    })
                      </script>