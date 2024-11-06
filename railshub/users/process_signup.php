<?php
// Enable error reporting for debugging (remove in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// PHP file (process_signup.php)

// Include the path config. This is to make it easy to manage my URLs when I upload to production, that is cpanel
require_once '../config/paths.php';

// Database config file
require_once '../config/db.php';

// To enable database connection
$db = new Database();

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if email and password are set
    if (isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["username"])) {
        $email = $_POST["email"];
        $username = $_POST["username"];
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash the password

        // Prepare and bind
        $stmt = $db->prepare("INSERT INTO users (email, password, username) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $email, $password, $username);

        // Execute the statement
        if ($stmt->execute()) {
            echo "New user registered successfully";

                // Redirect to a welcome page or dashboard here 
                header("Location: " . path('home'));
            exit; // Terminate the script after redirecting
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close statement
        $stmt->close();
    } else {
        echo "Email and password are required.";
    }
}

// Close the database connection
$db->closeConnection();
?>