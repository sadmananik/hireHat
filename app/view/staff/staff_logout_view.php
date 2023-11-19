<?php 
session_start();

if (isset($_SESSION["userId"]) && $_SESSION["status"]=="Staff" ) {
	session_unset(); 
	session_destroy(); 
	header("Location: /HireHAT/index.php");
}

if (isset($_COOKIE['userId'])) {
	setcookie("userId", "", time()-3600, "/");
	setcookie("status", "", time()-3600, "/");
	setcookie("key", "", time()-3600, "/");
}


?>