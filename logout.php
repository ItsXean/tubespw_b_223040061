<?php
session_start(); // Add this line to start the session

// Destroy the session and unset all session variables
session_destroy();
$_SESSION = array();

// Redirect to the login page
header("Location: home.php");
exit();
