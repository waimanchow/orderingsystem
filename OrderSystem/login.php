<?php
include('includes/header.php');
?>


<form action="" method="POST" enctype="multipart/form-data">
 <fieldset class="fields">
  <legend>Login</legend>

  <label for="email">Email:</label><br>
  <input type="email" name="email" required><br><br>

  <label for="password">Password:</label><br>
  <input type="password" name="password" required><br><br>


  <input type="submit" name="submit" value="submit" class="btn"> 
 </fieldset>
</form>

<?php
if(isset($_POST['submit']))
{
    //getting information when the users clicked submit button
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM account WHERE email='$email' AND password='$password'";

    $res =mysqli_query($conn,$sql);

    //count if the user is existed or not
    $num=mysqli_num_rows($res);

    if($num==1){
    //user existed 
    $row=mysqli_fetch_assoc($res);
    $fname =$row['fname'];
    $id =$row['id'];
    $_SESSION['login'] = $fname; 
    $_SESSION['id'] = $id; 
    //redict to the home page 
    header("location:".SITE.'menu.php');
}
else{
    //Failed to login
    echo '<script>alert("Login Fail! Please check you password and email!")</script>';
}
}

?>

<?php include('includes/footer.php'); ?>

