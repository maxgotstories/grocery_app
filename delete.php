<?php
	/* Delete grocery item script*/
	include("connect.php"); //Database connection
	$id = $_GET['id'];

	//SQL delete query
	$q = "delete from grocerytb where Id = $id ";
	//Execute delete query
	mysqli_query($con,$q);
	
?>