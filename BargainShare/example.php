<!DOCTYPE html>

<html lang="en">
  <head>
    <title>BargainShare</title>
    <meta charset="utf-8">
    <link rel="icon" href="./images/logo.png">
    <link rel="stylesheet" type="text/css" href="./styles/navbar.css">
    <link rel="stylesheet" type="text/css" href="./styles/ProductList.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <!--  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->

  <head>
  <body>
    <header>
      <nav>
        <img class="logo" src="./images/logo.png" alt="BargainShare Logo">
        <a class="left-link" href="index.php">Home</a>
        <a class="left-link" href="Bargains.php">Bargains</a>
        <a class="left-link" href="Forum.html">Forum</a>
        <a class="left-link" href="Extensions.html">Extensions</a>
        <a class="left-link" href="About.html">About</a>
        <form action="/search.php">
          <input type="text" placeholder="Search..">
          <button type="submit"><i class="fa fa-search"></i></button>
        </form>
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
    </header>

    <div class="container">
      <h2>New Arrivals</h2>
      <div class="row">
      <div class="col-md-3">
      <div class="product-top">
      <img src="./images/p1.jpg">
        <div class="overlay">
        <button type="button" class="btn btn-secondary" title="Show info"><i class="fa fa-eye"></i></button>
        <button type="button" class="btn btn-secondary" title="Add to favourite"><i class="fa fa-star"></i></button>
        <button type="button" class="btn btn-secondary" title="Like"><i class="fa fa-heart"></i></button>
        </div>
      </div>
      <div class="product-bottom text-center">
        <h3>Name</h3>
        <h5>price</h5>
      </div>
      </div>

      <div class="col-md-3">
      <div class="product-top">
      <img src="./images/p2.jpg">
        <div class="overlay">
        <button type="button" class="btn btn-secondary" title="Show info"><i class="fa fa-eye"></i></button>
        <button type="button" class="btn btn-secondary" title="Add to favourite"><i class="fa fa-star"></i></button>
        <button type="button" class="btn btn-secondary" title="Like"><i class="fa fa-heart"></i></button>
        </div>
      </div>
      <div class="product-bottom text-center">
        <h3>Name</h3>
        <h5>price</h5>
      </div>
      </div>

      <div class="col-md-3">
      <div class="product-top">
      <img src="./images/p3.jpg">
        <div class="overlay">
        <button type="button" class="btn btn-secondary" title="Show info"><i class="fa fa-eye"></i></button>
        <button type="button" class="btn btn-secondary" title="Add to favourite"><i class="fa fa-star"></i></button>
        <button type="button" class="btn btn-secondary" title="Like"><i class="fa fa-heart"></i></button>
        </div>
      </div>
      <div class="product-bottom text-center">
        <h3>Name</h3>
        <h5>price</h5>
      </div>
      </div>
      </div>
    </div>

    <h1><?php include 'ConnectDb.php';?></h1>

  </body>
