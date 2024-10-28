<!-- logout.php - The main logout file that you'll call -->
<?php
require_once 'config.php';
require_once 'logout_functions.php';

if (performLogout()) {
    header("Location: login.php");
    exit();
} else {
    header("Location: login.php?error=not_logged_in");
    exit();
}
?>