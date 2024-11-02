<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "railshub";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $company_name = $_POST['company_name'];
    $website = $_POST['website'];
    $bio = $_POST['company_bio'];
    $personal_name = $_POST['personal_name'];
    $job_title = $_POST['job_title'];
    $developer_notifications = isset($_POST['developer_notifications']) ? 1: 0;
    $survey_requests = isset($_POST['survey_requests']) ? 1 : 0;
    
    // Prepare SQL statement
    $sql = "INSERT INTO business_profiles (company_name, website, bio, personal_name, job_title, developer_notifications, survey_requests)
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssii", $company_name, $website, $bio, $personal_name, $job_title, $developer_notifications, $survey_requests);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $stmt->close();
}

$conn->close();