<?php

require 'config.php';
$_SESSION = [];
// 
session_start();

// Unset all session variables
session_unset();

// Destroy the session(back to normal webpages)
session_destroy();

// back to the main page where the message will be please log in in red colour
header("Location: myWeb.php");
exit;

