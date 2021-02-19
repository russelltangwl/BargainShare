<?php
 $servername ="localhost";
 $username = "root";
 $password = "root";

 // create connection
 $conn = mysql_connect($servername,$username,$password);


 // Check connection
 if (!$conn) {
 	die("Connection failed" .mysql_connect_error());
 }

 echo "connecte successfully";

 ?>