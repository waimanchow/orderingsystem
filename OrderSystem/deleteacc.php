<?php
include('includes/header.php');
?>
<!--the form for delete the account-->

<form action="" method="POST" enctype="multipart/form-data">
 <fieldset class="fields">
  <legend>Delete Account</legend>

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

    $sql = "DELETE FROM account WHERE email='$email' AND password='$password'";

    $res =mysqli_query($conn,$sql);

    if($res){

   //logout and deleted account    
session_destroy();
echo '<script>alert("You account was removed!")</script>';
header( "refresh:1; url=login.php" );


}
else{
    //Failed to enter password or email
    echo '<script>alert("Delete Fail! Please check you password and email!")</script>';
}
}

?>

<?php include('includes/footer.php'); ?>
