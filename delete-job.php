<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "rovergigs";

// Create connection to the database
$connection = new mysqli($servername, $username, $password, $database);

// Check if the connection is established correctly or not
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Check if the ID is set in the URL
if (isset($_GET['jobId'])) {
    $jobId = intval($_GET['jobId']); // Sanitize the input

    // Prepare the delete statement
    $sql = "DELETE FROM jobs WHERE jobId = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $jobId);

    // Execute the statement
    if ($stmt->execute()) {
        // Check if any rows were affected
        if ($stmt->affected_rows > 0) {
            header("Location: delete-posted-job.php?message=Job deleted successfully");
        } else {
            header("Location: delete-posted-job.php?message=No job found with that ID");
        }
        exit();
    } else {
        header("Location: delete-posted-job.php?message=Error executing query: " . $stmt->error);
        exit();
    }

    $stmt->close();
} else {
    // Redirect back with an error message if ID is not set
    header("Location: delete-posted-job.php?message=No job ID provided");
    exit();
}

$connection->close();
?>