<?php
include('includes/linkdatabase.php');
?>

<?php

//save the first name to display after logged in
if(isset($_SESSION['login']))
{
  $fname =$_SESSION['login'];
}
?>

<?php
//save the user id for later use
if(isset($_SESSION['id']))
{
  $acc_id =$_SESSION['id'];
}
?>

<?php
//delete the items in the shoppinf cart if the users click delete
 if(isset($_GET["edit"]))  
 {  
      if($_GET["edit"] == "delete")  
      {  
           foreach($_SESSION["incart"] as $keys => $values)  
           {  
                if($values["id"] == $_GET["id"])  
                {  
              
                    $_SESSION["cart_count"]=$_SESSION["cart_count"]-$values["qty"];
                     unset($_SESSION["incart"][$keys]);  
                     echo '<script>alert("Removed for your cart")</script>';  
                }  
           }  
      }  
 }  
 
?>

<?php
//if the users clicl aat to cart button in the menu pages
if(isset($_POST["add_to_cart"]))  
 {  

     if(!$acc_id){
          echo '<script>alert("Your are not a member. Please Login or Create an account")</script>';  
          echo '<script>window.location="login.php"</script>';  
     }
     else{

     //chechk if the item already in the cart
      if(!empty($_SESSION["incart"]))  
      {  
           if(in_array($_POST["hidden_id"], array_column($_SESSION["incart"], "id")))  
           {  
               echo '<script>alert("Item Already Added")</script>';  
               echo '<script>window.location="menu.php"</script>';  
               
           }  
           else  
           {  
               //store items in the an array
               //id =$food id
             
               $count = $_SESSION["count"]++;  
               $item_array = array(  
                    'id'               =>     $_POST["hidden_id"],  
                    'name'             =>     $_POST["hidden_name"],  
                    'price'            =>     $_POST["hidden_price"],  
                    'qty'              =>     $_POST["quantity"]            
               );  
               $_SESSION["incart"][$count] = $item_array;  
               $_SESSION["cart_count"]=$_POST["quantity"]+$_SESSION["cart_count"];
               
               
            
           }  
      }  
      else  
      {  
          //add the first item to the shopping cart
           $item_array = array(  
               'id'               =>     $_POST["hidden_id"],  
               'name'             =>     $_POST["hidden_name"],  
               'price'            =>     $_POST["hidden_price"],  
               'qty'              =>     $_POST["quantity"]  
           );  
           $_SESSION["incart"][0] = $item_array;  
           $_SESSION["cart_count"]=$_POST["quantity"]+$_SESSION["cart_count"];
      }  
 } 
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Food Ordering</title>
<link rel="stylesheet" href="style/cart_style.css">
<link rel="stylesheet" href="style/gallery.css">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
  <!--menu bar-->
  <nav class="navbar navbar-inverse" style="background-color:#57493d;font-size:20px;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" style="font-size:20px;" href="#">Welcome <?php echo $fname; ?></a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="menu.php">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Order<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="history.php">Order History</a></li>
          <li><a href="saveforlater.php">Saved for Later</a></li>
        </ul>
      </li>
      <li><a href="cart-adding.php">Shopping Cart |<?php echo $_SESSION["cart_count"];?>|</a></li>
      
    </ul>
    <ul class="nav navbar-nav navbar-right">


      <?php if (!$_SESSION['login']) { ?>


      <li><a href="sign_up.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>

      <?php }
//display fname and change the login button in the top menu bar
else { ?>
     <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
   
<?php } ?>

    </ul>
  </div>
</nav>
  


