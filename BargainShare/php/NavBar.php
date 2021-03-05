<!-- Include this in header tag -->

<!DOCTYPE html>

<nav>
  <img class="logo" src="./images/logo.png" alt="BargainShare Logo">
  <a class="left-link" href="index.php">Home</a>
  <a class="left-link" href="Bargains.php">Bargains</a>
  <a class="left-link" href="Forum.php">Forum</a>
  <a class="left-link" href="Extensions.php">Extensions</a>
  <a class="left-link" href="About.php">About</a>
  <form action="/search.php">
    <input type="text" placeholder="Search..">
    <button type="submit"><i class="fa fa-search"></i></button>
  </form>
  <div class="MyAccount-container">
    <button><i onclick="toggleNotification(this)" class="fa fa-bell"></i></button>
    <script>
    function toggleNotification(x) {
      x.classList.toggle("fa-bell-slash");
    }
    </script>
    <div class="MyAccount-link">
      <button class="MyAccount-btn">My Account<i class="fa fa-caret-down"></i></button>
      <div class="MyAccount-content">
        <a href="MyProfile.html">My Profile</a>
        <a href="MyFavourite.html">My Favourite</a>
        <a href="MyPost.html">My Post</a>
        <a href="LogOut.html">Log Out</a>
      </div>
    </div>
  </div>
</nav>
