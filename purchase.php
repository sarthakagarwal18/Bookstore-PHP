<?php

require_once 'connect.php';
require_once 'utilities.php';

$var_user=$_SESSION['user_id'];
$total=$_GET['total'];

//USING DELIMITTER IN TRIGGER
//OLD is a builtin keyword and refers to the blog table row that we are deleting. Mysql runs the trigger blog_before_delete whenever we delete an entry in the blog table. I the trigger fails, then the delete is rolled back. This helps ensure Atomicity, Consistency, Isolation, and Durability in our database.

$query = "DELETE FROM `cart` WHERE user_id='$var_user'";
$query_run=mysqli_query($con,$query);

?>

<!DOCTYPE html>
<html>

	<?php include 'head.php'; ?>

	<body>

		<?php include 'nav.php'; ?>

		<section class="cover">
			<div class="container-fluid content-main">
				<div class="parallax">
					<div class="row">
						<div class="col-md-8 col-md-offset-2 col-sm-12 maincontent">
						<div style="text-align:center;text-decoration:underline"><h3>Order Summary</h3></div>
							<div class="cart_container">
								Thank you for shopping with us. Your Total Payment Bill is Rs.<?php echo $total ?>.
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<?php include 'footer.php'; ?>

	</body>
</html>