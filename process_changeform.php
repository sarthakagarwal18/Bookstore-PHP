<?php

require_once 'connect.php';
require_once 'utilities.php';

$var_id=$_GET['id'];
$flag=0;

if(isset($_POST['title']) && !empty($_POST['title']))
{
	$title = $_POST['title'];$flag=1;	
	$query = "UPDATE `book` SET `title` = '$title' WHERE `book_id` = '$var_id'";
	$query_run=mysqli_query($con,$query);
}
if(isset($_POST['author']) && !empty($_POST['author']))
{
	$author = $_POST['author'];	$flag=1;
	$query = "UPDATE `book` SET `author` = '$author' WHERE `book_id` = '$var_id'";
	$query_run=mysqli_query($con,$query);
}
if(isset($_POST['price']) && !empty($_POST['price']))
{
	$price = $_POST['price'];	$flag=1;
	$query = "UPDATE `book` SET `price` = '$price' WHERE `book_id` = '$var_id'";
	$query_run=mysqli_query($con,$query);
}
if(isset($_POST['stock']) && !empty($_POST['stock']))
{
	$stock = $_POST['stock'];	$flag=1;
	$query = "UPDATE `book` SET `stock` = '$stock' WHERE `book_id` = '$var_id'";
	$query_run=mysqli_query($con,$query);
}
if(isset($_POST['details']) && !empty($_POST['details']))
{
	$details = $_POST['details'];	$flag=1;
	$query = "UPDATE `book` SET `details` = '$details' WHERE `book_id` = '$var_id'";
	$query_run=mysqli_query($con,$query);
}
if(isset($_POST['genre']) && !empty($_POST['genre']))
{
	$genre = $_POST['genre'];	$flag=1;
	$query = "UPDATE `book` SET `genre` = '$genre' WHERE `book_id` = '$var_id'";
	$query_run=mysqli_query($con,$query);
}
if(isset($_POST['image']) && !empty($_POST['image']))
{
	$image = $_POST['image'];	$flag=1;
	$query = "UPDATE `book` SET `image` = '$image' WHERE `book_id` = '$var_id'";
	$query_run=mysqli_query($con,$query);
}

if($flag==1)
{
	header('Location: ack3.php');
	die;
}
else
{
	header('Location: change_form.php?id=<?php echo $var_id ?>');
	die;
}

?>