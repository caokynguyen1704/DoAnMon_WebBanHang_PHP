<?php ob_start(); session_start();  ?>
<!DOCTYPE html>
<html>
<head>
    <script src="js/jquery-3.5.1.min.js"></script>
    <meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0"/>
	<title>Shoping</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/StyleForPC.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/style1.css">
    <link  rel="stylesheet" href="css/swiper.min.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>
<?php include 'api/nav.php'; ?>
<?php 
if (!(isset($_GET['product']))){
if (!(isset($_GET['search']))){
    include 'api/newproduct.php';
    echo '<br>';
    include 'api/navcategory.php';
}
else{
    require 'api/search.php';
}}
else{
    require 'api/product.php';
}
?>
</body>
</html>
<?php ob_flush(); ?>