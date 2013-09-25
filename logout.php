<?php

session_start();

// if the user is logged in, unset the session
if (isset($_SESSION['username'])) {
   unset($_SESSION['username']);
}

session_destroy();

// now that the user is logged out,
// go to login page
header('Location: main.php?');

?>
