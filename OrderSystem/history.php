<?php
include('includes/header.php');
?>
<link rel="stylesheet" href="style/history_style.css">
<h1>Previous Order</h1> 

<?php
//get the date, time, and total of the pervious order
$sql="SELECT * FROM invoice WHERE id=$acc_id";

$result= mysqli_query($conn,$sql);
            
  $count = mysqli_num_rows($result);
  if($count>0){
//get the data if there is at least one order
  while($rows=mysqli_fetch_assoc($result)){

                $date=$rows['date'];
                $time=$rows['time'];
                $total=$rows['total'];
                $invoice_id=$rows['invoice_id'];
  
?>

<!--printing all the data -->
<button class="section">
    
<span class="date">Order Date: <?php echo $date;?></span>
    <span class="date">-<?php echo $time;?></span>
    <div class="total">Total: $<?php echo $total;?></div>

</button>

<div class="content">
<div class="fooditem-title">Food items & Quality</div>
<?php
$sql2="SELECT * FROM cart WHERE invoice_id=$invoice_id ";

$result2= mysqli_query($conn,$sql2);
            
  $count2 = mysqli_num_rows($result2);
  if($count2>0){

  while($rows2=mysqli_fetch_assoc($result2)){

                $food_name=$rows2['food_name'];
                $qty=$rows2['qty'];

?>

<span class="fooditem"><span><?php echo $food_name;?></span>--------------<span><?php echo $qty;?></span></span><br>


<?php
  }
}
?>
</div>

</div>
<?php
  }
}
else{
    ?>
    <div class="fooditem"><?php echo 'You do not have previous order'?></div>
    <?php
}
?>
  </div>

  </div>
</div>
<!--a javascript for display more food details(food name and qty) when the user click the button-->
<script>
var sec = document.getElementsByClassName("section");
var i;

for (i = 0; i < sec.length; i++) {
  sec[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}
</script>

<?php include('includes/footer.php'); ?>
