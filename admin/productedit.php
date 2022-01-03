<?php include 'inc/header.php';?>

<?php include'../classes/Category.php';?>

<?php include'../classes/Brand.php';?>

<?php 
   include'../classes/Product.php';
   $pd = new Product();

   if(!isset($_GET['proid']) || $_GET['proid'] == NULL){
     echo "<script>window.location = 'productlist.php';</script>";
   }else{
     $id = $_GET['proid'];
   } 
   
   if( $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) ){
      
      $updateProduct = $pd->updateProduct($_POST, $_FILES, $id);
   }

?>


<div class="add_product_admin">
    <div>
        <h2>Actualizar Producto</h2>
        <div> 

        <?php 
            if(isset($updateProduct)){
                echo $updateProduct;
            }
        ?>
        
        <?php 

            $getPro = $pd->editProduct($id);

            if($getPro){
                while($value = $getPro->fetch_assoc()){

         ?>

         <form action="" method="post" enctype="multipart/form-data">
            <table >
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="productName" value="<?php echo $value['productName'];?>" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="catId">
                            <option>Select Category</option>

                            <?php 
                                $cat = new Category();

                                $getCat = $cat->catShow();
                                if($getCat){

                                    while($result = $getCat->fetch_assoc()){

                                 ?>

                            <option 

                             <?php if($value['catId'] == $result['catId']){ ?>
                                selected = 'selected'; <?php }  ?>
                                value="<?php echo $result['catId'];?>"><?php echo $result['catName'];?>
                                  
                            </option>

                            <?php } } ?>
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Brand</label>
                    </td>
                    <td>
                        <select id="select" name="brandId">
                            <option>Select Brand</option>
                            <?php 

                                $brand = new Brand();

                                $getBrand = $brand->brandShow();
                                if($getBrand){

                                    while($result = $getBrand->fetch_assoc()){

                             ?>

                                 <option
                                  <?php if($value['brandId'] == $result['brandId']){?> selected = "selected" <?php } ?>
                                   value="<?php echo $result['brandId'];?>"><?php echo $result['brandName'];?></option>
                            <?php } } ?>
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea name="body" >                   <?php echo $value['body'];?>
                        </textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" name="price" value="<?php echo $value['price'];?>"  />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <img src="<?php echo $value['image'];?>" height="80px" width="200px">
                        <input type="file" name="image">
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>Select Type</option>
                            <?php if($value['type'] == 0 ){ ?>
                                  <option selected='selected' value="0">Destacado</option>
                                  <option value="1">General</option>
                                <?php } else{ ?>
                               
                                  <option  value="0">Destacado</option>
                                  <option selected='selected' value="1">General</option>
                            <?php  } ?>
                           
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" />
                    </td>
                </tr>
            </table>
        </form>

        <?php } } ?>
        </div>
    </div>
</div>


