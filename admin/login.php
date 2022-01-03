<?php include'../classes/Adminlogin.php';?>
<?php 

   $al = new Adminlogin();
   
   if($_SERVER['REQUEST_METHOD'] == 'POST'){
   	  $adminUser = $_POST['adminUser'];
   	  $adminPass = md5($_POST['adminPass']);

   	  $loginChk = $al->adminLogin($adminUser,$adminPass);
   }

?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css" media="screen" />
</head>
<body>
<div class="user_sel_container">
	<section class="login_container" >
		<form action="login.php" method="post">
			<h1>Admin Login</h1>
            <span style="color:red;font-size:18px">
			<?php 
              if(isset($loginChk)){
              	echo $loginChk;
              }
			?>
		</span>
			<div>
				<input type="text" placeholder="Usuario"  name="adminUser"/>
			</div>
			<div>
				<input type="password" placeholder="Contrasena"  name="adminPass"/>
			</div>
			<div>
				<input type="submit" value="Iniciar Sesion" class="sucess_btn" />
			</div>
		</form>
	</section>
</div>
</body>
</html>