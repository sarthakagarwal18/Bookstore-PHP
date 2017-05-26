<?php

require_once 'connect.php';
require_once 'utilities.php';

$var_user=$_SESSION['user_id'];
$total=0;

$query = "SELECT cart.book_id,title,quantity,price FROM cart, book where user_id='$var_user' AND cart.book_id=book.book_id";
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
						<div style="text-align:center;text-decoration:underline"><h3>Your Cart</h3></div>
							<div class="cart_container">
								<?php if(mysqli_num_rows($query_run)==0): ?>
									<div>
										There are no items in your cart.
									</div>
								<?php else: ?>
									<?php while($row = mysqli_fetch_row($query_run)): ?>
										<div class="cart_item">
											<div class="cart_listing">
												<span class="title"><?php echo $row[1]; ?></span>
											</div>
											<div class="cart_price">
												<span class="cart_quantity"><?php echo $row[2]; ?> x <span class="cart_value"><?php echo $row[3]; ?></span></span>
												Quantity: <a href="add_cart.php?id=<?php echo $row[0] ?>">[+]</a> / <a href="remove_cart.php?id=<?php echo $row[0] ?>">[-]</a>
											</div>
											<?php global $total; $total+=$row[2]*$row[3]; ?>
										</div>
									<?php endwhile; ?>
								<div class="cart_total">
									<h4> Total: Rs. <span class="cart_value"><?php echo $total; ?></span></h4>
									<a href="purchase.php?total=<?php global $total;echo $total ?>"><input type="submit" id="btn-logic" class="btn btn-success" value="Purchase"></a>
								</div>
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