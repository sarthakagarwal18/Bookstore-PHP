<?php

require_once 'connect.php';
require_once 'utilities.php';

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
						<div class="col-md-8 col-md-offset-2 col-sm-12 maincontent">
						   <div class="detail_book_display">
							  <span class="detail_book_title">Choose Option</span>
							  <a href="add_book.php"><div class="detail_book_description" style="font-size:25px;">1. Add Book</div></a>
							  <a href="remove_book.php"><div class="detail_book_description" style="font-size:25px;">2. Delete Book</div></a>
							  <a href="change_details.php"><div class="detail_book_description" style="font-size:25px;">3. Change Details of a Book</div></a>
						   </div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<?php include 'footer.php'; ?>

	</body>
</html>