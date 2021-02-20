<?php
include 'dbconnection.php';

 $sql = "SELECT Image from ProductPostsDatabase WHERE PostID=1";
 $result = $conn->query($sql);
 $row = mysqli_fetch_array($result);
 $image = $row['Image'];
?>

<img src='<?php echo $image; ?>' >
