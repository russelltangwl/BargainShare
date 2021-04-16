<!DOCTYPE html>

<html lang="en">
  <head>
    <title>BargainShare</title>
    <meta charset="utf-8">
    <link rel="icon" href="./images/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="./styles/navbar.css">
    <link rel="stylesheet" type="text/css" href="./styles/ProductList.css">
    <link rel="stylesheet" type="text/css" href="./styles/Homepage.css">
  </head>
  <body>
    <header>
      <div class="backimage" >
            <nav id="navbar">
            <img class="logo" src="./images/logo.png" alt="BargainShare Logo">
            <a class="left-link" href="index.php">Home</a>
            <a class="left-link" href="Bargains.php">Bargains</a>
            <a class="left-link" href="Forum.php">Forum</a>
            <a class="left-link" href="About.php">About</a>
            <div class="MyAccount-container">
              <?php
                session_start();
                include './php/ConnectDb.php';
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

        <div class="Wrapper">
          <div class="Search">
            <h1 class="title"><b>Bargain Share</b></h1>
            <h3><i>search and compare</i></h3>
            <form action="Search.php" method="GET">
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
            <input type="text" placeholder="Search.." name="search" id="search">
            <button type="submit"><i class="fa fa-search"></i></button>
            </form>
          </div>
        </div>
      </div>
    </header>

    <!-- Product List -->
    <div class="ProductList">
      <div class="row">
        <h3><b>Hottest</b></h3>
       <!--  <a href="Bargains.php">see more details</a> -->
        <?php
          include './php/Hottest.php';
          for ($i=0; $i <7 ; $i++) {
            echo "<div class='col-md-3'>";
            echo "<div class='product-top'>";
            echo "<img src='".$Productimage[$i]."'>";
            echo "<div class='overlay'>";
            echo ("<button  type='button' class='btn btn-secondary' title='Show info' onclick =\"location.href ='ViewProductPost.php?PostID=".$ProductID[$i]."'\"><i class='fa fa-eye'></i></button>");
            echo "<button type='button' class='btn btn-secondary' title='Add to favourite'onclick='window.location.href=`./php/FavoriteDB.php?FavoritePost=".$ProductID[$i]."`'><i class='fa fa-star'></i>";
            echo "<button onclick='window.location.href=`./php/ToggleLike.php?LikePost=".$ProductID[$i]."`' type='button' class='btn btn-secondary' title='Like'><i class='fa fa-heart'></i></button>";
            echo "</div>";
            echo "</div>";
            echo "<div class='product-bottom text-center'>";
            echo "<h4>".$ProductName[$i]."</h4>";
            echo "<h5> £".$ProductPrice[$i]."</h5>";
            echo "</div>";
            echo "</div>";
        } ?>
      </div>
      <hr>

      <div class="row">
        <h3><b>New Arrival</b></h3>
        <?php
            include './php/NewArrival.php';
            for ($i=0; $i <7 ; $i++) {
            echo "<div class='col-md-3'>";
            echo "<div class='product-top'>";
            echo "<img src='".$Productimage[$i]."'>";
            echo "<div class='overlay'>";
            echo "<button type='button' class='btn btn-secondary' title='Show info' onclick =\"location.href ='ViewProductPost.php?PostID=".$ProductID[$i]."'\"><i class='fa fa-eye'></i></button>";
            echo "<button type='button' class='btn btn-secondary' title='Add to favourite'onclick='window.location.href=`./php/FavoriteDB.php?FavoritePost=".$ProductID[$i]."`'><i class='fa fa-star'></i>";
            echo "<button onclick='window.location.href=`./php/ToggleLike.php?LikePost=".$ProductID[$i]."`' type='button' class='btn btn-secondary' title='Like'><i class='fa fa-heart'></i></button>";
            echo "</div>";
            echo "</div>";
            echo "<div class='product-bottom text-center'>";
            echo "<h4>".$ProductName[$i]."</h4>";
            echo "<h5> £".$ProductPrice[$i]."</h5>";
            echo "</div>";
            echo "</div>";
        } ?>


      </div>
      <hr>

    </div>
  </body>
