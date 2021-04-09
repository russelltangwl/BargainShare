<div class="sidenav">
  <?php
    $UserID = $_SESSION['UserID'];
    // GET USER ICON
    $sql = "SELECT Name,Icon,Level FROM UserDatabase WHERE UserID = ". $UserID;
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $UserLevel = $row['Level'];
    $UserName = $row["Name"];
    if($row["Icon"] === NULL){
      $ProfilePic = "./images/nullProfilePic.png";
    }
    else{
      $ProfilePic = $row["Icon"];
    }
   ?>
  <div class="UpperProfile">
  <img class="ProfilePic" src="<?php echo $ProfilePic; ?>" alt="Profile Pic">
  <h3><?php echo $UserName; ?></h3>
  </div>
  <div class="LowerProfile">
  <a href="EditProfile.php">Edit Profile</a>
  <a href="MyFavorite.php">My Favourite</a>
  <a href="MyPost.php">My Post</a>
  <a href="LogOut.php">Log Out</a>
  </div>
</div>
