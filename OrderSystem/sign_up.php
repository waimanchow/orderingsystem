<?php
include('includes/header.php');
?>


<form action="" method="POST" enctype="multipart/form-data">
 <fieldset class="fields">
 <legend>Sign Up</legend>

  <label for="fname">First name:</label><br>
  <input type="text" name="fname" required><br><br>

  <label for="lname">Last name:</label><br>
  <input type="text" name="lname" required><br><br>

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
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    
    //insert data to database
    $sql = "INSERT INTO account SET 
    fname='$fname',
    lname='$lname',
    email='$email',
    password='$password'
";
    //save to table
    $res = mysqli_query($conn,$sql);

    if($res==true)
    {
        echo '<script>alert("Sign up Successfully! Please Login!")</script>';
    }
    else
    {
        echo '<script>alert("Sign up Fail! Please try again later!")</script>';
    }
}


?>

<?php include('includes/footer.php'); ?>