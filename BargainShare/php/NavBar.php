<!-- Include this in header tag -->

<!DOCTYPE html>

<nav id="navbar">
  <img class="logo" src="./images/logo.png" alt="BargainShare Logo">
  <a class="left-link" href="index.php">Home</a>
  <a class="left-link" href="Bargains.php">Bargains</a>
  <a class="left-link" href="Forum.php">Forum</a>
  <a class="left-link" href="About.php">About</a>
  <form action="Search.php">
    <select name="category" id="category">
              <option>All department</option>
              <option value="Home & Interior">Home & Interior</option>
              <option value="Garden & Patio">Garden & Patio</option>
              <option value="Kids & Family">Kids & Family</option>
              <option value="Toys & Hobbies">Toys & Hobbies</option>
              <option value="Gaming & Entertainment">Gaming & Entertainment</option>
              <option value="Computing">Computing</option>
              <option value="Phones & Wearables">Phones & Wearables</option>
              <option value="Sound & Vision">Sound & Vision</option>
              <option value="Photography">Photography</option>
              <option value="Clothing & Accessories">Clothing & Accessories</option>
              <option value="Health & Beauty">Health & Beauty</option>
              <option value="Sports & Outdoor">Sports & Outdoor</option>
              <option value="Do it yourself">Do it yourself</option>
              <option value="Motor Transport">Motor Transport</option>
              <option value="Others">Others</option>
            </select>
    <input name="search" type="text" placeholder="Search..">
    <button type="submit"><i class="fa fa-search"></i></button>
  </form>
  <div class="MyAccount-container">
    <?php
      session_start();
      include 'ConnectDb.php';
      if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        $UserID = $_SESSION['UserID'];
        // GET USER ICON
        $sql = "SELECT Name,Icon FROM UserDatabase WHERE UserID = ". $UserID;
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $ProductUserName = $row["Name"];
        if($row["Icon"] === NULL){
          $ProfilePic = "./images/nullProfilePic.png";
        }
        else{
          $ProfilePic = $row["Icon"];
        }
        echo "<img class='ProfilePic' src='".$ProfilePic."' alt='Profile Pic'>";
      }
     ?>
    <div class="MyAccount-link">
      <button class="MyAccount-btn">My Account<i class="fa fa-caret-down"></i></button>
      <div class="MyAccount-content">
        <?php
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
            echo "<a href='MyProfile.php'>My Profile</a>";
            echo "<a href='MyFavourite.php'>My Favourite</a>";
            echo "<a href='MyPost.php'>My Post</a>";
            echo "<a href='LogOut.php'>Log Out</a>";
        }
        else {
          echo "<a href='Login.php'>Login</a>";
          echo "<a href='Register.php'>Register</a>";
        } ?>
      </div>
    </div>
  </div>
</nav>
