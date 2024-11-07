<?php
// Ensure this is at the very top of your script
session_start(); // Start the session before any output

require_once '../config/db.php';
require_once '../config/paths.php';
require_once 'logout_functions.php';

if (performLogout()) {
    header("Location: " . path('home'));
    exit();
} else {
    header("Location: " . path('users', 'error_not_logged_in'));
    exit();
}
?>