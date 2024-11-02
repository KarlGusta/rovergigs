<?php
// Start the session
session_start();

// Enable error reporting
error_reporting(E_ALL); // Report all types of errors
ini_set('display_errors', 1); // Display errors on the screen

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "railshub";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch developer data
$sql = "SELECT id, hero, search_status, bio, avatar_path FROM developer_profiles ORDER BY created_at DESC LIMIT 3"; // Adjust the query as needed
$result = $conn->query($sql);

if ($result === false) {
    die("Error executing query: " . $conn->error); // Handle query error
}

$developers = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $developers[] = $row;
    }
}

$conn->close();
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
            font-family: 'Mabry', sans-serif !important;
            /* Change font to Mabry */
            font-size: 15px !important;
            /* Adjust the font size as needed */
        }
    </style>
    <!-- CSS files -->
    <link href="./dist/css/tabler.min.css" rel="stylesheet" />
    <link href="./dist/css/tabler-flags.min.css" rel="stylesheet" />
    <link href="./dist/css/tabler-payments.min.css" rel="stylesheet" />
    <link href="./dist/css/tabler-vendors.min.css" rel="stylesheet" />
    <link href="./dist/css/demo.min.css" rel="stylesheet" />

    <!--Favicon-->
    <link rel="icon" type="image/x-icon" href="Images/rovergigs_logo.png">

    <!-- For the font -->
    <link href="https://fonts.googleapis.com/css2?family=Mabry:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="page">
        <header class="navbar navbar-expand-md navbar-light d-print-none">
            <div class="container-xl">
                <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                    <a href="/rovergigs/railshub" style="text-decoration: none;">
                        <p>Rails Hub</p>
                    </a>
                </h1>
                <!-- Sign in and register buttons -->
                <div class="navbar-nav flex-row order-md-last">
                    <!-- Only show sign in and register buttons if the user is not logged in -->
                    <?php if (!isset($_SESSION['user_id'])): ?>
                        <div class="nav-item me-3">
                            <div class="btn-list">
                                <a href="/rovergigs/railshub/users/sign-in.php" class="btn" target="_blank"
                                    rel="noreferrer">
                                    Sign in
                                </a>
                                <a href="/rovergigs/railshub/users/sign-up.php" class="btn"
                                    style="background-color: #fe7470; color: white; font-weight: bold;" target="_blank"
                                    rel="noreferrer">
                                    Register
                                </a>
                            </div>
                        </div>
                        <!-- If the user is logged in, show the log out button -->
                    <?php else: ?>
                        <div class="nav-item me-3">
                            <a href="/rovergigs/railshub/users/logout.php" class="btn">Log out</a>
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
            <div class="page-body">
                <div class="container-xl">
                    <div class="row row-deck row-cards">
                        <!--Front Banner-->
                        <div class="col-12">
                            <div class="card card-md">
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
                                                <a href="/rovergigs/railshub/roles/new.php" class="btn btn-lg"
                                                    target="_blank" style="background-color: #fe7470; color: white;"
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
                                        <h2 class="page-title" style="margin-left: -15px;">
                                            New Rails developers on RailsHub
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Developer cards -->
                        <?php foreach ($developers as $developer): ?>
                            <div class="col-12" style='cursor: pointer;'
                                onclick="window.location='/rovergigs/railshub/Developers/hire.php?id=<?php echo $developer['id']; ?>';">
                                <div class="card">
                                    <!-- Card with image -->
                                    <div class="row row-0 mb-2">
                                        <div class="col-3 me-3 d-flex justify-content-center align-items-center">
                                            <!-- Photo -->
                                            <?php
                                            $imageUrl = htmlspecialchars($developer['avatar_path']);
                                            // Check if the image URL is valid
                                            if (!empty($imageUrl) && @getimagesize("Developers/" . $imageUrl)): ?>
                                                <img src="Developers/<?php echo $imageUrl; ?>" class="card-img-start"
                                                    alt="Developer image"
                                                    style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover;" />
                                            <?php else: ?>
                                                <img src="Images/image.png" class="card-img-start" alt="Default image"
                                                    style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover;" />
                                            <?php endif; ?>
                                        </div>
                                        <div class="col">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h3 class="card-title" style="font-weight: bold; font-size: 20px;">
                                                        <?php echo htmlspecialchars($developer['hero']); ?>
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
                                                <p><span class="badge bg-green-lt">New profile</span></p>
                                                <p class="text-secondary"><?php echo htmlspecialchars($developer['bio']); ?>
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
                                <a href="Developers/more-devs.php" class="btn"
                                    style="background-color: #fe7470; color: white; font-size: 16px;">See more
                                    developers
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-narrow-right">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M5 12l14 0" />
                                        <path d="M15 16l4 -4" />
                                        <path d="M15 8l4 4" />
                                    </svg>
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
                            <a href="https://x.com/thekarlesi" target="_blank" class="link-secondary"
                                rel="noopener">
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
                            <a href="https://www.linkedin.com/in/thekarlesi/" target="_blank"
                                class="link-secondary" rel="noopener">
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
    <script src="./dist/libs/apexcharts/dist/apexcharts.min.js" defer></script>
    <script src="./dist/libs/jsvectormap/dist/js/jsvectormap.min.js" defer></script>
    <script src="./dist/libs/jsvectormap/dist/maps/world.js" defer></script>
    <script src="./dist/libs/jsvectormap/dist/maps/world-merc.js" defer></script>
    <!-- Tabler Core -->
    <script src="./dist/js/tabler.min.js" defer></script>
    <script src="./dist/js/demo.min.js" defer></script>
</body>

</html>