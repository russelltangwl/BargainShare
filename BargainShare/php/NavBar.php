<!-- Include this in header tag -->

<!DOCTYPE html>

<nav id="navbar">
  <img class="logo" src="./images/logo.png" alt="BargainShare Logo">
  <a class="left-link" href="index.php">Home</a>
  <a class="left-link" href="Bargains.php">Bargains</a>
  <a class="left-link" href="Forum.php">Forum</a>
  <a class="left-link" href="Extensions.php">Extensions</a>
  <a class="left-link" href="About.php">About</a>
  <form action="Search.php" method="GET">
    <input name="search" id="search" type="text" placeholder="Search..">
    <button type="submit"><i class="fa fa-search"></i></button>
  </form>
  <div class="MyAccount-container">
    <button><i onclick="toggleNotification(this)" class="fa fa-bell"></i></button>
    <div class="MyAccount-link">
      <button class="MyAccount-btn">My Account<i class="fa fa-caret-down"></i></button>
      <div class="MyAccount-content">
        <a href="MyProfile.php">My Profile</a>
        <a href="MyFavourite.php">My Favourite</a>
        <a href="MyPost.php">My Post</a>
        <a href="LogOut.php">Log Out</a>
      </div>
    </div>
  </div>
</nav>
<script>
function toggleNotification(x) {
  x.classList.toggle("fa-bell-slash");
}
</script>
