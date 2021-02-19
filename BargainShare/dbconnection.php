<?php
	$database_host = "dbhost.cs.man.ac.uk";
	$database_user = "r13355ty";
	$database_pass = "luca0621+";
	$database_name = "2020_comp10120_y12";
	
	$conn = mysqli_connect($database_host, $database_user, $database_pass,$database_name);

	if (!$conn)
	{
	  die("Connection failed: " . mysqli_connect_error());
	  }
	else{
	  echo "Connected Successfully";
	}
	

?>