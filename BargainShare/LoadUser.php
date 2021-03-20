<?php
# UPLOAD IMAGE TO SQL SUCCESSFULLY
include 'ConnectDb.php';

$Email = $_POST['Email'];
$Password = $_POST['Password'];


$sql = "SELECT * FROM UserDatabase WHERE Email='$Email' and Password='$Password'";

    if ($result = $conn->query($sql))
    echo("SQL OK");
	else
    echo("Error: " . $conn->error);



    // Mysql_num_row is counting the table rows
    $count=mysqli_num_rows($result);

    // If the result matched $username and $password, the table row must be one row
    if($count == 1){
        session_start();


        $_SESSION['loggedin'] = true;

        $row = $result->fetch_assoc();
    	$UserID = $row["UserID"];

        $_SESSION['UserID'] = $UserID;
        $_SESSION['Email'] = $Email;
    	echo($UserID);


    	
    	echo "<script language='javascript'>\n";
		echo "alert('Log in successful'); window.location.href='index.php';";
		echo "</script>\n";
    	exit;
    }
    else echo(" no such user");
?>
