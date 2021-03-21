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

    <a href="Login.php">Login</a>

    <form  action="./php/UploadUser.php" method="post" enctype="multipart/form-data">

    <fieldset>
    <legend><h1>Register</h1></legend>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="Email"><b>Email: </b></label>
    <input type="email" placeholder="Enter Email" name='Email' id='Email'required><br><br>

    <label for="Names"><b>Names: </b></label>
    <input type="text" placeholder="Enter your names" name='Names' id='Names'required><br><br>

    <label for="Password"><b>Password: </b></label>
    <input type="password" placeholder="Enter Password" name='Password' id='Password'required><br><br>

    <label for="ConfirmPassword"><b>Confirm password: </b></label>
    <input type="password" placeholder="Confirm Password" name='Confirm Password' id='Confirm Password'required><br><br>

    <label for="files"><b>Profile Picture: </b></label>
    <input type="file" name="file" required><br><br>

    <p>By creating an account you agree to our <a href="Terms.php">Terms & Privacy</a>.</p>
     <input type="submit" name="CreateAccount" class="Register-BTN" value="Register">
     </fieldset>
     </form>


  </body>
