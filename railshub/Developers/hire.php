<?php
// Start the session
session_start();

// Include the path config. This is to make it easy to manage my URLs when I upload to production, that is cpanel
require_once '../config/paths.php';

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database config file
require_once '../config/db.php';

// To enable database connection
$db = new Database();

// Retrieve the developer ID from the URL
$developer_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($developer_id === 0) {
    die("No developer ID provided");
}

// Fetch developer data
$sql = "SELECT id, city, hero, search_status, bio, avatar_path, role_levels FROM developer_profiles WHERE id = ?";
$stmt = $db->prepare($sql);

if ($stmt === false) {
    die("Error preparing statement: " . $conn->error);
}

$stmt->bind_param("i", $developer_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("No developer found with the provided ID");
}

$developer = $result->fetch_assoc();

// Close the database connection
$db->closeConnection();

// Helper function to safely output data
function e($text)
{
    return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}

// Helper function to get the correct image path
function getImagePath($avatarPath)
{
    if (empty($avatarPath)) {
        return '../Images/image1.png'; // Default image
    }
    return $avatarPath; // Prepend with '../../' to go up two levels
}

// Assuming you have a variable $city that holds the city name
$city = isset($developer['city']) ? $developer['city'] : 'Unknown'; // Check if 'city' exists
$timezone = ""; // Initialize timezone variable

// Define an associative array for cities and their time zones
$timezones = [
    "Fitchburg, Wisconsin" => "Central Time (US & Canada) (GMT-6)",
    "Nairobi" => "East Africa Time (GMT+3)",
    "New York" => "Eastern Time (US & Canada) (GMT-5)",
    "Los Angeles" => "Pacific Time (US & Canada) (GMT-8)",
    "London" => "Greenwich Mean Time (GMT)",
    "Tokyo" => "Japan Standard Time (GMT+9)",
    "Sydney" => "Australian Eastern Standard Time (GMT+10)",
    "Berlin" => "Central European Time (GMT+1)",
    "Moscow" => "Moscow Standard Time (GMT+3)",
    "Mumbai" => "India Standard Time (GMT+5:30)",
    "São Paulo" => "Brasilia Time (GMT-3)",
    "Dubai" => "Gulf Standard Time (GMT+4)",
    "Mexico City" => "Central Time (Mexico) (GMT-6)",
    "Beijing" => "China Standard Time (GMT+8)",
    "Johannesburg" => "South Africa Standard Time (GMT+2)",
    "Paris" => "Central European Time (GMT+1)",
    "Cairo" => "Eastern European Time (GMT+2)",
    "Buenos Aires" => "Argentina Time (GMT-3)",
    "Istanbul" => "Turkey Time (GMT+3)",
    "Seoul" => "Korea Standard Time (GMT+9)",
    "Singapore" => "Singapore Time (GMT+8)",
    "Hong Kong" => "Hong Kong Time (GMT+8)",
    "Chicago" => "Central Time (US & Canada) (GMT-6)",
    "Toronto" => "Eastern Time (US & Canada) (GMT-5)",
    "Lagos" => "West Africa Time (GMT+1)",
    "Helsinki" => "Eastern European Time (GMT+2)",
    "Kuala Lumpur" => "Malaysia Time (GMT+8)",
    "Bangkok" => "Indochina Time (GMT+7)",
    "Jakarta" => "Western Indonesia Time (GMT+7)",
    "Manila" => "Philippine Time (GMT+8)",
    "Melbourne" => "Australian Eastern Standard Time (GMT+10)",
    "Perth" => "Australian Western Standard Time (GMT+8)",
    "Brisbane" => "Australian Eastern Standard Time (GMT+10)",
    "Ho Chi Minh City" => "Indochina Time (GMT+7)",
    "Abu Dhabi" => "Gulf Standard Time (GMT+4)",
    "Tehran" => "Iran Standard Time (GMT+3:30)",
    "Baghdad" => "Arabian Standard Time (GMT+3)",
    "Karachi" => "Pakistan Standard Time (GMT+5)",
    "Dhaka" => "Bangladesh Standard Time (GMT+6)",
    "Kathmandu" => "Nepal Time (GMT+5:45)",
    "Riyadh" => "Arabian Standard Time (GMT+3)",
    "Addis Ababa" => "East Africa Time (GMT+3)",
    "Casablanca" => "Western European Time (GMT)",
    "Reykjavik" => "Greenwich Mean Time (GMT)",
    "Oslo" => "Central European Time (GMT+1)",
    "Stockholm" => "Central European Time (GMT+1)",
    "Copenhagen" => "Central European Time (GMT+1)",
    "Havana" => "Cuba Standard Time (GMT-5)",
    "Santiago" => "Chile Standard Time (GMT-4)",
    "Auckland" => "New Zealand Standard Time (GMT+12)",
    "Wellington" => "New Zealand Standard Time (GMT+12)",
    "Honolulu" => "Hawaii-Aleutian Standard Time (GMT-10)",
    "Anchorage" => "Alaska Standard Time (GMT-9)",
    "Denver" => "Mountain Time (US & Canada) (GMT-7)",
    "Phoenix" => "Mountain Time (US & Canada) (GMT-7)",
    "Vancouver" => "Pacific Time (US & Canada) (GMT-8)",
    "Tijuana" => "Pacific Time (Mexico) (GMT-8)",
    "Montreal" => "Eastern Time (US & Canada) (GMT-5)",
    "Edinburgh" => "Greenwich Mean Time (GMT)",
    "Dublin" => "Greenwich Mean Time (GMT)",
    "Cardiff" => "Greenwich Mean Time (GMT)",
    "Lyon" => "Central European Time (GMT+1)",
    "Nice" => "Central European Time (GMT+1)",
    "Marseille" => "Central European Time (GMT+1)",
    "Cologne" => "Central European Time (GMT+1)",
    "Munich" => "Central European Time (GMT+1)",
    "Frankfurt" => "Central European Time (GMT+1)",
    "Hamburg" => "Central European Time (GMT+1)",
    "Rotterdam" => "Central European Time (GMT+1)",
    "Amsterdam" => "Central European Time (GMT+1)",
    "The Hague" => "Central European Time (GMT+1)",
    "Luxembourg City" => "Central European Time (GMT+1)",
    "Bruges" => "Central European Time (GMT+1)",
    "Ghent" => "Central European Time (GMT+1)",
    "Antwerp" => "Central European Time (GMT+1)",
    "Lille" => "Central European Time (GMT+1)",
    "Geneva" => "Central European Time (GMT+1)",
    "Zurich" => "Central European Time (GMT+1)",
    "Bern" => "Central European Time (GMT+1)",
    "Lausanne" => "Central European Time (GMT+1)",
    "Basel" => "Central European Time (GMT+1)",
    "Vienna" => "Central European Time (GMT+1)",
    "Salzburg" => "Central European Time (GMT+1)",
    "Innsbruck" => "Central European Time (GMT+1)",
    "Graz" => "Central European Time (GMT+1)",
    "Ljubljana" => "Central European Time (GMT+1)",
    "Zagreb" => "Central European Time (GMT+1)",
    "Split" => "Central European Time (GMT+1)",
    "Sarajevo" => "Central European Time (GMT+1)",
    "Podgorica" => "Central European Time (GMT+1)",
    "Belgrade" => "Central European Time (GMT+1)",
    "Skopje" => "Central European Time (GMT+1)",
    "Pristina" => "Central European Time (GMT+1)",
    "Sofia" => "Eastern European Time (GMT+2)",
    "Bucharest" => "Eastern European Time (GMT+2)",
    "Kiev" => "Eastern European Time (GMT+2)",
    "Odessa" => "Eastern European Time (GMT+2)",
    "Chisinau" => "Eastern European Time (GMT+2)",
    "Yerevan" => "Armenia Time (GMT+4)",
    "Baku" => "Azerbaijan Time (GMT+4)",
    "Tbilisi" => "Georgia Standard Time (GMT+4)",
    "Ashgabat" => "Turkmenistan Time (GMT+5)",
    "Bishkek" => "Kyrgyzstan Time (GMT+6)",
    "Dushanbe" => "Tajikistan Time (GMT+5)",
    "Tashkent" => "Uzbekistan Time (GMT+5)",
    "Astana" => "Kazakhstan Time (GMT+6)",
    "Ulaanbaatar" => "Mongolia Standard Time (GMT+8)",
    "Hohhot" => "China Standard Time (GMT+8)",
    "Shenzhen" => "China Standard Time (GMT+8)",
    "Wuhan" => "China Standard Time (GMT+8)",
    "Chongqing" => "China Standard Time (GMT+8)",
    "Nanjing" => "China Standard Time (GMT+8)",
    "Hangzhou" => "China Standard Time (GMT+8)",
    "Harbin" => "China Standard Time (GMT+8)",
    "Pyongyang" => "Korea Standard Time (GMT+9)",
    "Dili" => "East Timor Time (GMT+9)",
    "Suva" => "Fiji Standard Time (GMT+12)",
    "Apia" => "West Samoa Time (GMT+13)",
    "Pago Pago" => "Samoa Standard Time (GMT-11)",
    "Nuku'alofa" => "Tonga Time (GMT+13)",
    "Papeete" => "Tahiti Time (GMT-10)",
    "Nouméa" => "New Caledonia Time (GMT+11)",
    "Port Moresby" => "Papua New Guinea Time (GMT+10)",
    "Honiara" => "Solomon Islands Time (GMT+11)",
    "Port Vila" => "Vanuatu Time (GMT+11)",
    "Majuro" => "Marshall Islands Time (GMT+12)"
];


// Set timezone based on the city
$timezone = isset($timezones[$city]) ? $timezones[$city] : "Timezone not specified"; // Default case
?>
<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta10
* @link https://tabler.io
* Copyright 2018-2022 The Tabler Authors
* Copyright 2018-2022 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-SVPMVGBZ4Q"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-SVPMVGBZ4Q');
    </script>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <!--To Display meta image, description-->
    <meta property="og:title" content="We Are Remote Okay" />
    <meta property="og:type" content="remote jobs" />
    <meta property="og:url" content="https://weareremoteokay.com" />
    <meta property="og:image" content="https://pbs.twimg.com/profile_images/1615947531615084544/v9aYayDa_400x400.jpg" />
    <meta property="og:description" content="A global community of remote workers with over 100,000+ visitors." />
    <meta property="og:site_name" content="WARO" />
    <meta property="og:locale" content="en_US" />

    <title>Rails Devs - Hire</title>
    <!-- Custom CSS -->
    <style>
    /* ... existing styles ... */

    /* ... !existing styles ... */
    </style>
    <!-- CSS files -->
    <link href="<?php echo path('assets', 'dist'); ?>css/tabler.min.css" rel="stylesheet" />
    <link href="<?php echo path('assets', 'dist'); ?>css/tabler-flags.min.css" rel="stylesheet" />
    <link href="<?php echo path('assets', 'dist'); ?>css/tabler-payments.min.css" rel="stylesheet" />
    <link href="<?php echo path('assets', 'dist'); ?>css/tabler-vendors.min.css" rel="stylesheet" />
    <link href="<?php echo path('assets', 'dist'); ?>css/demo.min.css" rel="stylesheet" />

    <!--Favicon-->
    <link rel="icon" type="image/x-icon" href="<?php echo path('assets', 'images'); ?>rovergigs_logo.png">
</head>

<body>
    <div class="page">
    <header class="navbar navbar-expand-md navbar-light d-print-none">
            <div class="container-xl">
                <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                    <a href="<?php echo path('home'); ?>" style="text-decoration: none;">
                        <p>Rails Hub</p>
                    </a>
                </h1>
                <!-- Sign in and register buttons -->
                <div class="navbar-nav flex-row order-md-last d-none d-md-flex">
                    <!-- Only show sign in and register buttons if the user is not logged in -->
                    <?php if (!isset($_SESSION['user_id'])): ?>
                        <div class="nav-item me-3">
                            <div class="btn-list">
                                <!-- Using the config/paths.php for the URL of the sign in and register buttons -->
                                <a href="<?php echo path('users', 'sign_in'); ?>" class="btn" target="_blank"
                                    rel="noreferrer">
                                    Sign in
                                </a>
                                <a href="<?php echo path('users', 'sign_up'); ?>" class="btn"
                                    style="background-color: #fe7470; color: white; font-weight: bold;" target="_blank"
                                    rel="noreferrer">
                                    Register
                                </a>
                            </div>
                        </div>
                        <!-- If the user is logged in, show the log out button -->
                    <?php else: ?>
                        <div class="nav-item me-3">
                            <a href="<?php echo path('users', 'logout'); ?>" class="btn">Log out</a>
                        </div>
                    <?php endif; ?>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </header>
        <div class="page-wrapper">
            <div class="container-xl">
                <!-- Page title -->
                <div class="page-header d-print-none">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <!-- Leave this empty for spacing -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page body -->
            <div class="page-body">
                <!-- End of the profile banner -->
                <div class="container-xl">
                    <!-- The profile banner -->
                    <div class="row row-cards">
                        <div class="col-lg-12 mb-2">
                            <div class="card"
                                style="background-image: url(../Images/background-img.png); position: relative; overflow: visible; background-size: cover; background-position: center;">
                                <div class="d-flex" style="position: relative; top: -50px;">
                                    <!-- Adjusted position -->
                                    <div class="card-body p-4">
                                        <span class="avatar avatar-xl rounded"
                                            style="background-image: url('<?php echo e(getImagePath($developer['avatar_path'])); ?>'); box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);"></span>
                                        <!-- Added box-shadow -->
                                        <div class="mt-3">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row row-cards">
                        <div class="col-lg-8">
                            <div class="card card-lg">
                                <div class="card-header">
                                    <div class="col">
                                        <div class="card-title" style="font-weight: bold; font-size: 1.5rem;">
                                            <!-- Only show a few words -->
                                                    <?php 
                                                      $hero = htmlspecialchars($developer['hero']);
                                                      $words = explode(" ", $hero);
                                                      $truncated = array_slice($words, 0, 10);
                                                      echo implode(" ", $truncated);
                                                      if (count($words) > 10) echo '...';
                                                    ?>
                                        </div>
                                        <div class="card-subtitle mt-3">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/lock -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-lock">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M5 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-6z" />
                                                <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0" />
                                                <path d="M8 11v-4a4 4 0 1 1 8 0v4" />
                                            </svg>
                                            <strong>Private information</strong>
                                        </div>
                                    </div>
                                    <div class="card-actions">
                                        <a href="<?php echo path('businesses', 'new'); ?>"
                                            class="btn .btn-outline-secondary"
                                            style="font-weight: bold; font-size: 16px; margin-top: -45px;">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/briefcase -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-briefcase">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M3 7m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
                                                <path d="M8 7v-2a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v2" />
                                                <path d="M12 12l0 .01" />
                                                <path d="M3 13a20 20 0 0 0 18 0" />
                                            </svg>
                                            Hire me
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body" style="margin-top: -25px;">
                                    <p><span class="badge bg-green-lt" style="font-weight: bold; font-size: 16px;">New
                                            profile</span></p>
                                    <div class="markdown">
                                        <p><?php echo nl2br(e($developer['bio'])); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="me-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="#22C55E" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-checkbox">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M9 11l3 3l8 -8" />
                                                <path
                                                    d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" />
                                            </svg><span style="color: #22C55E;">Actively looking</span>
                                            <!-- Changed text color to green -->
                                        </div>
                                    </div>
                                    <?php
                                    if (is_string($developer['role_levels'])) {
                                        $rolesArray = explode(',', $developer['role_levels']); // Convert string to array
                                    } else {
                                        $rolesArray = (array) $developer['role_levels']; // Ensure it's an array if it's not a string
                                    }

                                    foreach ($rolesArray as $role) {
                                        ?>
                                    <h4>Interested in roles</h4>
                                    <ul class="list-unstyled space-y-1">
                                        <li>
                                            <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-grey" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M5 12l5 5l10 -10" />
                                            </svg>
                                            <?php echo nl2br(e(trim($role))); ?>
                                            <!-- Trim whitespace from each role -->
                                        </li>
                                    </ul>
                                    <?php } ?>
                                    <ul class="list-unstyled space-y-1">
                                        <li>
                                            <div class="card bg-primary-lt" style='cursor: pointer;'
                                                onclick="window.location='<?php echo path('pricing'); ?>';">
                                                <div class="card-body">
                                                    <!-- Download SVG icon from http://tabler-icons.io/i/lock -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-lock">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path
                                                            d="M5 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-6z" />
                                                        <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0" />
                                                        <path d="M8 11v-4a4 4 0 1 1 8 0v4" />
                                                    </svg>
                                                    <h3 class="card-title">Private information</h3>
                                                    <p class="text-muted">Information is only visible with a business
                                                        subscription.</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-grey" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M5 12l5 5l10 -10" />
                                            </svg>
                                            <?php echo e($city); ?>
                                        </li>
                                        <li>
                                            <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-grey" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M5 12l5 5l10 -10" />
                                            </svg>
                                            <?php echo $timezone; ?>
                                            <!-- Display the timezone -->
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of page body  -->
        </div>
    </div>
    <!--This is where the footer should be-->
    <footer class="footer footer-transparent d-print-none">
        <div class="container-xl">
            <div class="row text-center align-items-center flex-row-reverse">
                <div class="col-lg-auto ms-lg-auto">
                    <ul class="list-inline list-inline-dots mb-0">
                        <li class="list-inline-item">
                            <a href="https://x.com/thekarlesi" target="_blank" class="link-secondary" rel="noopener">
                                <!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c-.002 -.249 1.51 -2.772 1.818 -4.013z" />
                                </svg>
                                Twitter
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://www.linkedin.com/in/thekarlesi/" target="_blank" class="link-secondary"
                                rel="noopener">
                                <!-- Download SVG icon from http://tabler-icons.io/i/brand-linkedin -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <rect x="4" y="4" width="16" height="16" rx="2" />
                                    <line x1="8" y1="11" x2="8" y2="16" />
                                    <line x1="8" y1="8" x2="8" y2="8.01" />
                                    <line x1="12" y1="16" x2="12" y2="11" />
                                    <path d="M16 16v-3a2 2 0 0 0 -4 0" />
                                </svg>
                                LinkedIn
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                    <ul class="list-inline list-inline-dots mb-0">
                        <li class="list-inline-item">
                            Copyright &copy;
                            <script type="text/javascript">
                            document.write(new Date().getFullYear());
                            </script>
                            <a href="www.rovergigs.com/railshub" class="link-secondary">Rails Hub</a>.
                            All rights reserved.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    </div>
    </div>
    <!-- Libs JS -->
    <script src="<?php echo path('assets', 'dist'); ?>libs/apexcharts/dist/apexcharts.min.js" defer></script>
    <script src="<?php echo path('assets', 'dist'); ?>libs/jsvectormap/dist/js/jsvectormap.min.js" defer></script>
    <script src="<?php echo path('assets', 'dist'); ?>libs/jsvectormap/dist/maps/world.js" defer></script>
    <script src="<?php echo path('assets', 'dist'); ?>libs/jsvectormap/dist/maps/world-merc.js" defer></script>
    <!-- Tabler Core -->
    <script src="<?php echo path('assets', 'dist'); ?>js/tabler.min.js" defer></script>
    <script src="<?php echo path('assets', 'dist'); ?>js/demo.min.js" defer></script>

    <!-- Custom Script for Subscribe Button -->
    <script>
    // Check if the user has already subscribed
    if (localStorage.getItem('subscribed')) {
        document.getElementById('offcanvasBottom').style.display = 'none'; // Hide the banner
    }

    // Add click event to the subscribe button
    document.getElementById('subscribe-button').addEventListener('click', function() {
        localStorage.setItem('subscribed', 'true'); // Set the subscribed flag
        document.getElementById('offcanvasBottom').style.display = 'none'; // Hide the banner
    });
    </script>
</body>

</html>