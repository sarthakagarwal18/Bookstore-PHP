<?php

require_once 'connect.php';
require_once 'utilities.php';

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
						   <div class="detail_book_display">
							  <span class="detail_book_title">Choose Genre</span>
							  <a href="genre_index.php?genre=<?php echo 'Thriller' ?>"><div class="detail_book_description" style="font-size:25px;">1. Thriller</div></a>
							  <a href="genre_index.php?genre=<?php echo 'Drama' ?>"><div class="detail_book_description" style="font-size:25px;">2. Drama</div></a>
							  <a href="genre_index.php?genre=<?php echo 'Romance' ?>"><div class="detail_book_description" style="font-size:25px;">3. Romance</div></a>
							  <a href="genre_index.php?genre=<?php echo 'Comedy' ?>"><div class="detail_book_description" style="font-size:25px;">4. Comedy</div></a>
							  <a href="genre_index.php?genre=<?php echo 'Mystery' ?>"><div class="detail_book_description" style="font-size:25px;">5. Mystery</div></a>
						   </div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<?php include 'footer.php'; ?>

	</body>
</html>