<!DOCTYPE html>
<html lang="en">
  <head>
    <title>My Profile-BargainShare</title>
    <meta charset="utf-8">
    <link rel="icon" href="./images/logo.png">
    <link rel="stylesheet" type="text/css" href="./styles/navbar.css">
    <link rel="stylesheet" type="text/css" href="./styles/Login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <header>
      <?php include './php/NavBar.php' ?>
    </header>

		<form  action="./php/LoadUser.php" method="post" >
      <fieldset>
        <div class="SigninNavBar">
          <h5 class="OnPage" >Login</h5>
          <a class="OffPage" href="Register.php">Register</a>
        </div>
      <img src="./images/logo.png" alt="BargainShare Logo">

      <label for="Email"><b>Email</b></label>
      <input type="email" placeholder="Enter Email" name='Email' id='Email'required><br><br>



      <label for="Password"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name='Password' id='Password'required><br><br>


       <input type="submit" name="Login" class="Login-BTN" value="Login">
       </fieldset>
     </form>

  </body>
