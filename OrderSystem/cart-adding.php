<?php
include('includes/header.php');
?>


<?php
//if the user click "save for later", insert to food items save for later database
 if(isset($_GET["save"]))  
 {  
      if($_GET["save"] == "save")  
      {  
          $id=$acc_id;
          $food_id=$_GET["id"];
 
          $sql4 = "INSERT INTO saveforlater SET 
          
          id=$id,
          food_id=$food_id
          ";
          
          $res4 = mysqli_query($conn,$sql4); 
      }  
 }  
 
?>

<h1 class="shoppingcart">Shopping Cart</h1> 
                <div class="cart">  
    
                          <?php   
                          //check if item already in the cart 
                          if(!empty($_SESSION["incart"]))  
                          {  
                              //foreach loop to show items details
                               $total = 0;  
                               foreach($_SESSION["incart"] as $keys => $values)  
                               {  
                          ?>  
                           <div class="cart-item">  
                           <div class="cart-name" style="font-style: italic;"><?php echo $values["name"]; ?></div>
                           <div class="cart-qty" style="font-style: italic;">Quantity: <?php echo $values["qty"]; ?></div>
                           <div class="cart-price">$ <?php echo number_format($values["qty"] * $values["price"], 2 ,".",","); ?></div><br>
                           <div><a class="delete" href="cart-adding.php?save=save&edit=delete&id=<?php echo $values["id"]; ?>">Save for later</a>
                           <a class="delete" href="cart-adding.php?edit=delete&id=<?php echo $values["id"]; ?>">Remove</a></div>  
                           </div> 
                          <?php  
                                    $total = $total + ($values["qty"] * $values["price"]);  
                               }  
                          ?>  
                          
                              <br><div  class="total">Total:$ <?php echo number_format($total, 2,".",","); ?></div>  
                             
                               
                           
                          <?php  
                          }  
                          ?>  
                     
                </div><br>

     <button class="checkout-button" onclick="window.location.href='menu.php';">
      Continue Shopping
    </button><br>
<!--a hidden form will be display for entering payment info-->
    <button class="checkout-button" onclick="paymentform()">Check Out</button>

<div class="form-hidden" id="displayForm">
  <form action="" class="checkout-form" method="POST" enctype="multipart/form-data">
    <h1>Payment</h1>

    <label>Card Name*</label>
    <input type="text" name="pname" placeholder="First Name , Last Name"><br>
    <label>Card number</label>
    <input required type="text" name="cardNumber" pattern="/^([0-9]{4}( |\-)){3}[0-4]{4}$/" placeholder="xxxx xxxx xxxx xxxx"/><br>
    <label>Expiration Date</label>
    <select name="expMonth">
       <option value="mm">mm</option>
       <option value="01">01</option>
       <option value="01">02</option>
       <option value="01">03</option>
       <option value="01">04</option>
       <option value="01">05</option>
       <option value="01">06</option>
       <option value="01">07</option>
       <option value="01">08</option>
       <option value="01">09</option>
       <option value="01">10</option>
       <option value="01">11</option>
       <option value="01">12</option>
    </select>
    <span> / </span>
    <select name="expYear">
       <option value="yy">yy</option>
       <option value="2020">2020</option>
       <option value="2021">2021</option>
       <option value="2022">2022</option>
       <option value="2023">2023</option>
       <option value="2024">2024</option>
    </select><br><br>     
    <label>***CVC***</label>
    <input type="text" name="cvc" required pattern="^\d{3,4}$"/><br>


    <input type="submit" name="submit" value="Check Out" class="btn">
    <button type="button" class="btn back" onclick="closeForm()">Back to Shopping Cart</button>
  </form>
</div>
 
<script>
function paymentform() {
  document.getElementById("displayForm").style.display = "block";
}

function closeForm() {
  document.getElementById("displayForm").style.display = "none";
}
</script>


<?php
if(isset($_POST["submit"]))
{
//create invoice when check out if the user click submit
     $sql = "INSERT INTO invoice SET 
     total='$total',
     date=curdate(),
     time=now(),
     id=$acc_id
     ";
     
     $res = mysqli_query($conn,$sql); 
//link invoice and the items list

     $sql1="SELECT * FROM invoice WHERE id=$acc_id AND time=now()";

     $result= mysqli_query($conn,$sql1);
                 
       $count = mysqli_num_rows($result);
       if($count>0){

       while($rows=mysqli_fetch_assoc($result)){

                     $invoice_id=$rows['invoice_id'];    
       }
     }


     //insert all items detail to the cart database for future order history use
          foreach($_SESSION["incart"] as $keys => $values)  
          {  
               $food_id = $values["id"];
               $food_name = $values["name"];
               $qty = $values["qty"];  
               

               $sql2 = "INSERT INTO cart SET 
               food_id='$food_id',
               food_name='$food_name',
               qty=$qty,
               id=$acc_id,
               invoice_id=$invoice_id
               ";
               
               $res2 = mysqli_query($conn,$sql2); 
          }  

//insert to payment (credit card)
$pname=$_POST['pname'];
$cardNumber=$_POST['cardNumber'];
$expmth=$_POST['expMonth'];
$expyear=$_POST['expYear'];
$cvc=$_POST['cvc'];

$sql3 = "INSERT INTO payment SET 

cardname='$pname',
cardnum=$cardNumber,
expmth=$expmth,
expyear=$expyear,
cvc=$cvc,
id=$acc_id,
invoice_id=$invoice_id
";

$res3 = mysqli_query($conn,$sql3); 


          //pop up the invoice number
          echo '<script>alert("Check Out Successfully! Your invoice number is '.$invoice_id.'")</script>';
          unset($_SESSION["incart"]);   
          unset($_SESSION["cart_count"]); 
          echo '<script>window.location="menu.php"</script>';  

     }

?>
    

<?php include('includes/footer.php'); ?>





