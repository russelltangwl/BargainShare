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
    box-shadow: 0px 35px 50px rgba( 0, 0, 0, 0.2 );
    }

    td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
    }

    tr:nth-child(even) {
    background-color: #dddddd;
    }

    th:nth-child(odd) {
    color: #ffffff;
    background: #324960;
}

    tr:nth-child(even) {
    background: #F8F8F8;
}

    </style>

    <a class="Create post"href="ForumCreatePost.php"><i class="fa fa-pencil-square-o"></i>Create Forum Post</a>

  <?php
            include './php/ConnectDb.php';

            $sql = "SELECT * FROM ForumPostsDatabase";
            $result = $conn->query($sql);

            $sql2 = "SELECT UserID, Name FROM ForumPostsDatabase";
            $result2 = $conn->query($sql2);

            if ($result->num_rows > 0){
              echo "
              <style>
              table {
                width:100%;
              }
              table, th, td {
                border: 1px solid lightgrey;
                border-collapse: collapse;
              }
              th, td {
                max-width: 150px;
                word-wrap: break-word;
                text-overflow:ellipsis;
                overflow:hidden;
                white-space:nowrap;
              }

              </style>
              <div style='margin: 30px'>
              <table>
                    <tr>
                                <th>Title</th>
                                <th>Post Description</th>
                                <th>Upvotes</th>
                                <th>Posted by</th>
                    </tr>";
              while ($row = $result->fetch_assoc()) {
                echo "
                <tr>

                <td><a href='ForumViewPost.php?PostID=".$row["PostID"]."'>" . $row["Title"] . "</a></td>
                <td><a href='ForumViewPost.php?PostID=".$row["PostID"]."'>" . $row["PostContent"] . "</a></td>
                <td><a>" . $row["NoOfUpvotes"] . "</a></td>";

                // Get Name
                $sql ="SELECT * FROM `UserDatabase` WHERE UserID =". $row['UserID'];
                $result2 = $conn->query($sql);
                $row2 = $result2->fetch_assoc();

                echo "<td><a>" . $row2["Name"] . "</a></td>

                </tr>";
              }

              echo "</table></div>";
            } else {
                echo "No posts found, why not be the first to make one?";
            }






   $conn->close();
  ?>






  </body>
