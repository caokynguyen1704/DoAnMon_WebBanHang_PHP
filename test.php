<div class="container dangnhap">
    <center>
      
        <form method="POST">
            <div class="input-group form-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" class="form-control" name="store" placeholder="giá trị">
            </div>
            <div class="form-group">
                <input type="submit" value="Submit" class="btn float-right login_btn">
            </div>
        </form>
    </center>
</div>
<?php
    session_start();
    $b=json_encode($_SESSION['json']);
    print_r($b);
    if ((isset($_POST['store']))){
            // unset($_SESSION['json']);
            // session_destroy();
            $arr_new=array();
            if (isset($_SESSION['json'])){
                   $a=$_SESSION['json'];
                   $run=count($a);
                    for ($i=0;$i<$run;$i++){
                        $_arr=array('store'=>$_SESSION['json'][$i]['store']);
                        $arr_new[$i]=$_arr;
                    }
                    $arr_new[$run]=array('store'=>$_POST['store']);
                    
            }else{
                $_arr=array('store'=>$_POST['store']);
                $arr_new[0]=$_arr;
            }
                   
                   
                $_SESSION['json']=$arr_new;  
                header( 'Location: test.php' ) ;
                return ;
    }
?>
