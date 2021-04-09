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

    <form  action="./php/UploadUser.php" method="post" enctype="multipart/form-data">

    <fieldset>
      <div class="SigninNavBar">
        <a class="OffPage" href="Login.php">Login</a>
        <h5 class="OnPage">Register</h5>
      </div>
    <br><br>

    <label for="Email"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name='Email' id='Email'required><br><br>

    <label for="Names"><b>Name</b></label>
    <input type="text" placeholder="Enter your names" name='Names' id='Names'required><br><br>

    <label for="Password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name='Password' id='password'required><br><br>

    <label for="ConfirmPassword"><b>Confirm password</b></label>
    <input type="password" placeholder="Confirm Password" name='Confirm Password' id='confirm_password'required><br><br>

    <label for="files"><b>Profile Picture</b></label>
    <input type="file" name="file"><br><br>

    <p>By creating an account you agree to our Terms & Privacy.</p>
    <br>
     <input type="submit" name="CreateAccount" class="Register-BTN" value="Register">
     </fieldset>
     </form>

     <script type="text/javascript">
        var password = document.getElementById("password")
         , confirm_password = document.getElementById("confirm_password");

        function validatePassword(){
         if(password.value != confirm_password.value) {
           confirm_password.setCustomValidity("Passwords Don't Match");
         } else {
           confirm_password.setCustomValidity('');
         }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;

     </script>


  </body>
