<?php
session_start();


include 'ConnectDb.php';

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){

  if(isset($_GET["LikePost"])){
    $_SESSION['LikePost'] = $_GET['LikePost'];
  }

  $sql = "SELECT * FROM LikeDatabase WHERE SourceDatabase = 'P' AND PostID ='".$_SESSION['LikePost']."' AND UserID = ". $_SESSION['UserID'];
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  if(mysqli_num_rows($result) == 1){
    //GET CURRENT NO OF LIKES
    if(!isset($_GET["LikePost"])){
      $sql = "SELECT NoOfUpVotes FROM ProductPostsDatabase WHERE PostID ='".$_SESSION['LikePost']."'";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();

      $sql = "UPDATE ProductPostsDatabase SET NoOfUpVotes = '".($row['NoOfUpVotes'] - 1)."' WHERE PostID ='".$_SESSION['LikePost']."'";
      $result = $conn->query($sql);

      $sql = "DELETE FROM LikeDatabase WHERE SourceDatabase = 'P' AND UserID = '".$_SESSION['UserID']."' AND PostID = '".$_SESSION['LikePost']."'";
      $result = $conn->query($sql);
      }
      echo "<script language='javascript'>\n";
      echo "window.location.href='../ViewProductPost.php?PostID=".$_SESSION['LikePost']."';";
      echo "</script>\n";


  }
  else{
    //GET CURRENT NO OF LIKES
    $sql = "SELECT NoOfUpVotes FROM ProductPostsDatabase WHERE PostID ='".$_SESSION['LikePost']."'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $sql = "UPDATE ProductPostsDatabase SET NoOfUpVotes = '".($row['NoOfUpVotes'] + 1)."' WHERE PostID ='".$_SESSION['LikePost']."'";
    $result = $conn->query($sql);

    $sql = "INSERT INTO `LikeDatabase` (`UserID`, `PostID`, `SourceDatabase`) VALUES ('".$_SESSION['UserID']."', '".$_SESSION['LikePost']."', 'P');";
    $result = $conn->query($sql);

    echo "<script language='javascript'>\n";
    echo "window.location.href='../ViewProductPost.php?PostID=".$_SESSION['LikePost']."';";
    echo "</script>\n";

  }

}
else{
  echo "<script language='javascript'>\n";
  echo "alert('Login First Please'); window.location.href='../Login.php';";
  echo "</script>\n";
}



?>
