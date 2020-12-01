<?php
    function addCart($id, $name, $soluong, $gia,$image){
        $arr_new=array();
        if (isset($_SESSION['json'])){
               $a=$_SESSION['json'];
               $run=count($a);
                for ($i=0;$i<$run;$i++){
                    $_arr=array('id'=>$_SESSION['json'][$i]['id'],
                    'name'=>$_SESSION['json'][$i]['name'],
                    'gia'=>$_SESSION['json'][$i]['gia'],
                    'soluong'=>$_SESSION['json'][$i]['soluong'],
                    'image'=>$_SESSION['json'][$i]['image']);
                    $arr_new[$i]=$_arr;
                }
                $arr_new[$run]=array('id'=>$id,
                'name'=>$name,
                'gia'=>$gia,
                'soluong'=>$soluong,
                'image'=>$image);
                
        }else{
            $_arr=array('id'=>$id,
            'name'=>$name,
            'gia'=>$gia,
            'soluong'=>$soluong,
            'image'=>$image);
            $arr_new[0]=$_arr;
        }
        $_SESSION['json']=$arr_new; 
    }
?>

<!-- <div class="container dangnhap">
    <center>
      
        <form method="POST">
            <div class="input-group form-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" class="form-control" name="id" placeholder="id">
            </div>
            <div class="input-group form-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" class="form-control" name="name" placeholder="tên">
            </div>
            <div class="input-group form-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" class="form-control" name="gia" placeholder="giá">
            </div>
            <div class="input-group form-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" class="form-control" name="soluong" placeholder="soluong">
            </div>
            <div class="form-group">
                <input type="submit" value="Submit" class="btn float-right login_btn">
            </div>
        </form>
    </center>
</div>
 <?php
//     session_start();
//     $b=json_encode($_SESSION['json']);
//     print_r($b);
//             var_dump($aa); 
//    var_dump( $_SESSION['json']);
//    if (isset($_GET['del']))
//    {
//         unset($_SESSION['json']);
//             session_destroy();
//    }
//     if ((isset($_POST['id']))&(isset($_POST['name']))&(isset($_POST['gia']))&(isset($_POST['soluong']))){
//            addCart($_POST['id'],$_POST['name'],$_POST['soluong'],$_POST['gia']);
//             // $arr_new=array();
//             // if (isset($_SESSION['json'])){
//             //        $a=$_SESSION['json'];
//             //        $run=count($a);
//             //         for ($i=0;$i<$run;$i++){
//             //             $_arr=array('id'=>$_SESSION['json'][$i]['id'],
//             //             'name'=>$_SESSION['json'][$i]['name'],
//             //             'gia'=>$_SESSION['json'][$i]['gia'],
//             //             'soluong'=>$_SESSION['json'][$i]['soluong']);
//             //             $arr_new[$i]=$_arr;
//             //         }
//             //         $arr_new[$run]=array('id'=>$_POST['id'],
//             //         'name'=>$_POST['name'],
//             //         'gia'=>$_POST['gia'],
//             //         'soluong'=>$_POST['soluong']);
                    
//             // }else{
//             //     $_arr=array('id'=>$_POST['id'],
//             //     'name'=>$_POST['name'],
//             //     'gia'=>$_POST['gia'],
//             //     'soluong'=>$_POST['soluong']);
//             //     $arr_new[0]=$_arr;
//             // }
                   
            
                 
//                 header( 'Location: test.php' ) ;
//                 return ;
//     }
/*
save lên database
 $_SESSION['json'] kiểu array không đem lên database được phải thêm một bước mã hóa array thành string bằng hàm serialize 
 hoặc giải mã string thành array bằng hàm unserialize

 $array = array( 1, 2, 3 );
$string = serialize( $array );
echo $string;
To convert any array (or any object) into a string using PHP, call the serialize():

$array = array( 1, 2, 3 );
$string = serialize( $array ); -->POST lên database
$array = unserialize( $string ); --> đọc dữ liệu database trả về
*/
?> 
