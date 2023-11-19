<?php ob_start(); ?>
 

<?php
 
    define("APP_ROOT", "$_SERVER[DOCUMENT_ROOT]/HireHAT");

    if (isset($_COOKIE["userId"]) && isset($_COOKIE['key'])) {
    	header("Location:app/view/visitor/visitor_index.php?visitor_login&userId=".$_COOKIE["userId"]."&key=".$_COOKIE["key"]);
    }
	else if (count($_GET)==0) {
    	  header("Location:app/view/visitor/visitor_index.php");
    }
    else{
    	echo "$_GET".count($_GET);
    }
?>

<?php ob_end_flush(); ?>