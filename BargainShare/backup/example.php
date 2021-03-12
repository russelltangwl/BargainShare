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
      <?php include './php/NavBar.php'?>
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
