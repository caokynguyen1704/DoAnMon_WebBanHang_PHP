<?php
    function addCart($id, $name, $soluong, $gia){
        $arr_new=array();
        if (isset($_SESSION['json'])){
               $a=$_SESSION['json'];
               $run=count($a);
                for ($i=0;$i<$run;$i++){
                    $_arr=array('id'=>$_SESSION['json'][$i]['id'],
                    'name'=>$_SESSION['json'][$i]['name'],
                    'gia'=>$_SESSION['json'][$i]['gia'],
                    'soluong'=>$_SESSION['json'][$i]['soluong']);
                    $arr_new[$i]=$_arr;
                }
                $arr_new[$run]=array('id'=>$id,
                'name'=>$name,
                'gia'=>$gia,
                'soluong'=>$soluong);
                
        }else{
            $_arr=array('id'=>$id,
            'name'=>$name,
            'gia'=>$gia,
            'soluong'=>$soluong);
            $arr_new[0]=$_arr;
        }
        $_SESSION['json']=$arr_new; 
    }
?>
<?php
session_start();
    if (isset($_SESSION['json'])){
        $list_new=array();
        $vitri=0;
        for ($i=0;$i<count($_SESSION['json']);$i++){
            $bool=true;
            $quanity=0;
            if (count($list_new)>0){
                for ($k=0;$k<count($list_new);$k++){
                    if ($_SESSION['json'][$i]['id']==$list_new[$k]['id']){
                        $bool=false;
                    }
                }
            }
            if ($bool){
                for ($j=$i;$j<count($_SESSION['json']);$j++){
                    if ($_SESSION['json'][$i]['id']==$_SESSION['json'][$j]['id']){
                        $quanity=$quanity+1;
                    
                    }
                }
                
                $arr=array('id'=>$_SESSION['json'][$i]['id'],
                            'name'=>$_SESSION['json'][$i]['name'],
                            'gia'=>$_SESSION['json'][$i]['gia'],
                            'soluong'=>$quanity);
                $list_new[$vitri]=$arr;
                $vitri=$vitri+1;
            }
        }
        $b=json_encode($list_new);
        print_r($b);
    }else{
        echo "no";
    }
?>