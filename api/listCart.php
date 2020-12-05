<?php
session_start();
    if (isset($_SESSION['json'])){
        $list_new=array();
        $vitri=0;
        for ($i=0;$i<count($_SESSION['json']);$i++){
            $bool=true;
            $quanity=0;
            if (($_SESSION['json'][$i]['id']==-1))
            {$bool=false;}
            if (count($list_new)>0){
                for ($k=0;$k<count($list_new);$k++){
                    if (($_SESSION['json'][$i]['id']==$list_new[$k]['id'])||($_SESSION['json'][$i]['id']==-1)){
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
                            'image'=>$_SESSION['json'][$i]['image'],
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