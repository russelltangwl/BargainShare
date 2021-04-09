<div class="sidenav">
  <?php
    $UserID = $_SESSION['UserID'];
    // GET USER ICON
    $sql = "SELECT Name,Icon,Level FROM UserDatabase WHERE UserID = ". $UserID;
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $UserLevel = $row['Level'];
    $UserName = $row["Name"];
    if($row["Icon"] === NULL){
      $ProfilePic = "./images/nullProfilePic.png";
    }
    else{
      $ProfilePic = $row["Icon"];
    }
   ?>
  <div class="UpperProfile">
    <div class="Profile">
      <img class="ProfilePic" src="<?php echo $ProfilePic; ?>" alt="Profile Pic">
      <div class="Overlay"> 
          <button type="button" class='btn myBtn' id="myBtn">Edit Profile Pic</button>
          <div id="myModal" class="modal">
              <!-- Modal content -->
              <div class="modal-content">
                <div class="modal-header">
                  <span class="close">&times;</span>
                  <h2>Edit Pic</h2>
                </div>
                <div class="modal-body">
                  <form  action="./php/EditUser.php" method="POST" enctype="multipart/form-data" >
            <fieldset>
            <legend><h1>Edit Profile</h1></legend>
            <hr>
           <label for="files"><b>Profile Picture: </b></label>
           <input type="file" name="file" value = '<?php echo $row['Icon'];?>' required><br><br>
           <br><br>
             <input type="submit"  class="submit-BTN" value="submit">
             </fieldset>
           </form>
                </div>
              </div>
            </div>
      </div>
    </div>
  <h3><?php echo $UserName; ?></h3>
  </div>
  <div class="LowerProfile">
  <a href="MyProfile.php">MyProfile</a>
  <a href="MyFavorite.php">My Favourite</a>
  <a href="MyPost.php">My Post</a>
  <a href="LogOut.php">Log Out</a>
  </div>
</div>
<!-- 
<script type="text/javascript">
  function changePic(){
    document.write("<link rel='stylesheet' type='text/css' href='./styles/ViewProductPost.css'>")
    document.write("<form  action='./php/EditUser.php' method='POST' enctype='multipart/form-data' >")
    document.write("<fieldset>")
    document.write("<legend><h1>Edit Profile</h1></legend>")
    document.write("<label for='files'><b>Profile Picture: </b></label>")
    document.write("<input type='file' name='file' value = '<?php echo $row['Icon'];?>' required><br><br>")
    document.write("<input type='submit'  class='submit-BTN' value='submit'>")
    document.write("</fieldset>")
    document.write("</form>")

  }


</script> -->

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
