<!DOCTYPE html>
<html lang="en">
<head>
	<title>Product Register</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" href="./images/logo.png">
	<link rel="stylesheet" type="text/css" href="./styles/ProductPost.css">
	<link rel="stylesheet" type="text/css" href="./styles/navbar.css">
</head>
<body>
	<header>
		<?php include './php/NavBar.php';?>
		<?php
		if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
				header("location: Login.php");
				exit;
		} ?>
	</header>
	<form class="PostProduct" action="./php/UploadProductPost.php" method="post" enctype="multipart/form-data">
		<fieldset>
			<legend><h1>Create Post</h1></legend>
			<p>Please fill in this form to create a post.</p>
			<hr>

			<label for="ItemName"><b>ItemName*: </b></label>
			<input type="text" placeholder="Enter ItemName" name='ItemName' id='ItemName'required><br><br>

			<label for="Source"><b>URL: </b></label>
			<input type="text" placeholder="Enter URL" name='Source' id='Source'><br><br>

			<label for ="ItemType"><b>Category*: </b></label>
			<select name="ItemType" id="ItemType">
				<option value="Home & Interior">Home & Interior</option>
				<option value="Garden & Patio">Garden & Patio</option>
				<option value="Kids & Family">Kids & Family</option>
				<option value="Toys & Hobbies">Toys & Hobbies</option>
				<option value="Gaming & Entertainment">Gaming & Entertainment</option>
				<option value="Computing">Computing</option>
				<option value="Phones & Wearables">Phones & Wearables</option>
				<option value="Sound & Vision">Sound & Vision</option>
				<option value="Photography">Photography</option>
				<option value="Clothing & Accessories">Clothing & Accessories</option>
				<option value="Health & Beauty">Health & Beauty</option>
				<option value="Sports & Outdoor">Sports & Outdoor</option>
				<option value="Do it yourself">Do it yourself</option>
        <option value="Motor Transport">Motor Transport</option>
        <option value="Others">Others</option>
			</select><br><br>

			<label for="Original Price"><b>Price: </b></label>
			<input type="number" step="0.01" placeholder="Enter Price" name='Price' id='Price'><br><br>

			<label for="Discounted Price"><b>Discounted Price*: </b></label>
			<input type="number" step="0.01" placeholder="Enter Discount" name='Discount' id='Discount'required><br><br>

			<label for="DiscountValidDate"><b>DiscountValidDate: </b></label>
			<input type="date" placeholder="Enter DiscountValidDate" name='DiscountValidDate' id='DiscountValidDate'><br><br>


			<label for="files"><b>Main Image*: </b></label>
			<p>This will displayed with priority over the other images</p>
			<input type="file" name="file" required><br><br>

			<label for="files"><b>Additional Images: </b></label>
			<p>You can choose one or more images</p>
			<input type="file" name="images[]" multiple><br><br>


			<label for="Message"><b>Message: </b></label>
			<textarea  rows="10" cols="50" name="Message" id="Message"></textarea><br><br>

			<input type="hidden" name="UserID" value='<?php echo $_SESSION['UserID']; ?>'>

			<p>By creating a post you agree to our <a href="Terms.php">Terms & Privacy</a>.</p>
			<input type="submit" name="UploadProductPost" class="ProductPost-Btn" value="Post">
		</fieldset>
	</form>
</body>
</html>
