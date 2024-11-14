<?php
// Start the session
session_start();

// Include the path config. This is to make it easy to manage my URLs when I upload to production, that is cpanel
require_once './config/paths.php';

// For meta tags reusability
require_once 'meta-tags.php';
$metaTags = new MetaTags();
echo $metaTags->generateMetaTags('home'); // or 'about' or any other page ID

// Enable error reporting
error_reporting(E_ALL); // Report all types of errors
ini_set('display_errors', 1); // Display errors on the screen

// Database config file
require_once './config/db.php';

// To enable database connection
$db = new Database();

// Fetch developer data
$sql = "SELECT id, hero, search_status, bio, avatar_path FROM developer_profiles ORDER BY created_at DESC LIMIT 3"; // Adjust the query as needed
$result = $db->query($sql);

// Error checking
$db->query($sql);

$developers = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $developers[] = $row;
    }
}

// Close the database connection
$db->closeConnection();
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

    <title>RoverGigs - Home</title>
    <!-- Custom CSS -->
    <style>
        .text-muted {
            border: 1px solid #ccc;
            /* Adjust the color and style as needed */
            border-radius: 5px;
            /* Adjust the radius for roundness */
            display: inline-block;
            /* Ensures the border fits the text */
            padding: 2px 4px;
            /* Optional: adds some padding for better appearance */
            background-color: white;
            /* Set background color to white */
        }

        .job-title {
            /* Assuming the job title has this class */
            font-weight: bold;
            /* Make the font bold */
            font-size: 18px;
            /* Set font size to 12px */
        }

        .company-title {

            /* Make the font bold */
            font-size: 18px;
            /* Set font size to 12px */
        }

        .table {
            border-collapse: separate;
            /* Ensure spacing is applied */
            border-spacing: 0 10px;
            /* Adjust the vertical spacing as needed */
            background-color: #F5F7FB;
            /* Set the table background color to #F5F7FB */
        }

        .table tr {
            border-radius: 10px;
            /* Adjust the radius as needed */
            overflow: hidden;
            /* Ensures the rounded corners are visible */
        }

        /* ... existing styles ... */
        .table tr:hover .apply-button {
            visibility: visible;
            /* Show button on hover */
            transition-delay: 0s;
            /* Remove delay on hover */
        }

        .apply-button {
            visibility: hidden;
            /* Hide button by default */
            background-color: #fe7470;
            /* Button background color */
            color: white;
            /* Text color */
            border: none;
            /* Remove border */
            border-radius: 5px;
            /* Rounded corners */
            padding: 12px 80px;
            /* Padding for better appearance */
            cursor: pointer;
            /* Pointer cursor on hover */
            transition: background-color 0.3s;
            /* Smooth transition */
        }

        .apply-button:hover {
            background-color: #fe7470;
            /* Darker shade on hover */
        }

        /* Remove the blur effect */
        .offcanvas-backdrop {
            display: none !important;
            /* Hide the dark overlay */
        }

        .subscribe-button {
            background-color: #fe7470;
            /* Button background color */
            color: white;
            /* Ensure text color is white */
            border: none;
            /* Remove border */
            border-radius: 5px;
            /* Rounded corners */
            padding: 10px 20px;
            /* Adjust padding for better appearance */
            cursor: pointer;
            /* Pointer cursor on hover */
        }

        .subscribe-button:hover {
            color: white;
            /* Keep text color white on hover */
            text-decoration: none;
            /* Ensure no underline on hover */
            opacity: 0.9;
            /* Optional: add a hover effect */
        }

        .card-title {
            font-weight: bold;
            font-size: 24px;
            /* Increased font size from 20px to 24px */
        }

        .text-secondary {
            font-size: 16px;
            /* Increased font size for secondary text */
        }

        body {
            font-family: 'Bricolage Grotesque', sans-serif !important;
            /* Change font to Bricolage Grotesque */
            font-size: 15px !important; /* Adjust the font size as needed */             
            background-color: #212121 !important; /* Change background color to #212121 */
            color: #CFCFCF; /* Change text color to #CFCFCF */
        }
    </style>    
     <!-- CSS files - Updated with path() function -->
    <link href="<?php echo path('assets', 'dist'); ?>css/tabler.min.css" rel="stylesheet" />
    <link href="<?php echo path('assets', 'dist'); ?>css/tabler-flags.min.css" rel="stylesheet" />
    <link href="<?php echo path('assets', 'dist'); ?>css/tabler-payments.min.css" rel="stylesheet" />
    <link href="<?php echo path('assets', 'dist'); ?>css/tabler-vendors.min.css" rel="stylesheet" />
    <link href="<?php echo path('assets', 'dist'); ?>css/demo.min.css" rel="stylesheet" />

    <!--Favicon-->
    <link rel="icon" type="image/x-icon" href="<?php echo path('assets', 'images'); ?>rovergigs_logo.png">

    <!-- For the font -->
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="page">
        <header class="navbar navbar-expand-md d-print-none" style="background-color: #212121;">
            <div class="container-xl">
                <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                    <a href="<?php echo path('home'); ?>" style="text-decoration: none;">
                        <p class="mt-3" style="color: #CFCFCF;">Rails Hub</p>
                    </a>
                </h1>
                <!-- Sign in and register buttons for desktop-->
                <div class="navbar-nav flex-row order-md-last d-none d-md-flex">
                    <!-- Only show sign in and register buttons if the user is not logged in -->
                    <?php if (!isset($_SESSION['user_id'])): ?>
                        <div class="nav-item me-3">
                            <div class="btn-list">
                                <!-- Using the config/paths.php for the URL of the sign in and register buttons -->
                                <a href="<?php echo path('users', 'sign_in'); ?>" class="btn" style="background-color: #212121; color: #CFCFCF; font-weight: bold;" target="_blank"
                                    rel="noreferrer">
                                    Sign in
                                </a>
                                <a href="<?php echo path('users', 'sign_up'); ?>" class="btn"
                                    style="background-color: #F5AF00; color: #212121; font-weight: bold;" target="_blank"
                                    rel="noreferrer">
                                    Register
                                </a>
                            </div>
                        </div>
                        <!-- If the user is logged in, show the log out button -->
                    <?php else: ?>
                        <div class="nav-item me-3">
                            <a href="<?php echo path('users', 'logout'); ?>" class="btn" style="background-color: #212121; color: #CFCFCF; font-weight: bold;">Log out</a>
                        </div>
                    <?php endif; ?>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" style="color: #CFCFCF;">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </header>
        <!-- Navigation menu collapsible hamberger for mobile -->
        <div class="navbar-expand-md d-md-none">
            <div class="collapse navbar-collapse" id="navbar-menu">
                <div class="navbar" style="background-color: #212121;">
                    <div class="container-xl">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="<?php echo path('developers', 'more') ?> ">
                                    <span class="nav-link-title" style="color: #CFCFCF;">
                                        Developers
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo path('pricing') ?>">
                                    <span class="nav-link-title" style="color: #CFCFCF;">
                                        Pricing
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <!-- Sign in and register buttons -->
                                <div class="navbar-nav flex-row order-md-last">
                                    <!-- Only show sign in and register buttons if the user is not logged in -->
                                    <?php if (!isset($_SESSION['user_id'])): ?>
                                        <div class="nav-item me-3">
                                        <div class="btn-list">
                                <!-- Using the config/paths.php for the URL of the sign in and register buttons -->
                                <a href="<?php echo path('users', 'sign_in'); ?>" class="btn" style="background-color: #212121; color: #CFCFCF; font-weight: bold;" target="_blank"
                                    rel="noreferrer">
                                    Sign in
                                </a>
                                <a href="<?php echo path('users', 'sign_up'); ?>" class="btn"
                                    style="background-color: #F5AF00; color: #212121; font-weight: bold;" target="_blank"
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
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="page-wrapper">
            <div class="page-body">
                <div class="container-xl">
                    <div class="row row-deck row-cards">
                        <!--Front Banner for desktop-->
                        <div class="col-12 d-none d-md-block">
                            <div class="card card-md" style="background-color: #212121; color: #CFCFCF;">
                                <div class="card-stamp card-stamp-lg">
                                </div>
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-10">
                                            <h1 class="h1 text-center responsive-title"
                                                style="font-size: 60px; margin-bottom: 20px; line-height: 40pt;">The
                                                ultimate job board for Rails
                                                developers</h1>
                                            <h3 class="h1 text-center d-none d-md-block">RailsHub puts
                                                freelance developers<span style="color: grey;"> in the spotlight for
                                                    their next opportunity.
                                                    Forget hunting through endless listings—let companies come to you
                                                    directly.</span></h3>
                                            <div class="mt-3 text-center">
                                                <a href="<?php echo path('roles', 'new'); ?>" class="btn btn-lg"
                                                    target="_blank" style="background-color: #F5AF00; color: #212121;"
                                                    rel="noopener">Get Started</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Front Banner for mobile-->
                        <div class="col-12 d-md-none">
                            <div class="card card-md" style="background-color: #212121; color: #CFCFCF;">
                                <div class="card-stamp card-stamp-lg">
                                </div>
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-10">
                                            <h1 class="h1 text-center responsive-title">The
                                                ultimate job board for Rails
                                                developers</h1>
                                            <h3 class="text-center">RailsHub puts
                                                freelance developers<span style="color: grey;"> in the spotlight for
                                                    their next opportunity.
                                                    Forget hunting through endless listings—let companies come to you
                                                    directly.</span></h3>
                                            <div class="mt-3 text-center">
                                                <a href="<?php echo path('roles', 'new'); ?>" class="btn btn-lg"
                                                    target="_blank" style="background-color: #F5AF00; color: #212121;"
                                                    rel="noopener">Get Started</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- header -->
                        <div class="page-header d-print-none">
                            <div class="container-xl">
                                <div class="row g-2 align-items-center">
                                    <div class="col">
                                        <h2 class="page-title" style="margin-left: -15px; color: #CFCFCF;">
                                            New Rails developers on RailsHub
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Developer cards for desktop-->
                        <?php foreach ($developers as $developer): ?>
                            <div class="col-12 d-none d-md-block" style='cursor: pointer;'
                                onclick="window.location='<?php echo path('developers', 'hire'); ?>?id=<?php echo $developer['id']; ?>';">
                                <div class="card" style="background-color: #212121; color: #CFCFCF; font-weight: bold;">
                                    <!-- Card with image -->
                                    <div class="row row-0 mb-2">
                                        <div class="col-2 me-3 d-flex justify-content-center align-items-center">
                                            <!-- Photo -->
                                            <?php
                                            $imageUrl = htmlspecialchars($developer['avatar_path']);
                                            // Check if the image URL is valid
                                            if (!empty($imageUrl) && @getimagesize("developers/" . $imageUrl)): ?>
                                                <img src="developers/<?php echo $imageUrl; ?>" class="card-img-start"
                                                    alt="Developer image"
                                                    loading="lazy"
                                                    style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover;" oneerror="this.oneerror=null; this.src='Images/image.png';" />
                                            <?php else: ?>
                                                <img src="Images/image.png" class="card-img-start" alt="Default image" loading="lazy"
                                                    style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover;" />
                                            <?php endif; ?>
                                        </div>
                                        <div class="col">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h3 class="card-title" style="font-weight: bold; font-size: 20px;">
                                                        <!-- Only show a few words -->
                                                        <?php
                                                        $hero = htmlspecialchars($developer['hero']);
                                                        $words = explode(" ", $hero);
                                                        $truncated = array_slice($words, 0, 10);
                                                        echo implode(" ", $truncated);
                                                        if (count($words) > 10) echo '...';
                                                        ?>
                                                    </h3>
                                                    <p><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="#22C55E"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                            class="icon icon-tabler icons-tabler-outline icon-tabler-checkbox">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M9 11l3 3l8 -8" />
                                                            <path
                                                                d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" />
                                                        </svg><span style="color: #22C55E;">Actively looking</span>
                                                        <!-- Changed text color to green -->
                                                    </p>
                                                </div>
                                                <p><span class="badge" style="background-color: #212121; color: #CFCFCF; border: 1px solid #CFCFCF;">New profile</span></p>
                                                <p class="text-secondary">
                                                    <!-- Only show a few words -->
                                                    <?php
                                                    $bio = htmlspecialchars($developer['bio']);
                                                    $words = explode(" ", $bio);
                                                    $truncated = array_slice($words, 0, 30);
                                                    echo implode(" ", $truncated);
                                                    if (count($words) > 30) echo '...';
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of card with image -->
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <!-- Developer cards for mobile-->
                        <?php foreach ($developers as $developer): ?>
                            <div class="col-12 d-md-none" style='cursor: pointer;'
                                onclick="window.location='<?php echo path('developers', 'hire'); ?>?id=<?php echo $developer['id']; ?>';">
                                <div class="card" style="background-color: #212121; color: #CFCFCF; font-weight: bold;">
                                    <!-- Card with image -->
                                    <div class="row row-0 mb-2">
                                        <div class="col-3 me-3 d-flex m-4">
                                            <!-- Photo -->
                                            <?php
                                            $imageUrl = htmlspecialchars($developer['avatar_path']);
                                            // Check if the image URL is valid
                                            if (!empty($imageUrl) && @getimagesize("developers/" . $imageUrl)): ?>
                                                <img src="developers/<?php echo $imageUrl; ?>" class="card-img-start"
                                                    alt="Developer image"
                                                    style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover;" />
                                            <?php else: ?>
                                                <img src="Images/image.png" class="card-img-start" alt="Default image"
                                                    style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover;" />
                                            <?php endif; ?>
                                        </div>
                                        <div class="col">
                                            <div class="card-body">
                                                <h3 class="card-title" style="font-weight: bold; font-size: 20px;">
                                                    <!-- Only show a few words -->
                                                    <?php
                                                    $hero = htmlspecialchars($developer['hero']);
                                                    $words = explode(" ", $hero);
                                                    $truncated = array_slice($words, 0, 10);
                                                    echo implode(" ", $truncated);
                                                    if (count($words) > 10) echo '...';
                                                    ?>
                                                </h3>
                                                <p><span class="badge" style="background-color: #212121; color: #CFCFCF; border: 1px solid #CFCFCF;">New profile</span></p>
                                                <p class="text-secondary">
                                                    <!-- Only show a few words -->
                                                    <?php
                                                    $bio = htmlspecialchars($developer['bio']);
                                                    $words = explode(" ", $bio);
                                                    $truncated = array_slice($words, 0, 15);
                                                    echo implode(" ", $truncated);
                                                    if (count($words) > 30) echo '...';
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of card with image -->
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <!-- See more developers button -->
                        <div>
                            <div class="card-footer text-end">
                                <a href="<?php echo path('developers', 'more'); ?>" class="btn"
                                    style="background-color: #F5AF00; color: #212121; font-size: 16px;">See more
                                    developers →
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
</body>

</html>