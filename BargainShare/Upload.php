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

  //Insert all data
  $max_postid = "SELECT IFNULL(max(PostID),0)+1 FROM `ProductPostsDatabase`" ;
  $result = $conn->query($max_postid);
  if ($result)
      {
        echo ("PostID Gotten");
      }
      else{
        echo ("Error: " . $conn->error);
        echo ("$max_postid");
      }
  $row = mysqli_fetch_array($result);
  $max_num = $row[0];

  $sql = "INSERT INTO `ProductPostsDatabase` (`PostID`, `ItemName`, `Source`, `ItemType`, `Price`, `Discount`, `DiscountValidDate`, `Image`,`Message`, `UserID`, `Date`) VALUES ('".$max_num."', '".$_POST['ItemName']."', '".$_POST['Source']."', '".$_POST['ItemType']."', '".$_POST['Price']."', '".$_POST['Discount']."', '".$_POST['DiscountValidDate']."', '".$image."','".$_POST['Message']."', '2', CURRENT_TIMESTAMP)";
    $records = $conn->query($sql);
    if ($records)
    {
      echo ("Uploaded SUCCESSFULLY");
    }
    else{
      echo ("Error: " . $conn->error);
      echo ("$sql");
    }
  }


}
?>
