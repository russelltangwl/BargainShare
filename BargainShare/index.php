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
      <div class="backimage">
        <?php include './php/NavBar.php' ?>
        <div class="Wrapper">
          <div class="Search">
            <h1 class="title"><b>Bargain Share</b></h1>
            <h3><i>search and compare</i></h3>
            <form action="Search.php" method="GET">
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
            echo "<button type='button' class='btn btn-secondary' title='Add to favourite'onclick =\"location.href ='MyFavourite.php'\"><i class='fa fa-star'></i>";
            echo "<button type='button' class='btn btn-secondary' title='Like'><i class='fa fa-heart'></i></button>";
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
            echo "<button type='button' class='btn btn-secondary' title='Add to favourite'><i class='fa fa-star' onclick =\"location.href ='MyFavourite.php'\"></i>";
            echo "<button type='button' class='btn btn-secondary' title='Like'><i class='fa fa-heart'></i></button>";
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
