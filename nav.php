<nav class="navbar navbar-inverse navbar-fixed-top">
<div class="container">

	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="navbar">
			<span class="sr-only">Toggle Navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a href="index.php" class="navbar-brand">Mystery Books</a>
	</div>

	<div id="navbar" class="collapse navbar-collapse">
		<ul class="nav navbar-nav">
			
			<?php if(loggedin()): ?>
					<li><a href="search.php">Search Books</a></li>
					<li><a href="genre.php">Find Books by Genre</a></li>
					<li><a href="cart.php">My Shopping Cart</a></li>
					<li style="color:white;margin-left:220px;margin-top:15px;">Hello, <?php echo $_SESSION['username']; ?></li>
					<li style="margin-left:15px;"><a class="link_text" href="history.php">Order History</a></li>
					<li style="margin-left:15px;"><a class="link_text" href="logout.php">Logout</a></li>
			<?php else: ?>
				<li style="margin-left:600px;"><a class="link_text" href="login.php">User Login</a></li>
				<li style="margin-left:21px;"><a class="link_text" href="admin_login.php">Admin Login</a></li>
				<li style="margin-left:21px;"><a class="link_text" href="register.php">Register</a></li>
			<?php endif; ?>
			
		</ul>
	</div>

</div>
</nav>