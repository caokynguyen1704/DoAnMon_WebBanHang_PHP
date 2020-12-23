<?php
    $pdo = new PDO('mysql:host=fdb27.freehostingeu.com;port=3306;dbname=3692719_shop','3692719_shop', 'caoky99#'); 
    $pdo->exec("set names utf8");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pdo1 = $pdo;
    $pdo1->exec("set names utf8");
    $pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>