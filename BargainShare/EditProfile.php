<!DOCTYPE html>
<html lang="en">
  <head>
    <title>My Profile-BargainShare</title>
    <meta charset="utf-8">
    <link rel="icon" href="./images/logo.png">
    <link rel="stylesheet" type="text/css" href="./styles/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="./styles/ViewProductPost.css">
     <link rel="stylesheet" type="text/css" href="./styles/AccountNavBar.css">
  </head>
  <body>
    <header>
      <?php include './php/NavBar.php'; ?>
    </header>

    <?php
    	include './php/AccountNavBar.php';
		$sql ="SELECT * FROM `UserDatabase` WHERE UserID =". $_SESSION['UserID'];
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();



?>

   <div class="main">
	<form  action="./php/EditUser.php" method="POST" enctype="multipart/form-data" >
      <fieldset>
      <legend><h1>Edit Profile</h1></legend>
      <p>Please enter your name & password to change.</p>
      <hr>

      <label for="Name"><b>Name: </b></label>
      <input type="Name" placeholder="Enter Name" name='Name' id='Name' value = '<?php echo $row['Name'];?>'required><br><br>


      <label for="Password"><b>Password: </b></label>
      <input type="password" placeholder="Enter Password" name='Password' value = '<?php echo $row['Password'];?>'id='password'required><br><br>

      <label for="Password"><b>Confirm Password: </b></label>
      <input type="password" placeholder="Enter Password" name='Confirm_Password' value = '<?php echo $row['Password'];?>'id='confirm_password'required><br><br>

       <input type="submit"  class="submit-BTN" value="save">
       </fieldset>
     </form>

</div>

<!-- Password Validation -->
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
