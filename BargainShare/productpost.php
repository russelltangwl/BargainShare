<!DOCTYPE html>
<html lang="en">
<head>
	<title>Product Register</title>
	 <meta charset="utf-8">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	 <link rel="icon" href="./images/logo.png">
    <link rel="stylesheet" type="text/css" href="./styles/productpoststyle.css">
    <link rel="stylesheet" type="text/css" href="./styles/navbar.css">
<!--     <style>
      div#register {
          width:50%;
          margin-left: auto;
          margin-right: auto;
        }
    </style> -->

</head>
<body>
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
      <div id = "register">
        <fieldset>
        <legend><h1>Register</h1></legend>
        <p>Please fill in this form to create a product.</p>
        <hr>

        <label for="ItemName"><b>ItemName</b></label>
        <input type="text" placeholder="Enter ItemName" name='ItemName' id='ItemName'required><br><br>

        <label for="Source"><b>URL</b></label>
        <input type="text" placeholder="Enter URL" name='Source' id='Source'required><br><br>

        <label for="ItemType"><b>ItemType</b></label>
        <input type="text" placeholder="Enter ItemType" name='ItemType' id='ItemType'required><br><br>

        <label for="Price"><b>Price</b></label>
        <input type="text" placeholder="Enter Price" name='Price' id='Price'required><br><br>

        <label for="Discount"><b>Discount</b></label>
        <input type="text" placeholder="Enter Discount" name='Discount' id='Discount'required><br><br>

        <label for="DiscountValidDate"><b>DiscountValidDate</b></label>
        <input type="date" placeholder="Enter DiscountValidDate" name='DiscountValidDate' id='DiscountValidDate'required><br><br>

        <label for="Image"><b>Image</b></label> 
        <input type="file" name="file"><br><br>
       

        <label for="Message"><b>Message</b></label>
        <textarea  rows="10" cols="50" name="Message" id="Message"></textarea><br><br>

        <p>By creating an product you agree to our <a href="#">Terms & Privacy</a>.</p>
         <input type="submit" name="UploadImage" class ="registerbtn"value="Upload">
      </div>
      </fieldset>
    </form>
</body>
</html>
