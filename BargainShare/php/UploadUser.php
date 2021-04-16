<?php
if(isset($_POST['CreateAccount'])){
  include 'ConnectDb.php';
  //Insert all data
  $max_userid = "SELECT IFNULL(max(UserID),0)+1 FROM `UserDatabase`" ;
  $result = $conn->query($max_userid);
  if (!$result){
      echo ("Error: " . $conn->error);
      echo ("$max_userid");
  }
  $row = mysqli_fetch_array($result);
  $max_num = $row[0];
  if(isset($_FILES['file']['name'])){
    // Encrypt Picture --------------
    $name = $_FILES['file']['name'];
    $target_dir = "upload/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);

    // Select file type
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Valid file extensions
    $extensions_arr = array("jpg","jpeg","png","gif");

    // Check extension
    if( in_array($imageFileType,$extensions_arr) ){

      // Convert to base64
      $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']) );
      $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
      $image = "'".$image."'";
    }
    else {
      $image = "NULL";
    }
  }
  else{
    $image = "NULL";
  }


  // Picture Finish Encrypt==-------------

    $sql = "INSERT INTO `UserDatabase` (`UserID`, `Email`, `Password`, `Level`, `Upvotes`, `Name`, `Icon`) VALUES ('".$max_num."', '".$_POST['Email']."', '".$_POST['Password']."', '1', '0', '".$_POST['Names']."', ".$image.")";
    $records = $conn->query($sql);
    if ($records)
    {
      session_start();
      $_SESSION['loggedin'] = true;
      $_SESSION['UserID'] = $max_num;
      $_SESSION["Email"] = $_POST['Email'];
      // echo ("Uploaded SUCCESSFULLY");
      echo "<script language='javascript'>\n";
  		echo "alert('Register successful'); window.location.href='../MyProfile.php';";
  		echo "</script>\n";
    }
    else{
      echo ("Error: " . $conn->error);
      echo ("$sql");
    }

}



?>
