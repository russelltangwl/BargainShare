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
      <?php include './php/NavBar.php';?>
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

    <a class="Create post"href="ForumCreatePost.php"><i class="fa fa-pencil-square-o"></i>Create Forum Post</a>

  <?php
            include './php/ConnectDb.php';

            $sql = "SELECT * FROM ForumPostsDatabase";
            $result = $conn->query($sql);

            if ($result->num_rows > 0){
              echo "<table><tr>
                                <th>Title</th>
                                <th>Post Description</th>
                                <th>Upvotes</th>
                                <th>Posted by</th>
                    </tr>";
              while ($row = $result->fetch_assoc()) {
                echo "
                <tr>

                <td overflow: hidden><a href='ForumViewPost.php?PostID=".$row["PostID"]."'>" . $row["Title"] . "</a></td>
                <td><a href='ForumViewPost.php?PostID=".$row["PostID"]."'>" . $row["PostContent"] . "</a></td>
                <td><a href='ForumViewPost.php?PostID=".$row["PostID"]."'>" . $row["NoOfUpvotes"] . "</a></td>
                <td><a href='ForumViewPost.php?PostID=".$row["PostID"]."'>" . $row["UserID"] . "</a></td>

                </tr>";
              }
              echo "</table>";
            } else {
                echo "No posts found, why not be the first to make one?";
            }






   $conn->close();
  ?>






  </body>
