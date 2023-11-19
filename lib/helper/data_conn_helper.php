<?php	
	$serverName = "localhost";
	$userName = "root";
	$dbPassword = "";
	$dbName = "hirehat";

	function executeNonQueryArray($query){
		global $serverName, $userName, $dbPassword, $dbName;
		$resultDB = false;
		$connection = mysqli_connect($serverName, $userName, $dbPassword, $dbName);
			
		
		if($connection){
			$resultDB = mysqli_query($connection, $query);
			$result = mysqli_fetch_all($resultDB,MYSQLI_ASSOC);
			//mysqli_close($connection);
		}
		if (!$resultDB) {
			$dberror= "SQL Error: ".mysqli_error($connection);	
			echo "<script type='text/javascript'>alert(\"$dberror\");</script>";
		}
		else{
			return $result;
		}
	}

	
	function executeNonQuery($query){
		global $serverName, $userName, $dbPassword, $dbName;
		$resultDB = false;
		$connection = mysqli_connect($serverName, $userName, $dbPassword, $dbName);
			
		
		if($connection){
			$resultDB = mysqli_query($connection, $query);
			//mysqli_close($connection);
		}
		if (!$resultDB) {
			$dberror= "SQL Error: ".mysqli_error($connection);	
			echo "<script type='text/javascript'>alert(\"$dberror\");</script>";
		}
		else{
			return $resultDB;
		}
	}

?>