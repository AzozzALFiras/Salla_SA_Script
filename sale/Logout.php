<?php
// Developer By : Azozz ALFiras
// 2021/10/1

// Initialize the session
session_start();

// Unset all of the session variables
$_SESSION = array();

// Destroy the session.
session_destroy();

// Redirect to login page
header("location: Login.php");
exit;
?>
