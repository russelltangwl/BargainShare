      <!DOCTYPE html>
<html lang="en">
  <head>
    <title>Forum-BargainShare</title>
    <meta charset="utf-8">
    <link rel="icon" href="./images/logo.png">
    <link rel="stylesheet" type="text/css" href="./styles/navbar.css">
    <link rel="stylesheet" type="text/css" href="./styles/ViewProductPost.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css">
  </head>
  <body>
    <header>
      <?php include './php/NavBar.php'?>
    </header>
    <?php
    if(isset($_GET['PostID'])){
      include './php/ConnectDb.php';

      $sql = "SELECT * FROM ProductPostsDatabase WHERE PostID = ". $_GET['PostID'];
      $result = $conn->query($sql);

      if ($result->num_rows == 1) {
      // output data of each row
        $row = $result->fetch_assoc();

        $ProductName = $row["ItemName"];
        $ProductSource = $row["Source"];
        $ProductCategory = $row["ItemType"];
        $ProductPrice = $row["Price"];
        $ProductDiscount = $row["Discount"];
        $ProductValidDate = $row["DiscountValidDate"];
        $ProductImgCount = $row["ImageCount"];
        $ProductMessage = $row["Message"];
        $ProductUserID = $row["UserID"];
        $ProductDate = $row["Date"];
        $ProductUpvote = $row["NoOfUpVotes"];

        $sql = "SELECT Name,Icon FROM UserDatabase WHERE UserID = ". $row["UserID"];
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $ProductUserName = $row["Name"];
        if($row["Icon"] === NULL){
          $ProfilePic = "./images/nullProfilePic.png";
        }
        else{
          $ProfilePic = $row["Icon"];
        }

      }
      else {
        echo "More than 1 results";
      }

      $conn->close();

    }
    else{
      echo "<script language='javascript'>\n";
      // Return to BargainsPage if not Successful
      echo "alert('Invalid Page'); window.location.href='Bargains.php';";
      echo "</script>\n";
    }
    ?>
    <div class="ViewPostContainer">
      <div class="SkipLine">
        <?php echo "<img class='ProfilePic' src=" .$ProfilePic. " alt='Profile Picture'>"; ?>
        <?php echo "<h2>" . $ProductUserName . "<h2>"; ?>
      </div>

      <div class="ProductPicNDetails">
        <img class="ProductMainPic" src="./images/logo.png" alt="Product Picture">
        <div class="ProductDetails">
          <?php echo "<h5>Category: " . $ProductCategory . "</h5>"; ?>
          <div class="ProductDetails-Line2">
            <?php echo "<h1>" . $ProductName . "</h1>"; ?>
            <button type="button" name="AddFavorite">Add Category to Favorite</button>
          </div>
          <div class="ProductDetails-Line3">
            <?php echo "<h3>Original Price: £" . $ProductPrice . "</h3>"; ?>
            <?php echo "<h3>Discounted Price: £" . $ProductDiscount . "</h3>"; ?>
            <?php echo "<h5>Valid Until: " . $ProductValidDate . "</h5>"; ?>
          </div
        </div>
      </div>
      <div class="NumberBar">
        <?php echo "<button><i onclick='toggleLike(this)' class='fa fa-heart'></i></button><h5>$ProductUpvote<h5>";?>
        <i class="fa fa-comment">123</i>
      </div>
    </div>
    <div class="ProductMessage">
      <?php echo "<h5>" . $ProductMessage . "</h5>"; ?>
    </div>
  </body>
