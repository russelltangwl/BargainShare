<?php
// Initialize the session
session_start();

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true)

 {
// Unset all of the session variables
$_SESSION = array();



// Redirect to index page

echo "<script language='javascript'>\n";
echo "alert('Log out successful'); window.location.href='index.php';";
echo "</script>\n";

exit;

// Destroy the session.
session_destroy();
}
else
{

  echo "<script language='javascript'>\n";
echo "alert('You are not logged in. Therefore, you cannot log out'); window.location.href='MyProfile.php';";
echo "</script>\n";
}

?>
