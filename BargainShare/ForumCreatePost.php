<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Create Post</title>
    <meta charset="utf-8">
    <link rel="icon" href="./images/logo.png">
    <link rel="stylesheet" type="text/css" href="./styles/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="./styles/forumStyle.css">
  </head>
  <body>
	
    <header>
      <?php include './php/NavBar.php'?>
    </header>
	
	<p>
		 

		<h1>Create new post</h1>

		<form action="./php/ForumPostSubmit.php" method="POST">
		  <label for="title">Title:</label><br>
		  <input type="text" id="title" name="title"><br><br>
		  
		  <label for="description">Description:</label><br>
		  <textarea name="description" cols="40" rows="5"></textarea><br><br>
		  
		  <input type="submit" onClick="alert('Submitting post...')" value="Submit">
		</form>

		<p>Click the "Submit" button and the form-data will be sent to a page on the 
		server called "ForumPostSubmit.php".</p>
		 

	</p>
  </body>
