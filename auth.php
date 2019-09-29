<?php

session_start();

if(!isset($_SESSION["email"]) && !isset($_COOKIE['email']) && !isset($_COOKIE['password'])){

	header("Location: login.php");

	exit();

}

?>