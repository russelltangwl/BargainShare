<!DOCTYPE html>
<html lang="en">
  <head>
    <title>My Profile-BargainShare</title>
    <meta charset="utf-8">
    <link rel="icon" href="./images/logo.png">
    <link rel="stylesheet" type="text/css" href="./styles/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="./styles/Myprofile.css">
  </head>
  <body>
    <header>
      <?php include './php/NavBar.php'; ?>
    </header>

    <div class="main">
      <?php
      // Check if the user is logged in, if not then redirect him to login page
      if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
          header("location: Login.php");
          exit;
      }
      ?>
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
   <div class="row">

  <div class="UpperProfile">
    <div class="Profile">
      <img class="ProfilePic" src="<?php echo $ProfilePic; ?>" alt="Profile Pic">
      <div class="Overlay">
          <button type="button" class='btn myBtn' id="myBtn">Edit Profile Pic</button>
          <div id="myModal" class="modal">
              <!-- Modal content -->
              <div class="modal-content">
                <div class="modal-header">
                  <span class="close">&times;</span>
                  <h2>Edit Profile Picture</h2>
                </div>
                <div class="modal-body">
                  <form  action="./php/EditUser.php" method="POST" enctype="multipart/form-data" >
            <fieldset>
              <p>Change your profile picture by uploading a image.</p>
            <hr>
           <label for="files"><b>Profile Picture: </b></label>
           <input type="file" name="file" value = '<?php echo $row['Icon'];?>' required><br><br>

             <input type="submit"  class="submit-BTN" value="save">
             </fieldset>
           </form>
                </div>
              </div>
            </div>
      </div>
    </div>
    <h3><?php echo $UserName; ?></h3>
    <h5> User email: <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) echo ($_SESSION["Email"]); ?></h5>
  </div>
  <div class ="Edit"> <button type='button' id="EditProfile" onclick = 'window.location.href=`./EditProfile.php`'>Edit Profile</button> </div>
  
  
  <div class="LowerProfile">
  <a href="MyProfile.php">My Profile</a>
  <br>
  <a href="MyFavourite.php">My Favourite</a>
  <br>
  <a href="MyPost.php">My Post</a>
  <br>
  <a href="LogOut.php">Log Out</a>
  </div>
</div>
</div>

    <script>
        // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    btn.onclick = function() {
      modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
    </script>

    </div>


</body>
