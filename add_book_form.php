<?php

if(isset($_POST['title']) && isset($_POST['author']) && isset($_POST['price']) && isset($_POST['stock']) && isset($_POST['details']) && isset($_POST['image']) && isset($_POST['genre']))
{
	$title = $_POST['title'];
	$author = $_POST['author'];
	$price = $_POST['price'];
	$stock = $_POST['stock'];
	$details = $_POST['details'];
	$image = $_POST['image'];
	$genre = $_POST['genre'];
		
	if(!empty($_POST['title']) && !empty($_POST['author']) && !empty($_POST['price']) && !empty($_POST['stock']) && !empty($_POST['details']) && !empty($_POST['image']) && !empty($_POST['genre']))
	{
		$query = "SELECT `book_id` FROM `book` WHERE `title`='$title'";
		$query_run=mysqli_query($con,$query);
		$q = mysqli_num_rows($query_run);
		if($q==0)
		{
			$query = "INSERT INTO `book`(`title`, `author`, `price`, `details`, `stock`, `image`, `genre`) VALUES ( '$title','$author','$price','$details','$stock','$image','$genre')";
			$query_run=mysqli_query($con,$query);
			$query = "INSERT INTO `maintains` (`user_id`,`title`) VALUES (1,'$title')";
			$query_run=mysqli_query($con,$query);
		}
		else
		{
			$query = "UPDATE `book` SET `stock` = `stock` + 1 WHERE `title` = '$title'";
			$query_run=mysqli_query($con,$query);
		}
		header('Location: ack.php');
		die;
	}
	else
	{
		
		header('Location: add_book.php');
		die;
	}
}

?>

<section class="cover">
	<div class="container-fluid content-main">
		<div class="parallax">
			<div class="row">
				<div class="col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-2 loginbox">
					<div class="panel panel-info">

						<div class="panel-heading">
							<div class="panel-title">Mystery Books: User Login</div>
						</div>

						<div style="padding-top:30px" class="panel-body">

							<form method="post" action="<?php echo $current_file; ?>" class="form-horizontal" role="form">

								<div style="margin-bottom: 25px" class="input-group">

									<span class="input-group-addon">Title:</span>
									<input type="text" class="form-control" name="title">

								</div>
								
								<div style="margin-bottom: 25px" class="input-group">

									<span class="input-group-addon">Author:</span>
									<input type="text" class="form-control" name="author">

								</div>
								
								<div style="margin-bottom: 25px" class="input-group">

									<span class="input-group-addon">Price:</span>
									<input type="text" class="form-control" name="price">

								</div>
								
								<div style="margin-bottom: 25px" class="input-group">

									<span class="input-group-addon">Details:</span>
									<input type="textbox" class="form-control" name="details">

								</div>

								<div style="margin-bottom: 25px" class="input-group">

									<span class="input-group-addon">Stock :</span>
									<input type="text" class="form-control" name="stock">

								</div>
								
								<div style="margin-bottom: 25px" class="input-group">

									<span class="input-group-addon">Image Path :</span>
									<input type="text" class="form-control" name="image">

								</div>
								
								<div style="margin-bottom: 25px" class="input-group">

									<span class="input-group-addon">Genre :</span>
									<input type="text" class="form-control" name="genre">

								</div>

								<div style="margin-top: 10px" class="form-group">
									<div class="col-sm-12 controls">
									<input type="submit" id="btn-login" class="btn btn-success" value="Submit">
									</div>
								</div>

							</form>

						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>