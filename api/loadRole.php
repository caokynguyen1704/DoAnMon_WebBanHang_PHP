<?php
    if (isset($_SESSION['user_id'])){
        require "pdo.php";
           
                $sql="select * from users where id= :id";
                $stmt=$pdo->prepare($sql);
                $stmt->execute(array(
                    ':id'=>$_SESSION['user_id']
                ));
                $rows=$stmt->fetchAll();
                if(count($rows)==1){
                    $_SESSION['role']=$rows[0]['role'];
                }
    }
?>