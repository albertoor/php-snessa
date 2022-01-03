<?php 
   
   include'../models/Session.php';
   Session::checkSession();
?>   

<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link href="css/styles.css" rel="stylesheet" type="text/css" media="all"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Rubik:wght@300;400;700&display=swap" rel="stylesheet">
    
    <title>Admin</title>
    
</head>
<body> 
    
    <div class="app">
    <nav class="navbar">              
        <?php 
            if(isset($_GET['action']) && $_GET['action'] == 'logout'){
                Session::destroy();
            }
        ?>
        <div>
        <a href="./dashboard.php">Snessa Tech</a>
        <a class="navbar_link link_succes" href="productlist.php">Listar Productos</a>
        <a class="navbar_link link_secondary" href="productadd.php">Agregar Producto</a>
        </div>
        <div>
            <a>Hola de nuevo -> <?php echo Session::get('adminName'); ?></a>
            <a class="navbar_link link_alert" href="?action=logout">Cerrar Sesion</a>
        </div>
    </nav>
    </div>
        
