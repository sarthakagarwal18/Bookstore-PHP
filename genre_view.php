<?php

$genre=$_GET['genre'];

$query = "SELECT * FROM `book` WHERE `genre`='$genre'";

if($query_run=mysqli_query($con,$query))
{
	$query_num_rows = mysqli_num_rows($query_run);
	if($query_num_rows==0)
	{
		header('Location: not_found.php');
		die;
	}
}

?>

<section class="cover">
	<div class="container-fluid content-main">
		<div class="parallax">
			<div class="row">
				<div class="col-md-10 col-md-offset-1 col-sm-12 maincontent">

				<div style="text-align:center;" class="greeting">
					<h3>Genre: <?php echo $genre ?></h3>
				</div>

					<?php while($row = mysqli_fetch_row($query_run)): ?>
						<div class="storefront_book_display" style="margin-left:40px;">
							<a href="book_details.php?id=<?php echo $row[0] ?>">
								<img src="<?php echo $row[6]; ?>">
								<span class="storefront_book_title"><?php echo $row[1]; ?></span>
								<span class="storefront_book_author"><?php echo $row[2]; ?></span>
								<span class="storefront_book_price">Rs. <?php echo $row[3]; ?></span>
							</a>

							<?php if($row[5]>0): ?>
								<span class="storefront_add_to_cart">
									<a href="cart.php?id=<?php echo $row[0] ?>">[Add to Cart]</a>
								</span>
							<?php else: ?>
								<span class="storefront_add_to_cart">
									Out of Stock!
								</span>
							<?php endif; ?>
						</div>
					<?php endwhile; ?>

				</div>
			</div>
		</div>
	</div>
</section>