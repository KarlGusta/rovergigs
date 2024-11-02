<?php
// Enable error reporting for debugging (remove in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// PHP file (process_signup.php)

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
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash the password

        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $email, $password);

        // Execute the statement
        if ($stmt->execute()) {
            echo "New user registered successfully";

            // Redirect to the dashboard
            header("Location: /rovergigs/railshub/index.php");
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

// Close connection
$conn->close();
?>