<?php
include('includes/header.php');
?>

<?php
$search = $_POST['search'];
?>

<section class="search-box">
            <form action="search.php" method="POST" >
                <input type="search" name="search" placeholder="Search for your Food" required>
                <input type="submit" name="submit" value="search" class="search-btn">
            </form>
    </section>
    <!-- print out the result -->
    <h1>Results for <?php echo $search;?></h1><br>
    <!-- meun -->

<div class="grid-container">
<!--send to the menn part by clicking the side menu-->
  <div class="side-bar">
<ul>
<li><a href="side_appetizers.php">Appetizers</a></li>
  <li><a href="side_ramen.php">Ramen</a></li>
  <li><a href="side_sushi.php">Sushi</a></li>
  <li><a href="side_drinks.php">Drinks</a></li>
</ul>
</div>
  <div>

  <div class="sub-menu">
<?php
$sql="SELECT * FROM food WHERE product_name LIKE '%$search%' OR description LIKE '%$search%'";

$result= mysqli_query($conn,$sql);
            
  $count = mysqli_num_rows($result);
  if($count>0){
  //if more than 1 food in the database, then get the details
  while($rows=mysqli_fetch_assoc($result)){
  //get the data for each row
                $product_name=$rows['product_name'];
                $description=$rows['description'];
                $price=$rows['price'];
                $image_name=$rows['image_name'];
?>
<!--print data as a menu box-->
<form method="post" action="cart-adding.php?edit=add&id=<?php echo $food_id; ?>"> 
<div class="food-box">
    <div>
    <img src="img/<?php echo $image_name; ?>"
                 alt="search">
    </div>
    <input type="hidden" name="hidden_name" value="<?php echo $product_name; ?>" />  
    <input type="hidden" name="hidden_price" value="<?php echo $price; ?>" /> 
    <div class="product_name"><?php echo $product_name;?></div>
    <div class="description"><?php echo $description;?></div>
    <div class="price">$<?php echo $price;?></div>
    <input type="number" name="quantity" value="1" min="1" max="5" style="width:60px; padding:3px;"/><br>
    <input type="submit" class="add-to-cart" name="add_to_cart" value="Add to cart" />  
    </div>
    </form>

<?php
  }
}
?>
  </div>

  </div>
</div>


<?php include('includes/footer.php'); ?>