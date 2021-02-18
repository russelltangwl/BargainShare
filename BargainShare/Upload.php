<?php
# UPLOAD IMAGE TO SQL SUCCESSFULLY
include 'ConnectDb.php';

if(isset($_POST['UploadImage'])){

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

    // Insert record
    $sql = "INSERT INTO `ProductPostsDatabase` (`PostID`, `ItemName`, `Source`, `ItemType`, `Price`, `Discount`, `DiscountValidDate`, `Image`, `UserID`, `Date`) VALUES ('1', 'Testing', 'Testing Website', 'Testing', '3', '2', '2021-02-27', '" . $image . "', '1', CURRENT_TIMESTAMP)";
    $records = $conn->query($sql);
    if ($records)
    {
      echo ("Connected");
    }
    else{
      echo ("Error: " . $conn->error);
      echo ("$sql");
    }
  }

}
?>
<a href="DownloadImage.php"> Display Image </a>
