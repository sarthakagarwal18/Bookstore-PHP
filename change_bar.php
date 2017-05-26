<?php

if(isset($_POST['book_name']))
{
	$book_name = $_POST['book_name'];
		
	if(!empty($book_name))
	{
		$query = "SELECT `book_id` FROM `book` WHERE `title`='$book_name'";
		
		if($query_run=mysqli_query($con,$query))
		{
			$query_num_rows = mysqli_num_rows($query_run);
			if($query_num_rows==0)
			{
				header('Location:not_found.php');
				die;
			}
			else
			{
				$book_id = mysqli_result($query_run,0,'book_id');
				header("Location: change_form.php?id=$book_id");
				die;
			}
		}
			
	}
	else
	{
		header('Location: change_details.php');
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
							<div class="panel-title">Mystery Books: Search Book to be Change Details</div>
						</div>

						<div style="padding-top:30px" class="panel-body">

							<form method="post" action="<?php echo $current_file; ?>" class="form-horizontal" role="form">

								<div style="margin-bottom: 25px" class="input-group">

									<span class="input-group-addon">Book Name:</span>
									<input type="text" class="form-control" name="book_name">

								</div>


								<div style="margin-top: 10px" class="form-group">
									<div class="col-sm-12 controls">
									<input type="submit" id="btn-login" class="btn btn-success" value="Search">
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