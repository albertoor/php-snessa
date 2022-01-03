<?php include'partials/header.php';?>

<?php 
  
  if(isset($_GET['customerId'])){

    $id    = $_GET['customerId'];
    $date  = $_GET['date'];
    $price = $_GET['price'];

    $updateshiftedpro = $ct->updateproductShifted($id,$date,$price);
  }

?>

 <div class="order_container">
    <div>
    	<div>	
    	     <h2>Tus ordenes</h2> 
           <table>
              <tr>
                <th>Id</th>
                <th>Nombre producto</th>
                <th>Imagne</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Acccion</th>
              </tr>
             

               <?php 
                    $cmrId = Session::get('cmrId');

                    $getOrder = $ct->getOrderProduct($cmrId);
                    
                    $i = 0; 
                    if($getOrder){
                     while($result = $getOrder->fetch_assoc()){
                                    
                      $i++

                    
                 ?>
              <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $result['productName'];?></td>
                <td><img src="admin/<?php echo $result['image'];?>" alt=""/></td>
                
                <td><?php echo $result['quantity'];?></td>
                
                <td>$<?php 
                  $total = $result['price'] * $result['quantity'];
                    echo $total;?></td>
                <td><?php echo $fm->formatDate($result['date']);?></td>  
                 <td>
                    <?php 
                         if($result['status'] == '0'){
                            echo "Pending";
                          }
                          elseif($result['status'] == '1'){
                            echo"Shifted";
                           }
                          else { 
                              echo "OK";
                            }
                      ?>
                </td>
                <?php 
                    if($result['status'] == '1'){?>

                      <td> <a href="?customerId=<?php echo $cmrId;?>&price=<?php echo $result['price'];?> &date=<?php echo $result['date'];?>">Confirm</a></td>

                    <?php } elseif($result['status'] == '2') {?>
                        <td>OK</td>
                    <?php } elseif($result['status'] == '0') {  ?>
                        <td>N/A</td>
                    <?php } ?>
              </tr>              
              <?php } } ?>
            </table>
      </div>   
    </div>
 </div>
