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

		if(mysqli_num_rows($result) == 1){
			echo "Email: ".$row['Email'];
			echo "  ";			
			echo "Password: ".$row['Password'];
			echo "  ";
			echo "Level:".$row['Level'];
			echo "  ";
			echo "Name: ".$row['Name'];
			echo "  ";
		}



?>

   <div class="main">
	<form  action="./php/EditUser.php" method="POST" enctype="multipart/form-data" >
      <fieldset>
      <legend><h1>Edit Profile</h1></legend>
      <p>Please enter your password ,Name and Icon to chnage.</p>
      <hr>

      <label for="Name"><b>Name: </b></label>
      <input type="Name" placeholder="Enter Name" name='Name' id='Name' value = '<?php echo $row['Name'];?>'required><br><br>


      <label for="Password"><b>Password: </b></label>
      <input type="password" placeholder="Enter Password" name='Password' value = '<?php echo $row['Password'];?>'id='Password'required><br><br>

 <!--     <label for="files"><b>Profile Picture: </b></label>
   	 <input type="file" name="file" value = '<?php echo $row['Icon'];?>' required><br><br>

 -->
       <input type="submit"  class="submit-BTN" value="submit">
       </fieldset>
     </form>

</div>
  </body>
