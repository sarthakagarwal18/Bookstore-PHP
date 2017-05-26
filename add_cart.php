<?php

require_once 'connect.php';
require_once 'utilities.php';

$var_id=$_GET['id'];
$u_id=$_SESSION['user_id'];
$query = "SELECT `stock` FROM `book` where `book_id`='$var_id'";
$query_run=mysqli_query($con,$query);
$stock = mysqli_result($query_run,0,'stock');
if($stock==0)
{
	header('Location: index.php');
	die;
}
else
{
	$query = "SELECT `quantity` FROM `cart` where `book_id`='$var_id' AND `user_id`='$u_id'";
	$query_run=mysqli_query($con,$query);
	$q = mysqli_num_rows($query_run);
	if($q==0)
	{
		$query =  "INSERT INTO `cart` VALUES ('$u_id','$var_id',1)";
	}
	else
	{
		$query = "UPDATE `cart` SET `quantity`=`quantity`+1 WHERE `book_id`='$var_id' AND `user_id`='$u_id'";
	}
	$query_run=mysqli_query($con,$query);
	header('Location: cart.php');
	die;
}

?>