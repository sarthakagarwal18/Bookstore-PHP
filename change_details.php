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
		
		<?php include 'change_bar.php'; ?>

		<?php include 'footer.php'; ?>

	</body>
</html>