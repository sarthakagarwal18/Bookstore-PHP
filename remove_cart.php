<?php

require_once 'connect.php';
require_once 'utilities.php';

$var_id=$_GET['id'];
$u_id=$_SESSION['user_id'];
$query = "UPDATE `cart` SET `quantity`=`quantity`-1 WHERE `book_id`='$var_id' AND `user_id`='$u_id";
$query_run=mysqli_query($con,$query);

$query = "SELECT `quantity` FROM `cart` where `book_id`='$var_id' AND `user_id`='$u_id'";
$query_run=mysqli_query($con,$query);
$quant = mysqli_result($query_run,0,'quantity');

if($quant==0)
{
	$query = "DELETE FROM `cart` WHERE `book_id`='$var_id' AND `user_id`='$u_id'";
	$query_run=mysqli_query($con,$query);
}

header('Location: cart.php');
die;

?>