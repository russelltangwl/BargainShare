<!DOCTYPE html>
<html lang="en">
  <head>
    <title>My Profile-BargainShare</title>
    <meta charset="utf-8">
    <link rel="icon" href="./images/logo.png">
    <link rel="stylesheet" type="text/css" href="./styles/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="./styles/AccountNavBar.css">
  </head>
  <body>
    <header>
      <?php include './php/NavBar.php'; ?>
    </header>

    <?php include './php/AccountNavBar.php'; ?>

    <div class="main">
      <?php
      // Check if the user is logged in, if not then redirect him to login page
      if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
          header("location: Login.php");
          exit;
      }
      ?>

    <a href="Register.php">Register</a>
    <a href="Login.php">Login</a>
    <p> User email: <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) echo ($_SESSION["Email"]); ?></p>
    <p> User ID: <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) echo ($_SESSION["UserID"]); ?></p>
    <a href="LogOut.php">Log Out</a>
    <br>


  
    <!-- <button type='button' onclick = 'window.location.href=`./EditProfile.php`'>Edit Profile</button> -->

    </div>


</body>
