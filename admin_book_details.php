<?php

require_once 'connect.php';
require_once 'utilities.php';

$var_id=$_GET['id'];
$var = $_SESSION['admin'];
$query = "SELECT * FROM `book` where `book_id`='$var_id'";

if($query_run=mysqli_query($con,$query))
{
	$query_num_rows = mysqli_num_rows($query_run);
	if($query_num_rows==1)
	{
		$book_image = mysqli_result($query_run,0,'image');
		$book_title = mysqli_result($query_run,0,'title');
		$book_author = mysqli_result($query_run,0,'author');
		$book_desc = mysqli_result($query_run,0,'details');
		$book_price = mysqli_result($query_run,0,'price');
		$book_stock = mysqli_result($query_run,0,'stock');
	}
}

?>

<!DOCTYPE html>
<html>
	
	<?php include 'head.php'; ?>

	<body>
		
		<?php include 'admin_nav.php'; ?>

		<section class="cover">
			<div class="container-fluid content-main">
				<div class="parallax">
					<div class="row">
						<div class="col-md-8 col-md-offset-2 col-sm-12 maincontent">
						   <div class="detail_book_display">
							  <img class="detail_book_img" src="<?php echo $book_image; ?>">
							  <span class="detail_book_title"><?php echo $book_title; ?></span>
							  <span class="detail_book_author"><?php echo $book_author; ?></span>
							  <span class="detail_book_price">Rs. <?php echo $book_price; ?></span><br>
								<?php if($book_stock>0): ?>
									<span class="detail_book_stock">Available: <?php echo $book_stock; ?></span>
								<?php else: ?>
									<span class="detail_book_stock">Out of Stock!</span>
								<?php endif; ?>
							  <div class="detail_book_description"><?php echo $book_desc; ?></div>
						   </div>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<?php include 'footer.php'; ?>

	</body>
</html>