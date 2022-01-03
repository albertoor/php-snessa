<?php include'partials/header.php';?>
 <div class="user_container">
    <div>
    	
    	<div>	
    	   <?php 
    	    $id = Session::get('cmrId');
    	   	 $getCustomer = $cmr->customerData($id);
    	   	 if($getCustomer){
    	   	 	while($result = $getCustomer->fetch_assoc()){
    	   ?>	
			
			<table class="tblone">
				<tr>
					<td width="20%">Name</td>
					<td width="5%">:</td>
					<td><?php echo $result['name'];?></td>
				</tr>
				<tr>
					<td>Telefono</td>
					<td>:</td>
					<td><?php echo $result['phone'];?></td>
				</tr>
				<tr>
					<td>Correo</td>
					<td>:</td>
					<td><?php echo $result['email'];?></td>
				</tr>
				<tr>
					<td>Direccion</td>
					<td>:</td>
					<td><?php echo $result['address'];?></td>
				</tr>
				<tr>
					<td>Ciudad</td>
					<td>:</td>
					<td><?php echo $result['city'];?></td>
				</tr>
				<tr>
					<td>Pais</td>
					<td>:</td>
					<td><?php echo $result['country'];?></td>
				</tr>
				<tr>
					<td>Codigo Postal</td>
					<td>:</td>
					<td><?php echo $result['zip'];?></td>
				</tr>

				<tr>
					<td></td>
					<td></td>
					<td><a href="editcustomer.php">Editar mis datos</a></td>
				</tr>
				
				
			</table>

			<?php }} ?>
					
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
</div>


