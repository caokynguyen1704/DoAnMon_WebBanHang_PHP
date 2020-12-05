<?php
    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=shop','root', ''); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pdo1 = new PDO('mysql:host=localhost;port=3306;dbname=dvhc','root', ''); 
    $pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>