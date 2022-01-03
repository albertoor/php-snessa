<?php include 'inc/header.php';?>
<?php include'../classes/Category.php';?>

<?php include'../classes/Brand.php';?>

<?php 
   
   include'../classes/Product.php';
   $pd = new Product();
   
   if( $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) ){
      
      $insertProduct = $pd->createProduct( $_POST, $_FILES );
   }

?>

<div class="add_product_admin">
    <div >
        <h2>Agregar un producto nuevo</h2>
        <div > 

        <?php 
            if(isset($insertProduct)){
                echo $insertProduct;
            }
        ?>


         <form action="" method="post" enctype="multipart/form-data">
            <table >
               
                <tr>
                    <td>
                        <label>Nombre</label>
                    </td>
                    <td>
                        <input type="text" name="productName" placeholder="Ingresa el nombre del producto..."  />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Categoria</label>
                    </td>
                    <td>
                        <select id="select" name="catId">
                            <option>Selecciona la categoria</option>

                            <?php 
                                $cat = new Category();

                                $getCat = $cat->catShow();
                                if($getCat){

                                    while($result = $getCat->fetch_assoc()){

                                 ?>

                            <option value="<?php echo $result['catId'];?>"><?php echo $result['catName'];?></option>
                            <?php } } ?>
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Marca</label>
                    </td>
                    <td>
                        <select id="select" name="brandId">
                            <option>Selecciona Marca</option>
                            <?php 

                                $brand = new Brand();

                                $getBrand = $brand->brandShow();
                                if($getBrand){

                                    while($result = $getBrand->fetch_assoc()){

                             ?>

                                 <option value="<?php echo $result['brandId'];?>"><?php echo $result['brandName'];?></option>
                            <?php } } ?>
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Descripcion</label>
                    </td>
                    <td>
                        <textarea name="body"></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Precio</label>
                    </td>
                    <td>
                        <input type="text" name="price" placeholder="Ingresa precio.."  />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Sube Imagen</label>
                    </td>
                    <td>
                        <input type="file" name="image" />
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Tipo de Producto</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>Select Type</option>
                            <option value="0">Destacado</option>
                            <option value="1">General</option>
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
        </div>
    </div>
</div>



