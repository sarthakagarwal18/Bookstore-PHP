<?php

require_once 'connect.php';
require_once 'utilities.php';

$var_user=$_SESSION['user_id'];
$total=0;

$query = "SELECT * FROM history where user_id='$var_user' order by `date`,`time`";
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
						<div style="text-align:center;text-decoration:underline"><h3>Order History</h3></div>
							<div class="cart_container">
								<?php if(mysqli_num_rows($query_run)==0): ?>
									<div>
										You have not placed any orders with us till now.
									</div>
								<?php else: ?>
									<?php while($row = mysqli_fetch_row($query_run)): ?>
										<div class="cart_item">
											<div class="cart_listing">
												<?php
												
												$q = "SELECT `title`,`price` FROM `book` WHERE `book_id`='$row[0]'";
												$q_run=mysqli_query($con,$q);
												$book_name = mysqli_result($q_run,0,'title');
												$book_price = mysqli_result($q_run,0,'price');
												
												?>
												<span class="title"><?php echo $book_name; ?></span>
											</div>
											<div class="cart_price">
												<span>Price: <?php echo $book_price; ?></span><br>
												<span>Quantity: <?php echo $row[3]; ?></span><br>
												<span>Time: <?php echo $row[4]; ?></span><br>
												<span>Date: <?php echo $row[2]; ?></span><br>
											</div>
										</div>
									<?php endwhile; ?>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<?php include 'footer.php'; ?>

	</body>
</html>