<?php

	$ProductName = [];
	$ProductType = [];
	$ProductPrice = [];
	$ProductDiscount = [];
	$ProductValidDate = [];
	$ProductNoOfUpVote = [];
	$ProductMessage = [];
	$ProductImgCount = [];
	$ProductSource = [];
	$ProductDate = [];
	$ProductUserID = [];
	$Productimage =[];
	$ProductID =[];

	include './php/ConnectDb.php';
    $sql = "SELECT * FROM ProductPostsDatabase ORDER BY NoOfUpVotes DESC";
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()){
    	$ProductID[] = $row["PostID"];
    	$ProductName[] = $row["ItemName"];
		$ProductType[] = $row["ItemType"];
		$ProductPrice[] = $row["Discount"];
		// $ProductDiscount[] = $row["Discount"];
		$ProductValidDate[] = $row["DiscountValidDate"];
		$ProductNoOfUpVote[] = $row["NoOfUpVotes"];
		$ProductMessage[] = $row["Message"];
		$ProductImgCount[]  = $row["ImageCount"];
		$ProductSource[] = $row["Source"];
		$ProductDate[] =$row["Date"];
		$ProductUserID[] = $row["UserID"];



		$image = "SELECT ImageData FROM ImageDatabase WHERE ImageIndex=0 and PostID = ".$row["PostID"];
		$imageresult = $conn -> query($image);
		$imagerow = $imageresult->fetch_assoc();
		$Productimage[] = $imagerow["ImageData"];

    }


      $conn->close();


?>
