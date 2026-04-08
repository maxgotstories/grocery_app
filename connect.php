<?php
		//This file will help and connect PHP to MySQL Database (grocerydb)
		$con=mysqli_connect("localhost","root","","grocerydb");
		if(!$con)
		{
		die("cannot connect to server");
		}	
?>