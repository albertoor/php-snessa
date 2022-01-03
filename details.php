<?php include'partials/header.php';?>

<?php 

   if(!isset($_GET['proid']) || $_GET['proid'] == NULL){
     echo "<script>window.location = '404.php'; </script>";
   }else{
     $id = $_GET['proid'];
   } 
  
  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
   	
      $quantity = $_POST['quantity'];
      $addCart = $ct->addTocart($quantity, $id);
   }
   
?>



<?php 

   //this is for compare products

   $cmrId = Session::get('cmrId');
   if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['compare'])){
   	
      $productId = $_POST['productId'];
      $insertComparepro = $pd->insertCompareproducts($productId,$cmrId);
   }

?>

<?php 

   //this is for wishlist products

   $cmrId = Session::get('cmrId');
   if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['wlist'])){
   	
      $productId = $_POST['productId'];
      $insertWishlistpro = $pd->insertWishlistproducts($productId,$cmrId);
   }

?>

<?php 
    $singlePro = $pd->getSinglePro($id);
    
	if($singlePro){
		echo '<div class="products_list_container">';
    		while($result = $singlePro->fetch_assoc()){

    	?>
			<div class="product_card">
				<img src="admin/<?php echo $result['image'];?>" alt="" />
				<h2><?php echo $result['productName'];?></h2>						
				<p>Precio: <span>$<?php echo $result['price'];?></span></p>
				<p>Categoria: <span><?php echo $result['catName'];?></span></p>
				<p>Empresa:<span><?php echo $result['brandName'];?></span></p>
				<p>Descripcion: </p>
				<?php echo $result['body'];?>
				<form action="" method="post">
					<input type="number" class="buyfield" name="quantity" value="1"/>
					<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
				</form>	
			</div>
					
			<span style="color:red; font-size:18px">
				<?php 
					if(isset($addCart)){
						echo $addCart;
					}
						?>
					</span>	

			    <?php 
					if(isset($insertComparepro)){
						echo $insertComparepro;
					}
				?>	

				<?php 
					if(isset($insertWishlistpro)){
						echo $insertWishlistpro;
					}
				?>		

				<?php 
					$login = Session::get("cmrLogin");
					if($login == true){
				?>
				<?php } ?>	

				


			</div>
				
	      </div>

	      <?php } } ?>
			