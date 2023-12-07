<?php
session_start();

// Unset all session variables used in your application
unset($_SESSION['id']);
unset($_SESSION['username']);
unset($_SESSION['email']);

// Destroy the session
session_destroy();

// Delete the auto_login cookie by setting its expiration time in the past
// if (isset($_COOKIE['auto_login'])) {
//     setcookie('auto_login', '', time() - 3600, '/');
// }

// Redirect to the index page
header('Location: login.php');
exit();
