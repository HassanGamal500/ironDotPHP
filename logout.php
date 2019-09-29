<?php

session_start();

session_destroy();

if(isset($_COOKIE["username"])){

 	setcookie ("username","");  

}  

if(isset($_COOKIE["email"])){

 	setcookie ("email","");  

}

if(isset($_COOKIE["password"])){

 	setcookie ("password","");  

}  
 
header("location: login.php");

exit;

?>