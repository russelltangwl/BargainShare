<?php
  session_start();
  include 'ConnectDb.php';

  if (isset($_POST['Password'])&& isset($_POST['Name'])) {
    $sql = "UPDATE `UserDatabase` SET `Password`='".$_POST['Password']."',`Name` ='".$_POST['Name']."' WHERE UserID ='".$_SESSION['UserID']."'";
    $result = $conn->query($sql);
  }
  else{
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

  // Picture Finish Encrypt==-------------

    $sql = "UPDATE `UserDatabase` SET `Icon` = '".$image."' WHERE UserID ='".$_SESSION['UserID']."'";
    $result = $conn->query($sql);

  }
  }


  echo "<script language='javascript'>\n";
  echo "alert('User detail Edited Successfully'); window.location.href='../MyProfile.php';";
  echo "</script>\n";

?>
