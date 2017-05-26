<?php

if(isset($_POST['username']) && isset($_POST['password']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];
		
	if(!empty($username) && !empty($password))
	{
		$query = "SELECT `user_id` FROM `admin` WHERE `username`='$username' AND `password`='$password'";
		
		if($query_run=mysqli_query($con,$query))
		{
			$query_num_rows = mysqli_num_rows($query_run);
			if($query_num_rows!=1)
			{
				header('Location: admin_login.php');
				die;
			}
			else
			{
				$user_id = mysqli_result($query_run,0,'user_id');
				$_SESSION['user_id'] = $user_id;
				$_SESSION['username'] = $username;
				$_SESSION['admin'] = "yes";
				header('Location: admin_index.php');
				die;
			}
		}
			
	}
	else
	{
		header('Location: admin_login.php');
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
							<div class="panel-title">Mystery Books: Admin Login</div>
						</div>

						<div style="padding-top:30px" class="panel-body">

							<form method="post" action="<?php echo $current_file; ?>" class="form-horizontal" role="form">

								<div style="margin-bottom: 25px" class="input-group">

									<span class="input-group-addon">Username:</span>
									<input type="text" class="form-control" name="username">

								</div>

								<div style="margin-bottom: 10px" class="input-group">

									<span class="input-group-addon">Password :</span>
									<input type="password" class="form-control" name="password">

								</div>

								<div style="margin-top: 10px" class="form-group">
									<div class="col-sm-12 controls">
									<input type="submit" id="btn-login" class="btn btn-success" value="Login">
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