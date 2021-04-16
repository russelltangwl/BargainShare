<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Create Post</title>
    <meta charset="utf-8">
    <link rel="icon" href="./images/logo.png">
    <link rel="stylesheet" type="text/css" href="./styles/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="./styles/ForumPost.css">
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





	<form class="PostForum" action="./php/ForumPostSubmit.php" method="POST">
	<fieldset>
	  <legend><h1>Create Post</h1></legend>
	  <label for="title">Title:</label><br>
	  <input type="text" id="title" name="title"><br><br>

	  <label for="description">Description:</label><br>
	  <textarea id="descriptionbox" name="description" cols="40" rows="5"></textarea><br><br>

	  <input type="submit" onClick="alert('Submitting post...')" value="Submit">
	  <p>Click the "Submit" button and the form-data will be sent to a page on the
		server called "ForumPostSubmit.php" qwer!!!!!.</p>
	</fieldset>
	</form>





  </body>
