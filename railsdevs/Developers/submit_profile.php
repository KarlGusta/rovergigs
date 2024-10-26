<?php
// Enable error reporting
error_reporting(E_ALL); // Report all types of errors
ini_set('display_errors', 1); // Display errors on the screen

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "railsdevs";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize input data
function sanitize_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = sanitize_input($_POST["name"]);
    $hero = sanitize_input($_POST["hero"]);
    $city = sanitize_input($_POST["city"]);
    $state = sanitize_input($_POST["state"]);
    $country = sanitize_input($_POST["country"]);
    $bio = sanitize_input($_POST["bio"]);

    // Process specialties array
    $specialties = isset($_POST["specialties"]) ? $_POST["specialties"] : array();
    // Sanitize each specialty
    $specialties = array_map('sanitize_input', $specialties);
    // Convert array to string for database storage
    $specialties_string = implode(", ", $specialties);

    // Process work preferences
    //$search_status = sanitize_input($_POST["search_status"]);
    $search_status = isset($_POST["search_status"]) ? sanitize_input($_POST["search_status"]) : ""; // Added check for existence
    $role_types = isset($_POST["role_types"]) ? implode(", ", $_POST["role_types"]) : "";
    $role_levels = isset($_POST["role_levels"]) ? implode(", ", $_POST["role_levels"]) : "";

    // Process role types
    $role_types = isset($_POST["role_types"]) ? $_POST["role_types"] : array();
    $role_types = array_map('sanitize_input', $role_types);
    $role_types_string = implode(", ", $role_types);

    // Process role levels
    $role_levels = isset($_POST["role_levels"]) ? $_POST["role_levels"] : array();
    $role_levels = array_map('sanitize_input', $role_levels);
    $role_levels_string = implode(", ", $role_levels);

    // Process online presence
    $website = sanitize_input($_POST["website"]);
    $github = sanitize_input($_POST["github"]);
    $gitlab = sanitize_input($_POST["gitlab"]);
    $linkedin = sanitize_input($_POST["linkedin"]);
    $stackoverflow = sanitize_input($_POST["stackoverflow"]);
    $twitter = sanitize_input($_POST["twitter"]);
    $mastodon = sanitize_input($_POST["mastodon"]);

    // Process scheduling link
    $scheduling_link = sanitize_input($_POST["scheduling_link"]);

    // Process email notifications
    $profile_reminders = isset($_POST["profile_reminders"]) ? 1 : 0;
    $feature_announcements = isset($_POST["feature_announcements"]) ? 1 : 0;

    // Handle file upload
    $avatar_path = '';
    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0) {
        $target_dir = "uploads/";

        // Check if uploads directory exists, if not create it
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0755, true); // Create uploads directory with appropriate permissions
        }

        $target_file = $target_dir . basename($_FILES["avatar"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check file size (limit to 2MB for example)
        if ($_FILES['avatar']['size'] > 2 * 1024 * 1024) {
            echo "Sorry, your file is too large."; // Add error message for file size
        } else {
            // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES["avatar"]["tmp_name"]);
            if ($check !== false) {
                // Allow certain file formats
                if ($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif") {
                    if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
                        $avatar_path = $target_file;
                    } else {
                        echo "Sorry, there was an error uploading your file."; // Add error message for upload failure
                    }
                } else {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed."; // Add error message for file type
                }
            } else {
                echo "File is not an image."; // Add error message for non-image file
            }
        }
    }
    // Prepare SQL statement
    $sql = "INSERT INTO developer_profiles (name, hero, city, state, country, bio, specialties, search_status, role_types, role_levels, website, github, gitlab, linkedin, stackoverflow, twitter, mastodon, scheduling_link, profile_reminders, feature_announcements, avatar_path) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssssssssssssiis", $name, $hero, $city, $state, $country, $bio, $specialties_string, $search_status, $role_types_string, $role_levels_string, $website, $github, $gitlab, $linkedin, $stackoverflow, $twitter, $mastodon, $scheduling_link, $profile_reminders, $feature_announcements, $avatar_path);

    if ($stmt->execute()) {
        echo "Profile submitted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>