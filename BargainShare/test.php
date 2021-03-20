<?php
include './php/ConnectDb.php';
$sql = "SELECT ImageData FROM ImageDatabase WHERE PostID = $GET['PostID'] AND SourceDatabase = 'P' AND ImageIndex = 0";
$result = $conn->query($sql);
$row = mysqli_fetch_array($result);
$image = $row['ImageData'];



 ?>
<img src='<?php echo $image; ?>'>
