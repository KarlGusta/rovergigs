<?php
// PHP file (process_signin.php)

// Enable error reporting for debugging (remove in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the path config. This is to make it easy to manage my URLs when I upload to production, that is cpanel
require_once '../config/paths.php';

// Database config file
require_once '../config/db.php';

// To enable database connection
$db = new Database();

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if email and password are set
    if (isset($_POST["email"]) && isset($_POST["password"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];

        // Prepare and bind
        $stmt = $db->prepare("SELECT id, email, password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);

        // Execute the statement
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                // Password is correct, start a new session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_email'] = $user['email'];
                echo "Sign in successful. Welcome, " . htmlspecialchars($user['email']) . "!";
                
                // Redirect to a welcome page or dashboard here 
                header("Location: " . path('home'));
                exit(); // Ensure the script stops after the redirect
            } else {
                echo "Incorrect password.";
            }
        } else {
            echo "No user found with that email address.";
        }

        // Close statement
        $stmt->close();
    } else {
        echo "Email and password are required.";
    }
}

// Close the database connection
$db->closeConnection();