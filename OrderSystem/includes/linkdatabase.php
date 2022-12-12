<?php
//session start
session_start();

define('SITE','http://localhost/OrderSystem/');
define('LOCALHOST','localhost');
define('USERNAME','root');
define('PASSWORD','');
define('NAME','online_order');
   
$conn =mysqli_connect(LOCALHOST, USERNAME, PASSWORD)  or die(mysqli_error());
$db_select =mysqli_select_db($conn, NAME) or die(mysqli_error());
?>