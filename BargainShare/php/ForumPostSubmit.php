<?php
include "ConnectDb.php";
session_start();
$userID = $_SESSION['UserID'];
$title = $_POST['title'];
$description = $_POST['description'];
$upvotes = 0;

if (mysqli_connect_error()) {
 die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
} else {

 $sql = "SELECT * FROM ForumPostsDatabase";
 $result = $conn->query($sql);
 $postID=$result->num_rows;
 $postID+=1;

 $INSERT = "INSERT INTO `ForumPostsDatabase` (`PostID`, `UserID`, `Title`, `PostContent`, `NoOfUpvotes`) VALUES('".$postID."', '".$userID."', '".$title."', '".$description."', '".$upvotes."')";

$records = $conn->query($INSERT);
if ($records)
{
  echo "<script language='javascript'>\n";
  echo "alert('Submitted successfully!'); window.location.href='../Forum.php';";
  echo "</script>\n";
}
else{
  echo ("Error: " . $conn->error);
  echo ("$INSERT");
}
}


 $conn->close();


?>
