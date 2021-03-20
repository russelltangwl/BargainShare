<?php
# UPLOAD IMAGE TO SQL SUCCESSFULLY
include 'ConnectDb.php';



  //Insert all data
  $max_userid = "SELECT IFNULL(max(UserID),0)+1 FROM `UserDatabase`" ;
  $result = $conn->query($max_userid);
  if ($result)
      {
        echo ("UserID Gotten");
      }
      else{
        echo ("Error: " . $conn->error);
        echo ("$max_userid");
      }
  $row = mysqli_fetch_array($result);
  $max_num = $row[0];

  $sql = "INSERT INTO `UserDatabase` (`UserID`, `Email`, `Password`, `Level`, `Upvotes`, `Name`) VALUES ('".$max_num."', '".$_POST['Email']."', '".$_POST['Password']."', '1', '0', '".$_POST['Names']."' )";
    $records = $conn->query($sql);
    if ($records)
    {
      echo ("Uploaded SUCCESSFULLY");
    }
    else{
      echo ("Error: " . $conn->error);
      echo ("$sql");
    }
  



?>
