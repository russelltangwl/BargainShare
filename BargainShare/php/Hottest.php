<?php

	$ProductName = [];
	$ProductPrice = [];
	$ProductDiscount = [];
	$Productimage =[];
	$ProductID =[];

	include './php/ConnectDb.php';
    $sql = "SELECT * FROM ProductPostsDatabase ORDER BY NoOfUpVotes DESC";
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()){
    	$ProductID[] = $row["PostID"];
    	$ProductName[] = $row["ItemName"];
		$ProductPrice[] = $row["Price"];
		$ProductDiscount[] = $row["Discount"];



		$image = "SELECT ImageData FROM ImageDatabase WHERE ImageIndex=0 and PostID = ".$row["PostID"];
		$imageresult = $conn -> query($image);
		$imagerow = $imageresult->fetch_assoc();
		$Productimage[] = $imagerow["ImageData"];

    }


      $conn->close();


?>
