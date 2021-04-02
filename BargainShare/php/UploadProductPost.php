<?php
# UPLOAD IMAGE TO SQL SUCCESSFULLY
include 'ConnectDb.php';

if(isset($_POST['UploadProductPost'])){

  // Max PostID
  $sql = "SELECT IFNULL(max(PostID),0)+1 FROM `ProductPostsDatabase`" ;
  $result = $conn->query($sql);
  if (!$result){
    echo ("Error: " . $conn->error);
  }
  $row = mysqli_fetch_array($result);
  $max_PostID = $row[0];

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

    $sql = "SELECT IFNULL(max(ImageID),0)+1 FROM `ImageDatabase`" ;
    $result = $conn->query($sql);
    if (!$result){
      echo ("Error: " . $conn->error);
    }
    $row = mysqli_fetch_array($result);
    $max_ImageID = $row[0];

    $sql = "INSERT INTO `ImageDatabase` (`PostID`,`ImageID`, `ImageData`, `SourceDatabase`, `ImageIndex`) VALUES ('".$max_PostID."','".$max_ImageID."','".$image."','P',0)";
    $records = $conn->query($sql);
    if (!$records){
      echo ("Error: " . $conn->error);
      echo ("$sql");
    }

    $ImageCount = 0;

    //$files = array_filter($_FILES['upload']['name']); //something like that to be used before processing files.

    // Count # of uploaded files in array

    if($_FILES["images"]["name"][0] != ""){
      $ImageCount = count($_FILES['images']['name']);
      // Loop through each file
      for( $i=1 ; $i < $ImageCount+1 ; $i++ ) {

        $name = $_FILES['images']['name'];
        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES["images"]["name"][$i-1]);

        // Select file type
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Valid file extensions
        $extensions_arr = array("jpg","jpeg","png","gif");

        if( in_array($imageFileType,$extensions_arr) ){

          // Convert to base64
          $image_base64 = base64_encode(file_get_contents($_FILES['images']['tmp_name'][$i-1]) );
          $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;

          // Get Max ImageID
          $sql = "SELECT IFNULL(max(ImageID),0)+1 FROM `ImageDatabase`" ;
          $result = $conn->query($sql);
          if (!$result){
            echo ("Error: " . $conn->error);
          }
          $row = mysqli_fetch_array($result);
          $max_ImageID = $row[0];

          $sql = "INSERT INTO `ImageDatabase` (`PostID`,`ImageID`, `ImageData`, `SourceDatabase`, `ImageIndex`) VALUES ('".$max_PostID."','".$max_ImageID."','".$image."','P',".$i.")";
          $records = $conn->query($sql);
          if (!$records){
            echo ("Error: " . $conn->error);
            echo ("$sql");
          }
          }
        }
        }
    }


    // Count The Main Image as well
    $ImageCount = $ImageCount + 1;
    // NULL CATCHER
    if($_POST['Price'] == ''){
      $_POST['Price'] = "NULL";
    }
    else{
      $_POST['Price'] = "'".$_POST['Price']."'";
    }
    if($_POST['DiscountValidDate'] == ''){
      $_POST['DiscountValidDate'] = "NULL";
    }
    else{
      $_POST['DiscountValidDate'] = "'".$_POST['DiscountValidDate']."'";
    }
    $sql = "INSERT INTO `ProductPostsDatabase` (`PostID`, `ItemName`, `Source`, `ItemType`, `Price`, `Discount`, `DiscountValidDate`, `ImageCount`,`Message`, `UserID`, `Date`, `NoOfUpVotes`) VALUES ('".$max_PostID."', '".$_POST['ItemName']."', '".$_POST['Source']."', '".$_POST['ItemType']."', ".$_POST['Price'].", '".$_POST['Discount']."', ".$_POST['DiscountValidDate'].", '".$ImageCount."','".$_POST['Message']."', '".$_POST['UserID']."', CURRENT_TIMESTAMP, '0')";
    echo $sql;
    $records = $conn->query($sql);
    if ($records)
    {
      // echo ("Uploaded SUCCESSFULLY");
      echo "<script language='javascript'>\n";
      echo "window.location.href='../ViewProductPost.php?PostID=$max_PostID';";
      echo "</script>\n";
      exit;
    }
    else{
      echo $conn->error;
      echo "<script language='javascript'>\n";
      // Return to ProductPost if not Successful
      echo "alert('Upload Not Successful'); window.location.href='../ProductPost.php';";
      echo "</script>\n";
    }
  }
?>
