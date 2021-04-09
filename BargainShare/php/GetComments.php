  <?php
  include "ConnectDb.php";

  //Get GetProductComments
  $sql = "SELECT * FROM CommentDatabase WHERE SourceDatabase = '".$Database."' AND PostID = ". $_GET['PostID'] ." ORDER BY Date";
  $result = $conn->query($sql);
  while ($row = $result->fetch_assoc()){
    $Message = $row['CommentContent'];
    $CommentDate = $row['Date'];
    $CommentUser = $row['UserID'];
    $CommentContent = $row['CommentContent'];


    // Get User Profile Pic
    $sql2 = "SELECT Name,Icon FROM UserDatabase WHERE UserID = ". $row["UserID"];
    $result2 = $conn->query($sql2);
    $row2 = $result2->fetch_assoc();
    $UserName = $row2["Name"];
    if($row2["Icon"] === NULL){
      $ProfilePic2 = "./images/nullProfilePic.png";
    }
    else{
      $ProfilePic2 = $row2["Icon"];
    }

    echo "<div class='Comment'>";
    echo "<div class='SkipLine'>";
    echo "<img class='ProfilePic' src='".$ProfilePic2."' alt='ProfilePic'>";
    echo "<h2>".$UserName."</h2>";
    echo "</div>";
    echo "<div class='CommentContent'>";
    echo "<h5>".$CommentContent."</h5>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
  }
  ?>
