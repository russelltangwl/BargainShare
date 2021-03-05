<?php
include "ConnectDb.php";
$postID = 123;
$userID = 456;
$title = $_POST['title'];
$description = $_POST['description'];
$upvotes = 1;

if (mysqli_connect_error()) {
 die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
} else {
 $INSERT = "INSERT INTO `ForumPostsDatabase` (`PostID`, `UserID`, `Title`, `PostContent`, `NoOfUpvotes`) VALUES('".$postID."', '".$userID."', '".$title."', '".$description."', '".$upvotes."')";
<<<<<<< HEAD

=======
 
>>>>>>> 96666919a29a27076c899cfc12a54a68467c1f87
$records = $conn->query($INSERT);
if ($records)
{
  echo ("Uploaded SUCCESSFULLY");
}
else{
  echo ("Error: " . $conn->error);
  echo ("$INSERT");
}
}

<<<<<<< HEAD

 $conn->close();


?>
=======
 
 $conn->close();


?>
>>>>>>> 96666919a29a27076c899cfc12a54a68467c1f87
