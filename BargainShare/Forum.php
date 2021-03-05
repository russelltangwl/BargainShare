<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Forum-BargainShare</title>
    <meta charset="utf-8">
    <link rel="icon" href="./images/logo.png">
    <link rel="stylesheet" type="text/css" href="./styles/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <header>
      <?php include './php/NavBar.php'?>
    </header>
    <style>
    table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
    }

    td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
    }

    tr:nth-child(even) {
    background-color: #dddddd;
    }
    </style>

    <?php
    $database_host = "dbhost.cs.man.ac.uk";
    $database_user = "x68617wc";
    $database_pass = "Y12Spirit";
    $database_name = "2020_comp10120_y12";
    $conn = mysqli_connect($database_host, $database_user, $database_pass,$database_name);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM ForumPostsDatabase";
    $result = $conn->query($sql);

    if ($result->num_rows > 0){
      echo "<table><tr><th>User ID</th><th>Title</th><th>Post Description</th><th>Upvotes</th></tr>";
      while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["UserID"] . "</td><td>" . $row["Title"] . "</td><td>" . $row["PostContent"] . "</td><td>" . $row["NoOfUpvotes"] . "</td></tr>";
      }
      echo "</table>";
    } else {
        echo "No posts found, why not be the first to make one?";
    }

    $conn->close();
    ?>


  </body>
