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
	<?php include 'dbconnection.php';?>
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
    <h1>Registeration Page </h1>

  	<?php getproductDetails(); ?> 
  

</body>
</html>
<?php
function getproductDetails(){
	include 'dbconnection.php';
	$regForm = "
	 <form method='POST' action='productpost.php'>
	 <label>PostID:</label>
	<input type='varchar(30)' name='PostID' id='PostID'><br>
	 <label>ItemName:</label>
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
	 <button>Register</button>
	</form> ";

	echo($regForm);
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

	$sql = "INSERT INTO `ProductPostsDatabase` (`PostID`, `ItemName`, `Source`, `ItemType`, `Price`, `Discount`, `DiscountValidDate`, `Image`, `UserID`, `Date`) VALUES ('".$_POST[PostID]."', '".$_POST[ItemName]."', '".$_POST[Source]."', '".$_POST[ItemType]."', '".$_POST[Price]."', '".$_POST[Discount]."', '".$_POST[DiscountValidDate]."', '0', '2', CURRENT_TIMESTAMP)";
    $records = $conn->query($sql);
    if ($records)
    {
      echo ("Connected");
    }
    else{
      echo ("Error: " . $conn->error);
      echo ("$sql");
    }
  }

function chnageimage(){

}


?>
