<?php
# UPLOAD IMAGE TO SQL SUCCESSFULLY
include 'ConnectDb.php';

if(isset($_POST['UploadComment'])){

  // Max CommentID
  $sql = "SELECT IFNULL(max(CommentID),0)+1 FROM `CommentDatabase`";
  $result = $conn->query($sql);
  if ($result)
  {
    $row = mysqli_fetch_array($result);
    $max_CommentID = $row[0];

    $sql = "INSERT INTO `CommentDatabase` (`CommentID`, `CommentContent`, `Date`, `SourceDatabase`, `PostID`, `UserID`) VALUES ('".$max_CommentID."', '".$_POST['comment']."', CURRENT_TIMESTAMP,'".$_POST['Database']."', '" .$_POST['postID']."', '". $_POST['userID'] ."')";
    $records = $conn->query($sql);
    if ($records)
    {
      // echo ("Uploaded SUCCESSFULLY");
      if($_POST['Database']=='P'){
        echo "<script language='javascript'>\n";
        echo "window.location.href='../ViewProductPost.php?PostID=".$_POST['postID']."';";
        echo "</script>\n";
        exit;
      }
      else if($_POST['Database']=='F'){
        echo "<script language='javascript'>\n";
        echo "window.location.href='../ForumViewPost.php?PostID=".$_POST['postID']."';";
        echo "</script>\n";
        exit;
      }

    }
    else{
      echo "<script language='javascript'>\n";
      // Return to ProductPost if not Successful
      echo "alert($conn->error); window.location.href='../index.php';";
      echo "</script>\n";
    }
  }
  else{
    echo ("Error: " . $conn->error);
  }

  }
?>
