<?php

require_once 'connect.php';
require_once 'utilities.php';

if(loggedin())
{
	header("Location: index.php");
	die();
}

?>

<!DOCTYPE html>
<html>
	
	<?php include 'head.php'; ?>

	<body>
		
		<?php include 'nav.php'; ?>
		
		<?php include 'login_form.php'; ?>

		<?php include 'footer.php'; ?>

	</body>
</html>