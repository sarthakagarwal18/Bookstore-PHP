<?php

require_once 'connect.php';
require_once 'utilities.php';

$var_id=$_GET['id'];
$var = $_SESSION['admin'];

?>

<!DOCTYPE html>
<html>
	
	<?php include 'head.php'; ?>

	<body>
		
		<?php 
		if($var=="yes")
			include 'admin_nav.php'; 
		else
			include 'nav.php';
		?>

		<section class="cover">
			<div class="container-fluid content-main">
				<div class="parallax">
					<div class="row">
						<div class="col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-2 loginbox">
							<div class="panel panel-info">

								<div class="panel-heading">
									<div class="panel-title">Change Details (Leave Blank to make No Changes)</div>
								</div>

								<div style="padding-top:30px" class="panel-body">

									<form method="post" action="process_changeform.php?id=<?php echo $var_id ?>" class="form-horizontal" role="form">

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
		
		<?php include 'footer.php'; ?>

	</body>
</html>