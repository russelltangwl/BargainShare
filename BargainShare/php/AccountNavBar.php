<div class="sidenav">
  <?php
    $UserID = $_SESSION['UserID'];
    // GET USER ICON
    $sql = "SELECT Name,Icon FROM UserDatabase WHERE UserID = ". $UserID;
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $UserName = $row["Name"];
    if($row["Icon"] === NULL){
      $ProfilePic = "./images/nullProfilePic.png";
    }
    else{
      $ProfilePic = $row["Icon"];
    }
   ?>
  <img src="<?php echo $ProfilePic; ?>" alt="Profile Pic">
  <h2><?php echo $UserName; ?></h2>
  <a href="MyProfile.php">My Profile</a>
  <a href="MyFavorite.php">My Favourite</a>
  <a href="My Post.php">My Post</a>
  <a href="LogOut.php">Log Out</a>
</div>
