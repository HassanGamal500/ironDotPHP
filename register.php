<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Register</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<?php

require('connect.php');

session_start();

if (isset($_SESSION['email']) or isset($_COOKIE['email'])) {

    header('Location:index.php');

}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$username = ($_REQUEST['username']);
	$username = mysqli_real_escape_string($con, $username);

	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($con, $email);

	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con, $password);
    $hashPassword = md5($password);

    $query = "INSERT into `users` (username, password, email) VALUES ('$username', '$hashPassword', '$email')";

    $result = mysqli_query($con, $query);

    if($result){

        echo "<div class='form'>
            <h3>You are registered successfully.</h3>
            <br/>Click here to <a href='login.php'>Login</a></div>";

        }

    } else {

?>
	<form class="login" action="" method="post">
        <h1 class="login-title">Register</h1>
		<input type="text" class="login-input" name="username" placeholder="Username" required />
        <input type="text" class="login-input" name="email" placeholder="Email Address">
        <input type="password" class="login-input" name="password" placeholder="Password">
        <input type="submit" name="submit" value="Register" class="login-button">
      <p class="login-lost">Already Registered? <a href="login.php">Login Here</a></p>
  </form>

<?php } ?>

</body>
</html>