<!DOCTYPE html>
<html lang="en">
<head>
	<title>Product Register</title>
	 <meta charset="utf-8">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	 <link rel="icon" href="./images/logo.png">
    <link rel="stylesheet" type="text/css" href="./styles/navbar.css">
</head>
<body>
	<?php include 'ConnectDb.php';?>
	<header>
      <nav>
        <img class="logo" src="./images/logo.png" alt="BargainShare Logo">
        <a class="left-link" href="index.php">Home</a>
        <a class="left-link" href="Bargains.html">Bargains</a>
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
      <form action="Upload.php" method="post" enctype="multipart/form-data">
     <!-- <label>ItemName:</label>
    <input type='varchar(30)' name='ItemName' id='ItemName'><br>
     <label>Source:</label>
    <input type='text' name='Source' id='Source'><br>
     <label>ItemType:</label>
    <input type='varchar(30)' name='ItemType' id='ItemType'><br>
     <label>Price:</label>
    <input type='double' name='Price' id='Price'><br>
    <label>Discount:</label>
    <input type='double' name='Discount' id='Discount'><br>
    <label>DiscountValidDate:</label>
    <input type='double' name='DiscountValidDate' id='DiscountValidDate'><br>
     <label>Select Image File to Upload:</label>
      <input type="file" name="file"><br>
      <input type="submit" name="UploadImage" value="Register"> -->
      <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create a product.</p>
    <hr>

    <label for="ItemName"><b>ItemName</b></label>
    <input type="varchar(30)" placeholder="Enter ItemName" name='ItemName' id='ItemName'required><br>

    <label for="Source"><b>URL</b></label>
    <input type="text" placeholder="Enter URL" name='Source' id='Source'required><br>

    <label for="ItemType"><b>ItemType</b></label>
    <input type="varchar(30)" placeholder="Enter ItemType" name='ItemType' id='ItemType'required><br><br>

    <label for="Price"><b>Price</b></label>
    <input type="double" placeholder="Enter Price" name='Price' id='Price'required><br><br>

    <label for="Discount"><b>Discount</b></label>
    <input type="double" placeholder="Enter Discount" name='Discount' id='Discount'required><br><br>

    <label for="DiscountValidDate"><b>DiscountValidDate</b></label>
    <input type="double" placeholder="Enter DiscountValidDate" name='DiscountValidDate' id='DiscountValidDate'required><br><br>

    <label for="Image"><b>Image</b></label>
    <input type="file" name="file"><br><br>


    <label for="message"><b>Message</b></label>
    <textarea rows="10" cols="50" name="message" id="message"></textarea><br><br>

    <p>By creating an product you agree to our <a href="#">Terms & Privacy</a>.</p>
     <input type="submit" name="UploadImage" value="Upload">
  </div>

    </form>
<!--
  	<?php getproductDetails(); ?>
   -->

</body>
</html>
<?php
//function getproductDetails(){
	//include 'ConnectDb.php';
  	// $regForm = "
  	//  <form method='POST' action='ProductPost.php'>
  	//  <label>ItemName:</label>
  	// <input type='varchar(30)' name='ItemName' id='ItemName'><br>
  	//  <label>Source:</label>
  	// <input type='text' name='Source' id='Source'><br>
  	//  <label>ItemType:</label>
  	// <input type='varchar(30)' name='ItemType' id='ItemType'><br>
  	//  <label>Price:</label>
  	// <input type='double' name='Price' id='Price'><br>
  	// <label>Discount:</label>
  	// <input type='double' name='Discount' id='Discount'><br>
  	// <label>DiscountValidDate:</label>
  	// <input type='double' name='DiscountValidDate' id='DiscountValidDate'><br>
  	//  <button>Register</button>
  	// </form> ";

  	// echo($regForm);
	// $PostID =mysqli_real_escape_string($conn,$_POST['PostID']);
	// $ItemName =mysqli_real_escape_string($conn,$_POST['ItemName']);
	// $Source =mysqli_real_escape_string($conn,$_POST['Source']);
	// $ItemType =mysqli_real_escape_string($conn,$_POST['ItemType']);
	// $Price =mysqli_real_escape_string($conn,$_POST['Price']);
	// $Discount =mysqli_real_escape_string($conn,$_POST['Discount']);
	// $DiscountValidDate =mysqli_real_escape_string($conn,$_POST['DiscountValidDate']);
	// $UserID =2;
	// $Date =227;
	// $Image =0;

 //  $max_postid = "SELECT IFNULL(max(PostID),0)+1 FROM `ProductPostsDatabase`" ;
 //  $result = $conn->query($max_postid);
 //  if ($result)
 //      {
 //        echo ("Connected");
 //      }
 //      else{
 //        echo ("Error: " . $conn->error);
 //        echo ("$max_postid");
 //      }
 //  $row = mysqli_fetch_array($result);
 //  $max_num = $row[0];

	// $sql = "INSERT INTO `ProductPostsDatabase` (`PostID`, `ItemName`, `Source`, `ItemType`, `Price`, `Discount`, `DiscountValidDate`, `Image`, `UserID`, `Date`) VALUES ('".$max_num."', '".$_POST[ItemName]."', '".$_POST[Source]."', '".$_POST[ItemType]."', '".$_POST[Price]."', '".$_POST[Discount]."', '".$_POST[DiscountValidDate]."', '0', '2', CURRENT_TIMESTAMP)";
 //    $records = $conn->query($sql);
 //    if ($records)
 //    {
 //      echo ("Connected");
 //    }
 //    else{
 //      echo ("Error: " . $conn->error);
 //      echo ("$sql");
 //    }
 //  }


?>
