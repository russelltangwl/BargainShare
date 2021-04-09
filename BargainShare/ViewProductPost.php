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
        // Get Main Pic
        $sql = "SELECT ImageData FROM ImageDatabase WHERE PostID = ". $_GET['PostID']  ." AND SourceDatabase = 'P' AND ImageIndex = 0";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);
        $ProductImage = $row['ImageData'];
      }
      else {
        echo "More than 1 results";
      }


      if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        $UserID = $_SESSION['UserID'];
        // GET USER ICON
        $sql = "SELECT Name,Icon FROM UserDatabase WHERE UserID = ". $UserID;
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $ProductUserName = $row["Name"];
        if($row["Icon"] === NULL){
          $ProfilePic = "./images/nullProfilePic.png";
        }
        else{
          $ProfilePic = $row["Icon"];
        }



        //LIKE Function
        $_SESSION['LikePost'] = $_GET['PostID'];
        $sql = "SELECT * FROM LikeDatabase WHERE SourceDatabase = 'P' AND PostID = ".$_GET['PostID']." AND UserID = ". $UserID;
        $result = $conn->query($sql);
        if (!$result) {
          echo $conn->error;
        }
        $row = $result->fetch_assoc();
        if(mysqli_num_rows($result) == 1){
          $LikeColor = "red";

        }
        else{
          $LikeColor = "black";
        }
        }
        else{
          $LikeColor = "black";
        }

        // Count Comment
        $sql = "SELECT * FROM CommentDatabase WHERE SourceDatabase = 'P' AND PostID = ".$_GET['PostID'];
        $result = $conn->query($sql);
        if (!$result) {
          echo $conn->error;
        }
        $row = $result->fetch_assoc();
        $noComment = mysqli_num_rows($result);

        //Report
        $sql = "SELECT * FROM ReportDatabase WHERE SourceDatabase = 'P' AND PostID = ".$_GET['PostID'];
        $result = $conn->query($sql);
        if (!$result) {
          echo $conn->error;
        }
        $row = $result->fetch_assoc();
        if(mysqli_num_rows($result)>0){
          echo "<script>result = confirm('This Post has been Reported. It may contain some Inappropriate Data. Do you still want to go in?')
                                if(!result){window.location.href = 'index.php';} </script>";
          echo "<h2 style='color:red;text-align: center;'>This Post has been Reported. It may contain some Inappropriate Data.</h2>";
        }

    ?>
    <div class="ViewPostContainer">
      <div class="SkipLine">
        <?php echo "<img class='ProfilePic' src='" .$ProfilePic. "' alt='Profile Picture'>"; ?>
        <?php echo "<h2>" . $ProductUserName . "</h2>"; ?>
      </div>

      <div class="ProductPicNDetails">
        <div class="ProductMainPic">
          <?php echo "<img src='" .$ProductImage. "' alt='Product Image'>"; ?>
          <div class="NumberBar">
            <?php echo "<button><i style='color: ".$LikeColor."' onclick='window.location.href=`./php/ToggleLike.php`' class='fa fa-heart fa-lg'></i></button><h5>".$ProductUpvote."</h5>";?>
            <i class="fa fa-comment"><?php echo $noComment ?></i>
            <?php echo "<button id='myBtn'><i class='fa fa-flag fa-lg'></i></button>";?>

            <!-- The Modal -->
            <div id="myModal" class="modal">

              <!-- Modal content -->
              <div class="modal-content">
                <div class="modal-header">
                  <span class="close">&times;</span>
                  <h2>Report</h2>
                </div>
                <div class="modal-body">
                  <form class="Report" action="./php/UploadReport.php" method="post">
                    <h3>Why are you reporting this post?</h3>
                    <select name="ReportType">
                      <option value="Nudity or Sexual Activity">Nudity or Sexual Activity</option>
                      <option value="Hate Speech or Symbols">Hate Speech or Symbols</option>
                      <option value="Sale of Illegal or Regulated Goods">Sale of Illegal or Regulated Goods</option>
                      <option value="Scam or Fraud">Scam or Fraud</option>
                      <option value="False Information">False Information</option>
                    </select><br><br>
                    <input type="hidden" name="PostID" value='<?php echo $_GET['PostID']; ?>'>
                    <input type="hidden" name="SourceDatabase" value='P'>
                    <input type="submit" name="UploadReport" class="Report-Btn" value="Submit">
                  </form>
                </div>
                <div class="modal-footer">
                  <h4>Admins will review this manually in 6 to 7 working days</h4>
                </div>
              </div>

            </div>

          </div>
        </div>
        <div class="ProductDetails">
          <?php echo "<h4>Category: " . $ProductCategory . "</h4>"; ?>
          <div class="ProductDetails-Line2">
            <?php echo "<h1>" . $ProductName . "</h1>"; ?>
          </div>
          <div class="ProductDetails-Line3">
            <?php echo "<h3>Original Price: £" . $ProductPrice . "</h3>"; ?>
            <?php echo "<h2>Discounted Price: £" . $ProductDiscount . "</h2>"; ?>
            <?php echo "<h4>Valid Until: " . $ProductValidDate . "</h4>"; ?>
          </div>
          <div class="ProductMessage">
            <?php echo "<h5>" . $ProductMessage . "</h5>"; ?>
          </div>
        </div>
        <div class="AdditionalImgBlock">
          <?php
          include './php/ConnectDb.php';
          $sql = "SELECT ImageData,ImageIndex FROM ImageDatabase WHERE PostID = ". $_GET['PostID']  ." AND SourceDatabase = 'P' ORDER BY ImageIndex";
          $result = $conn->query($sql);
          while ($row = $result->fetch_assoc()){
            if($row['ImageIndex']!=0){
              if($row['ImageIndex']==1){
                echo "<h2>Other Images:</h2>";
              }
              echo "<img src='".$row['ImageData']."' alt='Additional Images'>";
            }
          } ?>
        </div>
      </div>
    </div>
    <div class="CommentBlock">
    <?php
      $Database = 'P';
      include './php/GetComments.php';
      ?>

      <!-- Add Comment Function -->
      <?php
      if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        echo "<div class='Comment''>
          <h2>Add Comment:</h2>
          <div class='SkipLine'>
            <img class='ProfilePic' src='" .$ProfilePic. "' alt='Profile Picture'>
            <h2>" . $ProductUserName . "</h2>
          </div>
          <form action='./php/UploadComment.php' method='post'>
            <label for='comment'>Comment:</label><br>
      		  <textarea name='comment' cols='40' rows='5'></textarea><br><br>

            <input type='hidden' name='postID' value='".$_GET['PostID']."'>
            <input type='hidden' name='userID' value='".$UserID."'>
            <input type='hidden' name='Database' value='P'>

            <input type='submit' name='UploadComment' value='Submit'>
          </form>
        </div>";
      }
      }


      ?>



    </div>

    <script>
        // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    btn.onclick = function() {
      modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
    </script>

  </body>
