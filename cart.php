<?php include'partials/header.php';?>
<?php 

	if(isset($_GET['delpro'])){
    	$delid = $_GET['delpro'];

    	$delProduct = $ct->productdeleteByid($delid);
    }

?>

<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
   	
      $cartId = $_POST['cartId'];
      $quantity = $_POST['quantity'];
      $updatecart = $ct->updateCartquantuty($quantity, $cartId);

      if($quantity <= 0){
      	$delProduct = $ct->productdeleteByid($cartId);
      }
   }
?>

<?php 
  if(!isset($_GET['id'])){

  		echo"<meta http-equive='refresh' content='0;URL=?id=anythings'/>";
  }
?>
	<div  class="title_cart_container">
		<h2>Mi carrito</h2>
	</div>
	<?php 
		if(isset($updatecart)){
			echo $updatecart;
	}
	?>
	<div class="cart_container">
	<table class="table_products">
		<?php 
			$getCart = $ct->cartProduct();
			$sum = 0;
			$qty = 0;
			$i = 0;
			
			if($getCart){
				while($result = $getCart->fetch_assoc()){
                    $i++					
			?>
			<tbody>
			<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $result['productName'];?></td>
				<td><img src="admin/<?php echo $result['image'];?>" alt=""/></td>
				<td>$<?php echo $result['price'];?></td>
				<td>
					<form action="" method="post" class="add_more_qt">
						<input type="hidden" name="cartId" value="<?php echo $result['cartId'];?>"/>
						<input type="number" name="quantity" value="<?php echo $result['quantity'];?>"/>
						<input type="submit" name="submit" value="Update"/>
					</form>
				</td>
				<td>$<?php 
						$total = $result['price'] * $result['quantity'];
						echo $total;?>
				</td>
				<td>
					<a class="navbar_link link_alert" onclick="return confirm('are you sure to delete!')"href="?delpro=<?php echo $result['cartId'];?>">X</a>
				</td>
			</tr>
				</tbody>
				<?php 
					$qty = $qty + $result['quantity'];
					$sum = $sum + $total;
					Session::set("sum","$sum");
					Session::set("qty","$qty");
				?>		
		<?php }}?>
	</table>
	<?php 
		$getData = $ct->checkCart();
		if($getData){
	?>
	<table style="float:right;text-align:left;" width="40%">
		<tr>
			<th>Sub Total : </th>
				<td>$<?php echo $sum; ?></td>
			</tr>
			<tr>
				<th>Impuesto : </th>
				<td>IVA. 10%</td>
			</tr>
			<tr>
				<th>Total Final:</th>
				<td>$<?php 
                    	$vat = $sum * 0.1;
                        $grandtotal = $sum + $vat;
                        echo $grandtotal;
					?>
				</td>
			</tr>
	</table>
	<?php } else{
			echo "<span style='color:red; font-size:18px'>Cart Empty!</span>";
			header("Location:index.php");
					    }?>
	</div>

	<div class="cart_user_option">
		<a class="navbar_link link_secondary" href="index.php">Seguir comprando</a>
		<a class="navbar_link link_succes" href="payment.php">Pagar</a>
	</div>
	
