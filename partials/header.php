<?php 
   
   include'models/Session.php';
   Session::init();

   include'models/Database.php';
   include'validation/Format.php';

   spl_autoload_register(function($class){
   		include_once"classes/".$class.".php";
   });

   $db   = new Database();
   $fm   = new Format();
   $pd   = new Product();
   $cat  = new Category();
   $ct   = new Cart();
   $cmr   = new Customer();
   
   
?>   

<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>


<!DOCTYPE HTML>
<head>
<title>Store Website</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Rubik:wght@300;400;700&display=swap" rel="stylesheet">
</head>
<body>
	<div class="app">
		<!-- navbar -->
		<div class="navbar">
			<a href="index.php" class="navbar_title">Snessa Tech</a>
			<div class="user_options">
				<a href="#" title="View my shopping cart" rel="nofollow">
							<span class="cart_title">Carrito</span>
							<span class="no_product">
							<?php 
							$getData = $ct->checkCart();
							if($getData){
								$sum = Session::get("sum");
								$qty = Session::get("qty");
								echo "$".$sum." | Qty: ".$qty;
							}else{
								echo "(vacio)";
							}
							?>
							</span>
						</a>
					<?php 

						if(isset($_GET['cmrid'])){
							$delcart = $ct->delCustomercart();
							$cmrId = Session::get("cmrId");
							$delcompare = $pd->delComparedata($cmrId);
							Session::destroy();
						}
					?> 
					<?php 
					$login = Session::get("cmrLogin");
					if($login == false){ ?>
							<a class="navbar_link login_link" href="login.php">Login</a>
					<?php } else{ ?>
							<a class=" navbar_link logout_link" href="?cmrid=<?php Session::get('cmrId')?>">Cerrar Sesion</a>
					<?php } ?>    
					<?php 
						$chkcart = $ct->checkCart();
						if($chkcart){  ?>
							<a href="cart.php">Cart</a>
							<!-- <a href="payment.php">Payment</a> -->
					<?php } ?>   
					<?php 
						$customerlogin = Session::get("cmrLogin");
						if($customerlogin == true){  ?>
							<a href="profile.php">Perfil</a>
					<?php } ?> 
					<?php 
						$cmrId = Session::get("cmrId");
						$chkorder = $ct->checkOrder($cmrId);
						if($chkorder){  ?>
							<a href="orderdetails.php">Mis ordenes</a>
					<?php } ?>
			</div>
		</div>
	</div>
		
