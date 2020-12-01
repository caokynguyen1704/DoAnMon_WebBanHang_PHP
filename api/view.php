<?php 
        session_start();
        $b=json_encode($_SESSION['json']);
        print_r($b);
        if (isset($_GET['del']))
   {
        unset($_SESSION['json']);
            session_destroy();
   }
?>