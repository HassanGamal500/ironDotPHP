<?php

include("auth.php");

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Welcome User</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="form">
		<h1 >Welcome <?php if (isset($_SESSION['username'])) { echo $_SESSION['username']; } else { echo $_COOKIE["username"]; } ?>!</h1>
		<p>you are loggened in successfully</p>
		<a href="logout.php">Logout</a>
	</div>
</body>
</html>