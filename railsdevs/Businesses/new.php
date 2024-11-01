<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page if not logged in
    header("Location: /rovergigs/railsdevs/users/sign-in.php");
    exit();
}
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

    label {
        color: grey;
        /* Set label text color to grey */
    }

    body {
        font-family: 'Mabry', sans-serif !important;
        /* Change font to Mabry */
        font-size: 15px !important;
        /* Adjust the font size as needed */
    }

    /* ... existing styles ... */
    </style>
    <!-- CSS files -->
    <link href="../dist/css/tabler.min.css" rel="stylesheet" />
    <link href="../dist/css/tabler-flags.min.css" rel="stylesheet" />
    <link href="../dist/css/tabler-payments.min.css" rel="stylesheet" />
    <link href="../dist/css/tabler-vendors.min.css" rel="stylesheet" />
    <link href="../dist/css/demo.min.css" rel="stylesheet" />

    <!--Favicon-->
    <link rel="icon" type="image/x-icon" href="../Images/rovergigs_logo.png">

    <!-- For the font -->
    <link href="https://fonts.googleapis.com/css2?family=Mabry:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="page">
        <header class="navbar navbar-expand-md navbar-light d-print-none">
            <div class="container-xl">
                <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                    <a href="../index.php">
                        <p>Rails Devs</p>
                    </a>
                </h1>
                <!-- Sign in and register buttons -->
                <div class="navbar-nav flex-row order-md-last">
                    <!-- Only show sign in and register buttons if the user is not logged in -->
                    <?php if (!isset($_SESSION['user_id'])): ?>
                    <div class="nav-item me-3">
                        <div class="btn-list">
                            <a href="/rovergigs/railsdevs/users/sign-in.php" class="btn" target="_blank"
                                rel="noreferrer">
                                Sign in
                            </a>
                            <a href="/rovergigs/railsdevs/users/sign-up.php" class="btn"
                                style="background-color: #fe7470; color: white; font-weight: bold;" target="_blank"
                                rel="noreferrer">
                                Register
                            </a>
                        </div>
                    </div>
                    <!-- If the user is logged in, show the log out button -->
                    <?php else: ?>
                    <div class="nav-item me-3">
                        <a href="/rovergigs/railsdevs/users/logout.php" class="btn">Log out</a>
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
                <form action="form_handler.php" method="post" enctype="multipart/form-data">
                    <div class="container-xl">
                        <div class="row row-deck row-cards">
                            <!-- Business Details -->
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h2>Your Business Profile</h2>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3 row">
                                            <div class="col-4 col-form-label pt-0">
                                                <h2>Business details</h2>
                                                <small class="form-hint">
                                                    <p>Information about your business. Here's your chance to sell
                                                        yourself to potential hires!</p>
                                                </small>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="mb-3 row">
                                                    <h4>Company name</h4>
                                                    <div class="input-group mb-2">
                                                        <input type="text" name="company_name" class="form-control"
                                                            autocomplete="off">
                                                    </div>
                                                    <h4>Website</h4>
                                                    <div class="input-group mb-2">
                                                        <span class="input-group-text">
                                                            https://
                                                        </span>
                                                        <input type="text" name="website" class="form-control"
                                                            autocomplete="off">
                                                    </div>
                                                    <h4>Bio</h4>
                                                    <div class="input-group mb-2">
                                                        <textarea rows="5" name="company_bio" class="form-control"
                                                            placeholder="Here can be your description"
                                                            value="Mike">fdghghghjgns.</textarea>
                                                    </div>
                                                    <h4>Your company logo</h4>
                                                    <div class="input-group mb-2">
                                                        <div class="col">
                                                            <div class="row align-items-center">
                                                                <div class="col-auto"><span class="avatar avatar-xl"
                                                                        style="background-image: url(../Images/image.png)"></span>
                                                                </div>
                                                                <div class="col-auto"><a href="#" class="btn">
                                                                        Upload
                                                                    </a></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Personal Details -->
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-3 row">
                                            <div class="col-4 col-form-label pt-0">
                                                <h2>Personal details</h2>
                                                <small class="form-hint">
                                                    <p>Information about you, the contact point for your business on
                                                        RailsDevs.</p>
                                                </small>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="mb-3 row">
                                                    <h4>Your name</h4>
                                                    <div class="input-group mb-2">
                                                        <input type="text" name="personal_name" class="form-control"
                                                            autocomplete="off">
                                                    </div>
                                                    <h4>Your job title or role</h4>
                                                    <div class="input-group mb-2">
                                                        <input type="text" name="job_title" class="form-control"
                                                            autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Email notifications -->
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-3 row">
                                            <div class="col-4 col-form-label pt-0">
                                                <h2>Email notifications</h2>
                                                <small class="form-hint">
                                                    <p>Share your scheduling link (Calendly, SavvyCal, etc.) to make it
                                                        easier to organize interviews with businesses.</p>
                                                </small>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="mb-3 row">
                                                    <div class="mb-3">
                                                        <h3 class="form-check-label">Developer notifications</h3>
                                                        <small class="form-hint">Receive daily or weekly email
                                                            notifications when new developers add their profile to
                                                            RailsDevs.</small>
                                                    </div>
                                                    <div class="input-group mb-2">
                                                        <div class="alert alert-warning" role="alert">
                                                            <div class="d-flex">
                                                                <div>
                                                                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="icon alert-icon" width="24" height="24"
                                                                        viewBox="0 0 24 24" stroke-width="2"
                                                                        stroke="currentColor" fill="none"
                                                                        stroke-linecap="round" stroke-linejoin="round">
                                                                        <path stroke="none" d="M0 0h24v24H0z"
                                                                            fill="none" />
                                                                        <path
                                                                            d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z" />
                                                                        <path d="M12 9v4" />
                                                                        <path d="M12 17h.01" />
                                                                    </svg>
                                                                </div>
                                                                <div>
                                                                    Requires an active business subscription. <a
                                                                        href="#">Upgrade your account.</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <label class="form-check form-check-inline" style="color: inherit;">
                                                        <input class="form-check-input" name="survey_requests"
                                                            type="checkbox" checked>
                                                        <span class="form-check-label">Survey requests</span>
                                                        <small class="form-hint">Help RailsDevs by receiving short,
                                                            infrequent surveys about how you use the platform.</small>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Save button -->
                            <div>
                                <div class="card-footer text-end">
                                    <button type="submit" class="btn"
                                        style="background-color: #fe7470; color: white; font-weight: bold;">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
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