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
            $sotien=$sotien+$_SESSION['json'][$i]['gia'];
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
                            'soluong'=>$quanity,
                        'image'=>$_SESSION['json'][$i]['image']);
                $list_new[$vitri]=$arr;
                $vitri=$vitri+1;
            }
        }
            echo '
                <div class="row">
                    <div  class="col-sm"  style=" width:100%; height:100%;overflow: scroll; overflow-x: hidden;">';
                    foreach ($list_new as $ro){
                    echo '
                        <div  style="background-color: white; width:100%; height:100px">
                            <img style="float: left;" src="'.$ro['image'].'" width="100px" height="100px"/>    
                            <center><b>'.$ro['name'].'</b></center>
                            <p>x'.$ro['soluong'].'</p>
                            <b>'.change1($ro['gia']).' VNĐ</b>
                        </div> ';
                    }
                    echo '
                    </div>
                    <div class="col-sm">
                        ';
echo "<b>TỔNG: ".($sotien)." VNĐ</b>";
                        echo '
                    </div> 
                </div>
            ';
        
    }else{
        echo "Chưa có mặt hàng";
    }
   
?>
