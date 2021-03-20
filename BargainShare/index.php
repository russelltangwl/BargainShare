<!DOCTYPE html>

<html lang="en">
  <head>
    <title>BargainShare</title>
    <meta charset="utf-8">
    <link rel="icon" href="./images/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="./styles/ProductList.css">
    <link rel="stylesheet" type="text/css" href="./styles/Homepage.css">
  <head>
  <body>
    <header>

    </header>
    <div class="backimage">
      <nav>
        <img class="logo" src="./images/logo.png" alt="BargainShare Logo">
        <a class="left-link" href="index.php">Home</a>
        <a class="left-link" href="Bargains.php">Bargains</a>
        <a class="left-link" href="Forum.php">Forum</a>
        <a class="left-link" href="Extensions.php">Extensions</a>
        <a class="left-link" href="About.php">About</a>
        <div class="MyAccount-container">
          <button><i onclick="toggleNotification(this)" class="fa fa-bell"></i></button>
          <script>
          function toggleNotification(x) {
            x.classList.toggle("fa-bell-slash");
          }
          </script>
          <div class="MyAccount-link">
            <button class="MyAccount-btn">My Account<i class="fa fa-caret-down"></i></button>
            <div class="MyAccount-content">
              <a href="MyProfile.html">My Profile</a>
              <a href="MyFavourite.html">My Favourite</a>
              <a href="MyPost.html">My Post</a>
              <a href="LogOut.html">Log Out</a>
            </div>
          </div>
        </div>
      </nav>
      <div class="Wrapper">
        <div class="Search">
          <h1 class="title"><b>Bargain Share</b></h1>
          <h3><i>search and compare</i></h3>
          <form action="/search.php">
          <input type="text" placeholder="Search..">
          <button type="submit"><i class="fa fa-search"></i></button>
          </form>
        </div>
      </div>
    </div>


    <!-- Product List -->
    <div class="ProductList">
      <div class="row">
        <h3><b>Best Seller</b></h3>
       <!--  <a href="Bargains.php">see more details</a> -->
        <?php
          include './php/Bestseller.php';
          for ($i=0; $i <7 ; $i++) {
            echo "<div class='col-md-3'>";
            echo "<div class='product-top'>";
            echo "<img src='".$Productimage[$i]."'>";
            echo "<div class='overlay'>";
            echo "<button type='button' class='btn btn-secondary' title='Show info'><i class='fa fa-eye'></i></button>";
            echo "<button type='button' class='btn btn-secondary' title='Add to favourite'><i class='fa fa-star'></i>";
            echo "<button type='button' class='btn btn-secondary' title='Like'><i class='fa fa-heart'></i></button>";
            echo "</div>";
            echo "</div>";
            echo "<div class='product-bottom text-center'>";
            echo "<h4>".$ProductName[$i]."</h4>";
            echo "<h5>".$ProductPrice[$i]."</h5>";
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
            echo "<button type='button' class='btn btn-secondary' title='Show info'><i class='fa fa-eye'></i></button>";
            echo "<button type='button' class='btn btn-secondary' title='Add to favourite'><i class='fa fa-star'></i>";
            echo "<button type='button' class='btn btn-secondary' title='Like'><i class='fa fa-heart'></i></button>";
            echo "</div>";
            echo "</div>";
            echo "<div class='product-bottom text-center'>";
            echo "<h4>".$ProductName[$i]."</h4>";
            echo "<h5>".$ProductPrice[$i]."</h5>";
            echo "</div>";
            echo "</div>";
        } ?>


      </div>
      <hr>

    </div>
  </body>
