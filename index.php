<?php include'partials/header.php';?>

<?php 
	$getFpd = $pd->indexFpro();
	if($getFpd){

		echo '<div class="products_list_container">';
		
	    while($result = $getFpd->fetch_assoc()){

	?>		

		<div class="product_card">
			<a href="details.php?proid=<?php echo $result['productId']; ?>"><img src="admin/<?php echo $result['image']; ?>" alt="" /></a>
			<h2><?php echo $result['productName'];?></h2>
			<p><?php echo $fm->textShorten($result['body'],60);?></p>
			<p>
				<span class="price">$<?php echo $result['price'];?></span>
			</p>
			<a href="details.php?proid=<?php echo $result['productId']; ?>" class="navbar_link details_link">Ver mas</a>
		</div>
<?php } 
echo '</div>';
}


?>





