<?php
// Start the session
session_start();

// Include the path config. This is to make it easy to manage my URLs when I upload to production, that is cpanel
require_once '../config/paths.php';
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

    <title>RailsHub - New</title>
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

    .card {
        /* Existing styles */
        transition: transform 0.3s, box-shadow 0.3s;
        /* Smooth transition for hover effect */
    }

    .card:hover {
        transform: scale(1.05);
        /* Slightly enlarge the card */
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        /* Add shadow for depth */
    }

    body {
            font-family: 'Bricolage Grotesque', sans-serif !important;
            /* Change font to Bricolage Grotesque */
            font-size: 15px !important; /* Adjust the font size as needed */             
            background-color: #212121 !important; /* Change background color to #212121 */
            color: #CFCFCF; /* Change text color to #CFCFCF */
        }
    </style>
    <!-- CSS files -->
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
    <header class="navbar navbar-expand-md navbar-light d-print-none" style="background-color: #212121;">
            <div class="container-xl">
                <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                    <a href="<?php echo path('home'); ?>" style="text-decoration: none;">
                        <p class="mt-3" style="color: #CFCFCF;">Rails Hub</p>
                    </a>
                </h1>
                <!-- Sign in and register buttons -->
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
                                style="background-color: #F5AF00; color: #CFCFCF; font-weight: bold;" target="_blank"
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
            <div class="page-body">
                <div class="container-xl">
                    <div class="col-12">
                        <div class="row row-cards row-deck">
                            <!-- Card for a new developer -->
                            <div class="col" style='cursor: pointer;'
                                onclick="window.location='<?php echo path('developers', 'new'); ?>';">
                                <div class="card" style="background-color: #212121; color: #CFCFCF;">
                                    <div class="card-header">
                                        <ul class="nav nav-pills card-header-pills">
                                            <li class="nav-item active">
                                                <a class="nav-link active" href="#">
                                                    <!-- Download SVG icon from http://tabler-icons.io/i/briefcase -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-briefcase">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path
                                                            d="M3 7m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
                                                        <path d="M8 7v-2a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v2" />
                                                        <path d="M12 12l0 .01" />
                                                        <path d="M3 13a20 20 0 0 0 18 0" />
                                                    </svg>
                                                </a>
                                            </li>
                                            <li class="nav-item ms-auto">
                                                <a class="nav-link" href="#">
                                                    <!-- Download SVG icon from http://tabler-icons.io/i/arrow-right -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-narrow-right">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M5 12l14 0" />
                                                        <path d="M15 16l4 -4" />
                                                        <path d="M15 8l4 4" />
                                                    </svg>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <h2>I'm looking for work</h2>
                                        <p class="text-secondary">You're a Ruby on Rails developer looking for your next
                                            gig.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- End of card for a new developer -->

                            <!-- Card for employer searching -->
                            <div class="col" style='cursor: pointer;'
                                onclick="window.location='<?php echo path('businesses', 'new'); ?>';">
                                <div class="card" style="background-color: #212121; color: #CFCFCF;">
                                    <div class="card-header">
                                        <ul class="nav nav-pills card-header-pills">
                                            <li class="nav-item active">
                                                <a class="nav-link active" href="#">
                                                    <!-- Download SVG icon from http://tabler-icons.io/i/briefcase -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-users-group">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                                        <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1" />
                                                        <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                                        <path d="M17 10h2a2 2 0 0 1 2 2v1" />
                                                        <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                                        <path d="M3 13v-1a2 2 0 0 1 2 -2h2" />
                                                    </svg>
                                                </a>
                                            </li>
                                            <li class="nav-item ms-auto">
                                                <a class="nav-link" href="#">
                                                    <!-- Download SVG icon from http://tabler-icons.io/i/usergroup -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-narrow-right">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M5 12l14 0" />
                                                        <path d="M15 16l4 -4" />
                                                        <path d="M15 8l4 4" />
                                                    </svg>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <h2>I'm hiring developers</h2>
                                        <p class="text-secondary">You're a business looking to hire a freelance,
                                            part-time, or full-time Ruby on Rails developer.</p>
                                    </div>
                                </div>
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