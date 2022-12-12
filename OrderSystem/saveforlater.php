<?php
include('includes/header.php');
?>

<?php
//insert to save for later database
 if(isset($_POST["add_to_cart"]))  
 {  
      
          $id=$acc_id;
          $food_id=$_POST["hidden_id"];
 
          $sql4 = "DELETE FROM saveforlater WHERE id=$id AND food_id=$food_id";
          $res4 = mysqli_query($conn,$sql4); 
 } 
 
?>

<?php
//insert to save for later database
 if(isset($_POST["remove"]))  
 {  
      
          $id=$acc_id;
          $food_id=$_POST["hidden_id"];
 
          $sql4 = "DELETE FROM saveforlater WHERE id=$id AND food_id=$food_id";
          $res4 = mysqli_query($conn,$sql4); 
      
 }  
 
?>

<h1 >Saved for later</h1> 

<div class="sub-menu">       
<?php
$sql="SELECT * FROM saveforlater WHERE id=$acc_id";

$result= mysqli_query($conn,$sql);
            
  $count = mysqli_num_rows($result);
  if($count>0){
  //if more than 1 food in the database, then get the details
  while($rows=mysqli_fetch_assoc($result)){
  //get the data for each row
                $food_id=$rows['food_id'];
           
                $sql2="SELECT * FROM food WHERE food_id=$food_id";
                
                $result2= mysqli_query($conn,$sql2);
                            
                  $count2 = mysqli_num_rows($result2);
                  if($count2>0){
                  //if more than 1 food in the database, then get the details
                  while($rows2=mysqli_fetch_assoc($result2)){
                  //get the data for each row
                  $food_id=$rows2['food_id'];
                  $product_name=$rows2['product_name'];
                  $description=$rows2['description'];
                  $price=$rows2['price'];
                  $image_name=$rows2['image_name'];
                
                            
                ?>
<!--dispaying all the food from save for later database-->
<form method="post" action=""> 
<div class="food-box">
    <div>
    <img src="img/<?php echo $image_name; ?>"
                 alt="Drinks">
    </div>
    <input type="hidden" name="hidden_id" value="<?php echo $food_id; ?>" /> 
    <input type="hidden" name="hidden_name" value="<?php echo $product_name; ?>" />  
    <input type="hidden" name="hidden_price" value="<?php echo $price; ?>" /> 
    <div class="product_name"><?php echo $product_name;?></div>
    <div class="description"><?php echo $description;?></div>
    <div class="price">$<?php echo $price;?></div>
    <input type="number" name="quantity" value="1" min="1" max="5" style="width:60px; padding:3px; text-align: center;"/><br>
    <input type="submit" class="add-to-cart" name="add_to_cart" value="Add to cart" />  
    <input type="submit" class="add-to-cart" name="remove" value="Remove" /> 
    </div>
    </form>

                <?php
                  }
                }            
           
?>
<?php
  }
}
?>

</div>

    <button class="checkout-button" onclick="window.location.href='menu.php';">
      Continue Shopping
    </button><br>


<?php include('includes/footer.php'); ?>





