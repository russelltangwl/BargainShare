<!DOCTYPE html>
<html lang="en">
  <head>
    <title>My Profile-BargainShare</title>
    <meta charset="utf-8">
    <link rel="icon" href="./images/logo.png">
    <link rel="stylesheet" type="text/css" href="./styles/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <header>
      <?php include './php/NavBar.php' ?>
    </header>

    <a href="Register.php">Register</a>

		<form  action="./php/LoadUser.php" method="post" >
      <fieldset>
      <legend><h1>Log in</h1></legend>
      <p>Please enter yur password and email to log in.</p>
      <hr>

      <label for="Email"><b>Email: </b></label>
      <input type="email" placeholder="Enter Email" name='Email' id='Email'required><br><br>



      <label for="Password"><b>Password: </b></label>
      <input type="password" placeholder="Enter Password" name='Password' id='Password'required><br><br>


       <input type="submit" name="Login" class="Login-BTN" value="Login">
       </fieldset>
     </form>

  </body>
