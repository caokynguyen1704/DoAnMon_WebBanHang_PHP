<?php
            session_start();
            
if (isset($_GET['idaddress'])){
    require 'pdo.php';
    $sql = 'SELECT * FROM address WHERE id = :id';
    $stmt_viewAddress1 = $pdo->prepare($sql);
    $stmt_viewAddress1->execute(array(':id' =>$_GET['idaddress']));
    $rows_viewAdress = $stmt_viewAddress1->fetchAll(PDO::FETCH_ASSOC);
    if ((count($rows_viewAdress)>0)){
        if ($rows_viewAdress[0]['idUser']==$_SESSION['user_id']){
        if (count($rows_viewAdress)==0){ echo "Bạn chưa có địa chỉ";}
        else{
                $address=array();
                for ($i=0;$i<count($rows_viewAdress);$i++){
                    $new=array("id"=>$rows_viewAdress[$i]['id'],
                                    "fullname"=>$rows_viewAdress[$i]['fullname'],
                                    "phone"=>$rows_viewAdress[$i]['phone'],
                                    "address"=>$rows_viewAdress[$i]['detail']."-".$rows_viewAdress[$i]['wards']."-".$rows_viewAdress[$i]['district']."-".$rows_viewAdress[$i]['city']);
                    $address[$i]=$new;
                }
                $b=json_encode($address);
                print_r($b);

        }
        }
    }
}
?>