<?php 
    //if (isset($_GET['city'])){
        require "pdo.php";
        $sql = 'SELECT * FROM devvn_xaphuongthitran WHERE maqh=:id';
        $stmt_ADDRESS = $pdo1->prepare($sql);
        $stmt_ADDRESS->execute(array(':id' =>$_GET['district']));
        $rows_ADDRESS = $stmt_ADDRESS->fetchAll(PDO::FETCH_ASSOC);
        if (count($rows_ADDRESS)==0){
            echo "Error";
        }else{
            $city=array();
            for ($i=0;$i<count($rows_ADDRESS);$i++){
                $new_city=array("id"=>$rows_ADDRESS[$i]['xaid'],
                                "name"=>$rows_ADDRESS[$i]['name']);
                $city[$i]=$new_city;
            }
            $b=json_encode($city);
            print_r($b);
       // }
    }
?>