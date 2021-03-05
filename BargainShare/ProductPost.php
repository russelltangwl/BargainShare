<!DOCTYPE html>
<html lang="en">
<head>
	<title>Product Register</title>
	 <meta charset="utf-8">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	 <link rel="icon" href="./images/logo.png">
    <link rel="stylesheet" type="text/css" href="./styles/ProductPost.css">
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
        <a class="left-link" href="Forum.php">Forum</a>
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
    <form class="PostProduct" action="Upload.php" method="post" enctype="multipart/form-data">
        <fieldset>
        <legend><h1>Create Post</h1></legend>
        <p>Please fill in this form to create a post.</p>
        <hr>

        <label for="ItemName"><b>ItemName: </b></label>
        <input type="text" placeholder="Enter ItemName" name='ItemName' id='ItemName'required><br><br>

        <label for="Source"><b>URL: </b></label>
        <input type="text" placeholder="Enter URL" name='Source' id='Source'><br><br>

        <label for="ItemType"><b>ItemType: </b></label>
        <input type="text" placeholder="Enter ItemType" name='ItemType' id='ItemType'required><br><br>

        <label for="Original Price"><b>Price: </b></label>
        <input type="number" step="0.01" placeholder="Enter Price" name='Price' id='Price'required><br><br>

        <label for="Discounted Price"><b>Discount: </b></label>
        <input type="number" step="0.01" placeholder="Enter Discount" name='Discount' id='Discount'required><br><br>

        <label for="DiscountValidDate"><b>DiscountValidDate: </b></label>
        <input type="date" placeholder="Enter DiscountValidDate" name='DiscountValidDate' id='DiscountValidDate'required><br><br>

        <label for="Image"><b>Image: </b></label>
        <input type="file" name="file" id='Image'required><br><br>


        <label for="Message"><b>Message: </b></label>
        <textarea  rows="10" cols="50" name="Message" id="Message"></textarea><br><br>

        <p>By creating a post you agree to our <a href="Terms.php">Terms & Privacy</a>.</p>
         <input type="submit" name="UploadImage" class="ProcductPost-Btn" value="Post">
				 </fieldset>
				 </form>
</body>
</html>
