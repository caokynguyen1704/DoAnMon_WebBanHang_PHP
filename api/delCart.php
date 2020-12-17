<?php
//session_start();
 if (isset($_GET['delProduct'])){
        $arr_new=array();
        
        if (isset($_SESSION['json'])){
               $a=$_SESSION['json'];
               $dem=1;
               $run=count($a);
                for ($i=0;$i<$run;$i++){
                    if ((($dem==0)||($_SESSION['json'][$i]['id']!=$_GET['delProduct']))){
                        $_arr=array('id'=>$_SESSION['json'][$i]['id'],
                        'name'=>$_SESSION['json'][$i]['name'],
                        'gia'=>$_SESSION['json'][$i]['gia'],
                        'soluong'=>$_SESSION['json'][$i]['soluong'],
                        'image'=>$_SESSION['json'][$i]['image']);
                        $arr_new[$i]=$_arr;
                        
                    }else{
                        $dem=0;
                    }
                }
                $_SESSION['json']=$arr_new; 
                //print_r($arr_new);
        }
        
        header( 'Location: ./index.php' ) ;
         return;
    }

?>