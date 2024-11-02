<?php
// PHP file (process_signin.php)

// Enable error reporting for debugging (remove in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start session
session_start();

// Database connection details
$host = "localhost";
$dbname = "railshub";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if email and password are set
    if (isset($_POST["email"]) && isset($_POST["password"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];

        // Prepare and bind
        $stmt = $conn->prepare("SELECT id, email, password FROM users WHERE email = ?");
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
                header("Location: /rovergigs/railshub/index.php");
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

// Close connection
$conn->close();