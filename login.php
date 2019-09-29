<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php

require('connect.php');

session_start();

if (isset($_SESSION['email']) or isset($_COOKIE['email'])) {

	header('Location:index.php');

}

if (isset($_POST['login'])){

	$email = stripslashes($_POST['email']);
	$email = mysqli_real_escape_string($con,$email);

	$password = stripslashes($_POST['password']);
	$password = mysqli_real_escape_string($con,$password);
	$hashPassword = md5($password);

    $query = "SELECT * FROM `users` WHERE email='$email' AND password='$hashPassword'";

	$result = mysqli_query($con, $query) or die(mysql_error());

	$get = mysqli_fetch_assoc($result);

	$rows = mysqli_num_rows($result);

    if($rows == 1){

    	if(!empty($_POST["remember"])) {

    		setcookie ("username", $get['username'], time() + (10 * 365 * 24 * 60 * 60));  

    		setcookie ("email", $email, time() + (10 * 365 * 24 * 60 * 60));  

	    	setcookie ("password", $hashPassword, time() + (10 * 365 * 24 * 60 * 60));

	    	ini_set('session.cookie_lifetime', 60 * 60 * 24 * 7);

    	} else {

    		if(isset($_COOKIE["email"])){

		     	setcookie ("email","");  
		    
		    }

		    if(isset($_COOKIE["password"])){

		     	setcookie ("password","");  
		    
		    }  

    	}

		$_SESSION['username'] = $get['username'];
		$_SESSION['email'] = $email;

		header("Location: index.php");

    } else {

		header("Location: login.php");

	}

} else {

?>
	<form class="login" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

	    <h1 class="login-title">Login</h1>

	    <input type="email" class="login-input" name="email" placeholder="Email" autofocus>

	    <input type="password" class="login-input" name="password" placeholder="Password">

	    <input type="checkbox" name="remember" value="1">Remember Me <br><br>

	    <input type="submit" value="Login" name="login" class="login-button">

	  	<p class="login-lost">New Here? <a href="registration.php">Register</a></p>

  	</form>

<?php } ?>

</body>
</html>