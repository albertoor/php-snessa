<?php include'partials/header.php';?>
<?php 
  $login = Session::get("cmrLogin");
  if($login == true){
  		header("Location:order.php");
  }
?>

<?php 

if( $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['registration']) ){
      
      $cmrRegistration = $cmr ->customerRegistration($_POST);
   }

?>
<?php 
  
  if( $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cmrlogin']) ){
      
      $cmrlogin = $cmr ->customerLogin($_POST);
   }
?>

 <div class="user_sel_container">
    <div class="content">
    	 <div class="login_container">
        	<h3>Para usuarios registardos</h3>
        	<?php 
    			if(isset($cmrlogin)){
    				echo $cmrlogin;
    			}
    		?>
        	<form action="" method="post">
                	<input name="email" type="text" class="field" placeholder="Correo">
                    <input name="password" placeholder="Contrasena" type="password">
                    <div class="buttons"><div><button name="cmrlogin" class="sucess_btn">Iniciar Sesion</button></div></div>
             </form>        
                    </div>
    	<div class="login_container">
    		<?php 
    			if(isset($cmrRegistration)){
    				echo $cmrRegistration;
    			}
    		?>
    		<h3>Registrarme</h3>
    		<form action="" method="post">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name="name" placeholder="Nombre">
							</div>
							
							<div>
							   <input type="text" name="city" placeholder="Ciudad">
							</div>
							
							<div>
								<input type="text" name="zip" placeholder="Codigo postal">
							</div>
							<div>
								<input type="text" name="email" placeholder="Correo">
							</div>
		    			 </td>
		    			<td>
						<div>
							<input type="text" name="address" placeholder="Direccion">
						</div>
		    		<div>
		    			<input type="text" name="country" placeholder="Ciudad">
						
				    </div>		        
	
		           <div>
		              <input type="text" name="phone" placeholder="Telefono">
		          </div>
				  
				  <div>
					<input type="text" name="password" placeholder="Contrasena">
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div ><button name="registration" class="sucess_btn">Registrarme</button></div></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
</div>


