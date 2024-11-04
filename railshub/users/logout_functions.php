<!-- logout_functions.php - Contains all logout related functions -->
<?php

// To connect to the database
require_once '../config/db.php';



function updateLogoutTime($userId)
{
    // Create a new Database instance
    $database = new Database();

    // Get the connection object
    $conn = $database->getConnection();

    $sql = "UPDATE users SET last_logout = NOW() WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $userId);
    $result = mysqli_stmt_execute($stmt);
    mysqli_close($conn);
    return $result;
}

function destroySession()
{
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session cookie
    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time() - 3600, '/');
    }

    // Destroy the session
    session_destroy();
}

function performLogout()
{
    session_start();

    if (isset($_SESSION['user_id'])) {
        $userId = $_SESSION['user_id'];
        updateLogoutTime($userId);
        destroySession();
        return true;
    }

    return false;
}
?>