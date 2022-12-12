<?php
include('includes/linkdatabase.php');
?>

<?php
session_destroy();
echo '<script>alert("You are Logged Out!")</script>';
header( "refresh:1; url=menu.php" );
?>
