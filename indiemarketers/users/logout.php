<!-- logout.php - The main logout file that you'll call -->
<?php
require_once '../config.php';
require_once 'logout_functions.php';

if (performLogout()) {
    header("Location: /rovergigs/railsdevs/index.php");
    exit();
} else {
    header("Location: /rovergigs/railsdevs/index.php?error=not_logged_in");
    exit();
}
?>