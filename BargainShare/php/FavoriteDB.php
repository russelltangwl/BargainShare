<?php
session_start();

include 'ConnectDb.php';

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){

    $POSTID=$_GET['FavoritePost'];
    $USERID = $_SESSION['UserID'];

    $sql = "SELECT * FROM `MyFavoriteDatabase` WHERE ProductID = ".$POSTID;
    $result = $conn->query($sql);
    $count=mysqli_num_rows($result);

    if ($count >0) {
      echo "<script language='javascript'>\n";
      echo "alert('Already in MyFavourite');window.location.href='../index.php'";
      echo "</script>\n";
    }
    else{
      $sql ="INSERT INTO MyFavoriteDatabase(`ProductID`, `UserID`) VALUES ('$POSTID','$USERID')";
      $result = $conn->query($sql);
      header("Location:../MyFavourite.php");
    }

  	}


else{
  echo "<script language='javascript'>\n";
  echo "alert('Login First Please'); window.location.href='../Login.php';";
  echo "</script>\n";
}



?>
