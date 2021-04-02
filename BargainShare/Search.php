<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Bargains-BargainShare</title>
    <meta charset="utf-8">
    <link rel="icon" href="./images/logo.png">
    <link rel="stylesheet" type="text/css" href="./styles/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="./styles/ProductList.css">
  </head>
  <body>
    <header>
      <?php include './php/NavBar.php';?>
    </header>

 <?php
  $category = $_GET['category'];

  if ($category == "All department") {

  // Array of each colums
  $ProductName = [];
  $ProductType = [];
  $ProductPrice = [];
  $ProductDiscount = [];
  $ProductValidDate = [];
  $ProductNoOfUpVote = [];
  $ProductMessage = [];
  $ProductImgCount = [];
  $ProductSource = [];
  $ProductDate = [];
  $ProductUserID = [];
  $Productimage =[];
  $ProductID =[];

 include './php/ConnectDb.php';

 //Get search value
 $str = $_GET['search'];

 //find the value in the database
  $sql = "SELECT * FROM ProductPostsDatabase WHERE ItemName LIKE '%".$str."%'  ORDER BY NoOfUpVotes DESC";
  $result = $conn->query($sql);
  $count=mysqli_num_rows($result);


  if($count ==0){
    echo ("No Result for '" .$_GET['search'] ."'");
  }
  else{

// put the value inthe each array
  while($row = $result->fetch_assoc()){
    $ProductID[] = $row["PostID"];
    $ProductName[] = $row["ItemName"];
    $ProductType[] = $row["ItemType"];
    $ProductPrice[] = $row["Discount"];
    // $ProductDiscount[] = $row["Discount"];
    $ProductValidDate[] = $row["DiscountValidDate"];
    $ProductNoOfUpVote[] = $row["NoOfUpVotes"];
    $ProductMessage[] = $row["Message"];
    $ProductImgCount[]  = $row["ImageCount"];
    $ProductSource[] = $row["Source"];
    $ProductDate[] =$row["Date"];
    $ProductUserID[] = $row["UserID"];


    //Find the main image
    $image = "SELECT ImageData FROM ImageDatabase WHERE ImageIndex=0 and PostID = ".$row["PostID"];
    $imageresult = $conn -> query($image);
    $imagerow = $imageresult->fetch_assoc();
    $Productimage[] = $imagerow["ImageData"];


    }
        echo "Search Result for '" .$_GET['search'] ."'";
        echo "<div class='ProductList'>";
        echo "<div class='row'>";
         for ($i=0; $i <$count ; $i++) {
            echo "<div class='col-md-3'>";
            echo "<div class='product-top'>";
            echo "<img src='".$Productimage[$i]."'>";
            echo "<div class='overlay'>";
            echo ("<button  type='button' class='btn btn-secondary' title='Show info' onclick =\"location.href ='ViewProductPost.php?PostID=".$ProductID[$i]."'\"><i class='fa fa-eye'></i></button>");
            echo "<button type='button' class='btn btn-secondary' title='Add to favourite'onclick =\"location.href ='MyFavourite.php'\"><i class='fa fa-star'></i>";
            echo "<button type='button' class='btn btn-secondary' title='Like'><i class='fa fa-heart'></i></button>";
            echo "</div>";
            echo "</div>";
            echo "<div class='product-bottom text-center'>";
            echo "<h4>".$ProductName[$i]."</h4>";
            echo "<h5> £".$ProductPrice[$i]."</h5>";
            echo "</div>";
            echo "</div>";
            if ($i % 6 == 0 && $i != 0) {
            echo "</div>";
            echo "<div class='row'>";
            echo "<hr>";
            }
        }
        echo "</div>";
        echo "</div>";

      }
  }
  else{

  // Array of each colums
  $ProductName = [];
  $ProductType = [];
  $ProductPrice = [];
  $ProductDiscount = [];
  $ProductValidDate = [];
  $ProductNoOfUpVote = [];
  $ProductMessage = [];
  $ProductImgCount = [];
  $ProductSource = [];
  $ProductDate = [];
  $ProductUserID = [];
  $Productimage =[];
  $ProductID =[];

 include './php/ConnectDb.php';

 //Get search value
 $str = $_GET['search'];

 //find the value in the database
  $sql = "SELECT * FROM ProductPostsDatabase WHERE ItemName LIKE '%".$str."%' AND ItemType = '".$category."'";
  $result = $conn->query($sql);
  $count=mysqli_num_rows($result);


  if($count ==0){
    echo ("No Result for '" .$_GET['search'] ."'");
  }
  else{

// put the value inthe each array
  while($row = $result->fetch_assoc()){
    $ProductID[] = $row["PostID"];
    $ProductName[] = $row["ItemName"];
    $ProductType[] = $row["ItemType"];
    $ProductPrice[] = $row["Discount"];
    // $ProductDiscount[] = $row["Discount"];
    $ProductValidDate[] = $row["DiscountValidDate"];
    $ProductNoOfUpVote[] = $row["NoOfUpVotes"];
    $ProductMessage[] = $row["Message"];
    $ProductImgCount[]  = $row["ImageCount"];
    $ProductSource[] = $row["Source"];
    $ProductDate[] =$row["Date"];
    $ProductUserID[] = $row["UserID"];


    //Find the main image
    $image = "SELECT ImageData FROM ImageDatabase WHERE ImageIndex=0 and PostID = ".$row["PostID"];
    $imageresult = $conn -> query($image);
    $imagerow = $imageresult->fetch_assoc();
    $Productimage[] = $imagerow["ImageData"];


    }
        echo "Search Result for '" .$_GET['search'] ."'";
        echo "<div class='ProductList'>";
        echo "<div class='row'>";
         for ($i=0; $i <$count ; $i++) {
            echo "<div class='col-md-3'>";
            echo "<div class='product-top'>";
            echo "<img src='".$Productimage[$i]."'>";
            echo "<div class='overlay'>";
            echo ("<button  type='button' class='btn btn-secondary' title='Show info' onclick =\"location.href ='ViewProductPost.php?PostID=".$ProductID[$i]."'\"><i class='fa fa-eye'></i></button>");
            echo "<button type='button' class='btn btn-secondary' title='Add to favourite'onclick =\"location.href ='MyFavourite.php'\"><i class='fa fa-star'></i>";
            echo "<button onclick='window.location.href=`./php/ToggleLike.php?LikePost=".$ProductID[$i]."`' type='button' class='btn btn-secondary' title='Like'><i class='fa fa-heart'></i></button>";
            echo "</div>";
            echo "</div>";
            echo "<div class='product-bottom text-center'>";
            echo "<h4>".$ProductName[$i]."</h4>";
            echo "<h5> £".$ProductPrice[$i]."</h5>";
            echo "</div>";
            echo "</div>";
            if ($i % 6 == 0 && $i != 0) {
            echo "</div>";
            echo "<div class='row'>";
            echo "<hr>";
            }
        }
        echo "</div>";
        echo "</div>";

      }
  }


      $conn->close();


 ?>



  </body>
