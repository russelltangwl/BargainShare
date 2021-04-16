<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Forum-BargainShare</title>
    <meta charset="utf-8">
    <link rel="icon" href="./images/logo.png">
    <link rel="stylesheet" type="text/css" href="./styles/MainForum.css">
    <link rel="stylesheet" type="text/css" href="./styles/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <header>
      <?php include './php/NavBar.php';?>
    </header>
    <style>


    </style>
    <div >
      <a href="ForumCreatePost.php" class="CreatePost"><i class="fa fa-pencil-square-o"></i>     Create Forum Post</a>

      <form class="SearchForum ForumTopBar" action="Forum.php" method="get">
        <input name="search" type="text" placeholder="Search..">
        <button type="submit"><i class="fa fa-search"></i></button>
      </form>
    </div>
  <?php

    if(isset($_GET['search'])){
      $condition = " WHERE Title LIKE '%".$_GET['search']."%' OR PostContent LIKE '%".$_GET['search']."%'";
    }
    else{
      $condition = "";
    }
            include './php/ConnectDb.php';

            $sql = "SELECT * FROM ForumPostsDatabase".$condition;
            $result = $conn->query($sql);
            $count=mysqli_num_rows($result);
            if ($count == 0) {
              if (isset($_GET['search'])) {
                echo ("No Result for '" .$_GET['search'] ."'");
              }
              else {
                echo ("No Result");
              }
            }
            else{
              if (isset($_GET['search'])) {
                echo ("Results for '" .$_GET['search'] ."'");
              }
              echo"<div class='ForumTable'>";
              echo"<table>
                    <tr>
                      <th class='col1'>Forum</th>
                      <th class='col2'>Posts</th>
                      <th class='col3'>Upvotes</th>
                      <th class='col4'>Last Post</th>
                    </tr>";
              while ($row = $result->fetch_assoc()) {

                echo "<tr>
                <td  class='col1'><a href='ForumViewPost.php?PostID=".$row["PostID"]."'>" . $row["Title"] . "</a><br>";

                $sql ="SELECT * FROM `UserDatabase` WHERE UserID =". $row['UserID'];
                $result2 = $conn->query($sql);
                $row2 = $result2->fetch_assoc();


                echo "Posted By ".$row2['Name']."</td>";

                $sql2 = "SELECT * FROM CommentDatabase WHERE SourceDatabase = 'F' AND PostID = ".$row['PostID'];
                $result2 = $conn->query($sql2);
                if (!$result2) {
                  echo $conn->error;
                }
                $row2 = $result2->fetch_assoc();
                $noComment = mysqli_num_rows($result2);

                echo "<td  class='col2'>" . $noComment . "</td>";

                echo "<td  class='col3'>" . $row["NoOfUpvotes"] . "</td>";

                $sql2 = "SELECT * FROM CommentDatabase WHERE SourceDatabase = 'F' AND PostID = ".$row['PostID']." ORDER BY CommentID DESC";
                $result2 = $conn->query($sql2);
                if (!$result2) {
                  echo $conn->error;
                }
                $row2 = $result2->fetch_assoc();
                if(!isset($row2["CommentContent"])){
                    echo "<td  class='col4'>None</td>";
                }
                else{
                  $comment = $row2["CommentContent"];

                  $sql2 = "SELECT * FROM `UserDatabase` WHERE UserID =". $row2['UserID'];
                  $result2 = $conn->query($sql2);
                  $row2 = $result2->fetch_assoc();

                  echo "<td  class='col4'><b>" . $comment . "</b><br>Posted by ".$row2['Name']."</td>";
                }

                echo "</tr>";
              }

              echo "</table></div>";
            }






   $conn->close();
  ?>






  </body>
