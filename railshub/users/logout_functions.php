<!-- logout_functions.php - Contains all logout related functions -->
<?php

// To connect to the database
require_once '../config.php';

// To get the database connection
function getDBConnection() {
    $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        return $conn;
    }
}

function updateLogoutTime($userId) {
    $conn = getDBConnection();
    $sql = "UPDATE users SET last_logout = NOW() WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $userId);
    $result = mysqli_stmt_execute($stmt);
    mysqli_close($conn);
    return $result;
}

function destroySession() {
    // Unset all session variables
    $_SESSION = array();
    
    // Destroy the session cookie
    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time()-3600, '/');
    }
    
    // Destroy the session
    session_destroy();
}

function performLogout() {
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