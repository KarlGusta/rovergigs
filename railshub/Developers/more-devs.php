<?php
// Start the session
session_start();

// Include the path config
require_once '../config/paths.php';

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database config file
require_once '../config/db.php';

// Define helper function for checking selected role levels
function isRoleLevelSelected($roleLevel, $selectedLevels)
{
    if (empty($selectedLevels)) return false;
    return in_array($roleLevel, $selectedLevels);
}

// To enable database connection
$db = new Database();

// Get the selected role levels from GET parameter
$selectedRoleLevels = isset($_GET['role_levels']) ? $_GET['role_levels'] : array();

// Validate that all selected values are numeric to prevent SQL injection
$validRoleLevels = array_filter($selectedRoleLevels, function ($value) {
    return in_array($value, ['Junior', 'Mid-level', 'Senior', 'Principal/staff', 'C-level']);
});

// Base query
$sql = "SELECT id, hero, search_status, bio, avatar_path, role_levels 
        FROM developer_profiles";

// Add role level filter if any roles are selected
if (!empty($validRoleLevels)) {
    $roleConditions = array_map(function ($level) use ($db) {
        // Escape the string to prevent SQL injection
        $safeLevel = $db->escape_string($level);
        return "FIND_IN_SET('$safeLevel', role_levels)";
    }, $validRoleLevels);
    $sql .= " WHERE " . implode(' OR ', $roleConditions);
}

$sql .= " ORDER BY created_at ASC LIMIT 50"; // Added LIMIT and changed to ASC


// Execute query
$result = $db->query($sql);
$developers = array();

if ($result && $result->num_rows > 0) {
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
            font-size: 15px !important;
            /* Adjust the font size as needed */
        }

        .accordion-content {
            display: none;
            padding-bottom: 20px;
            border-top: none;
        }

        .accordion-header {
            padding-bottom: 20px;
            cursor: pointer;
        }

        .form-check {
            margin-bottom: 5px;
        }

        .work-preference-toggle-icon {
            font-size: 18px;
            font-weight: bold;
        }

        .location-toggle-icon {
            font-size: 18px;
            font-weight: bold;
        }

        .all-locations-toggle-icon {
            font-size: 18px;
            font-weight: bold;
        }

        .timezone-toggle-icon {
            font-size: 18px;
            font-weight: bold;
        }

        .blur-content {
            filter: blur(5px);
            pointer-events: none;
            transition: filter 0.3s ease;
        }

        /* Remove the previous backdrop hiding style */
        .offcanvas-backdrop {
            /* Remove or comment out the display: none !important; */
        }

        /* Style for the modal backdrop */
        .modal-backdrop {
            background-color: rgba(0, 0, 0, 0.5);
        }

        /* ... existing styles ... */
    </style>
    <!-- CSS files -->
    <link href="<?php echo path('assets', 'dist'); ?>css/tabler.min.css" rel="stylesheet" />
    <link href="<?php echo path('assets', 'dist'); ?>css/tabler-flags.min.css" rel="stylesheet" />
    <link href="<?php echo path('assets', 'dist'); ?>css/tabler-payments.min.css" rel="stylesheet" />
    <link href="<?php echo path('assets', 'dist'); ?>css/tabler-vendors.min.css" rel="stylesheet" />
    <link href="<?php echo path('assets', 'dist'); ?>css/demo.min.css" rel="stylesheet" />

    <!--Favicon-->
    <link rel="icon" type="image/x-icon" href="<?php echo path('assets', 'images'); ?>rovergigs_logo.png">

    <!-- Add these lines for modal paywall pop-up-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</head>

<body>
    <!-- Pop-up for the requiring a paid account -->
    <!-- Add this right after the opening <body> tag -->

    <!-- Our own modal -->
    <div class="modal modal-blur fade" id="paywall-popup" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-status" style="background-color: #fe7470;"></div>
                <div class="modal-body text-center py-4">
                    <h2>Sign up now to see more profiles</h2>
                    <div>Gain access to 1400+ Ruby on Rails developers.</div>
                </div>
                <div class="modal-footer">
                    <div class="w-100">
                        <div class="row">
                            <div class="col"><a href="<?php echo path('pricing'); ?>" class="btn w-100" style="background-color: #fe7470; color: white; font-weight: bold;" onclick="window.location.href=this.href;" data-bs-dismiss="modal">
                                    Start hiring
                                </a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of the pop-up requiring a paid account -->
    <div class="page">
        <header class="navbar navbar-expand-md navbar-light d-print-none">
            <div class="container-xl">
                <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                    <a href="<?php echo path('home'); ?>" style="text-decoration: none;">
                        <p>Rails Hub</p>
                    </a>
                </h1>

                <!-- Toggle button for Collapsible content -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
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
            </div>
        </header>
        <!-- Navigation menu collapsible hamberger for mobile -->
        <div class="navbar-expand-md d-md-none">
            <div class="collapse navbar-collapse" id="navbar-menu">
                <div class="navbar navbar-light">
                    <div class="container-xl">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="<?php echo path('developers', 'more') ?> ">
                                    <span class="nav-link-title">
                                        Developers
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo path('pricing') ?>">
                                    <span class="nav-link-title">
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
                                                <a href="<?php echo path('users', 'sign_in'); ?>" class="btn" target="_blank"
                                                    rel="noreferrer">
                                                    Sign in
                                                </a>
                                                <a href="<?php echo path('users', 'sign_up'); ?>" class="btn"
                                                    style="background-color: #fe7470; color: white; font-weight: bold;"
                                                    target="_blank" rel="noreferrer">
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
        <!-- Page wrapper -->
        <div class="page-wrapper">
            <!-- Page header -->
            <div class="page-header d-print-none">
                <div class="container-xl">
                    <!-- Front banner card for desktop-->
                    <div class="col-12 d-none d-md-block" style="display: none;"> <!-- Added style to hide the banner -->
                        <div class="card card-md">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h2 class="page-title">Hire Ruby on Rails developers.</h2>
                                        <p class="m-0 text-secondary">1300+ Ruby on Rails developers looking for their
                                            next gig. Juniors
                                            to seniors and everyone in between, you'll find them all here.</p>
                                    </div>
                                    <div class="col-auto">
                                        <a href="<?php echo path('developers', 'new'); ?>" class="btn"
                                            style="background-color: #fe7470; color: white; font-weight: bold;">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M12 5l0 14" />
                                                <path d="M5 12l14 0" />
                                            </svg>
                                            Add my profile
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Front banner card for mobile-->
                    <div class="col-12 d-block d-md-none" style="display: none;">
                        <div class="card card-md">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col mb-3">
                                        <h2 class="page-title">Hire Ruby on Rails developers.</h2>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col mb-3">
                                        <p class="m-0 text-secondary">1300+ Ruby on Rails developers looking for their
                                            next gig. Juniors
                                            to seniors and everyone in between, you'll find them all here.</p>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <a href="<?php echo path('developers', 'new'); ?>" class="btn"
                                            style="background-color: #fe7470; color: white; font-weight: bold;">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M12 5l0 14" />
                                                <path d="M5 12l14 0" />
                                            </svg>
                                            Add my profile
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page body -->
            <div class="page-body">
                <div class="container-xl">
                    <div class="row g-4">
                        <!-- Desktop filter -->
                        <div class="col-md-3 d-none d-md-block"> <!-- Added d-none d-md-block to hide on mobile -->
                            <form action="" method="get" id="filterForm" autocomplete="off" novalidate
                                class="sticky-top">
                                <div class="form-label">Search profiles</div>
                                <div class="mb-4">
                                    <div class="alert" role="alert">
                                        <div class="d-flex">
                                            <div>
                                                <!-- Download SVG icon from http://tabler-icons.io/i/info-circle -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon"
                                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                    <path d="M12 9h.01" />
                                                    <path d="M11 12h1v4h1" />
                                                </svg>
                                            </div>
                                            <div>
                                                Text search requires a paid account.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-label">Role level</div>
                                <div class="mb-4">
                                    <label class="form-check">
                                        <input type="checkbox" class="form-check-input" name="role_levels[]" value="Junior"
                                            <?php echo isRoleLevelSelected("1", $selectedRoleLevels) ? 'checked' : ''; ?>>
                                        <span class="form-check-label">Junior</span>
                                    </label>
                                    <label class="form-check">
                                        <input type="checkbox" class="form-check-input" name="role_levels[]" value="Mid-level"
                                            <?php echo isRoleLevelSelected("2", $selectedRoleLevels) ? 'checked' : ''; ?>>
                                        <span class="form-check-label">Mid-level</span>
                                    </label>
                                    <label class="form-check">
                                        <input type="checkbox" class="form-check-input" name="role_levels[]" value="Senior"
                                            <?php echo isRoleLevelSelected("3", $selectedRoleLevels) ? 'checked' : ''; ?>>
                                        <span class="form-check-label">Senior</span>
                                    </label>
                                    <label class="form-check">
                                        <input type="checkbox" class="form-check-input" name="role_levels[]" value="Principal/staff"
                                            <?php echo isRoleLevelSelected("4", $selectedRoleLevels) ? 'checked' : ''; ?>>
                                        <span class="form-check-label">Principal / Staff</span>
                                    </label>
                                    <label class="form-check">
                                        <input type="checkbox" class="form-check-input" name="role_levels[]" value="C-level"
                                            <?php echo isRoleLevelSelected("5", $selectedRoleLevels) ? 'checked' : ''; ?>>
                                        <span class="form-check-label">C - level</span>
                                    </label>
                                </div>
                                <!-- Work preference -->
                                <!-- <div class="accordion">
                                    <div class="form-label accordion-header" id="workPreferenceHeader">
                                        <span>Work preference</span>
                                        <span class="work-preference-toggle-icon" style="margin-left: 130px;">+</span>
                                    </div>
                                    <div class="accordion-content" id="workPreferenceContent">
                                        <div class="mb-4">
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="form-type[]"
                                                    value="1" checked>
                                                <span class="form-check-label">Part-time contract</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="form-type[]"
                                                    value="2" checked>
                                                <span class="form-check-label">Full-time contract</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="form-type[]"
                                                    value="3">
                                                <span class="form-check-label">Full-time employment</span>
                                            </label>
                                            <hr>
                                            <div class="mb-4">
                                                <label class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox">
                                                    <span class="form-check-label form-check-label-on">On</span>
                                                    <span class="form-check-label form-check-label-off">Off</span>
                                                </label>
                                                <div class="small text-secondary">Include developers not currently
                                                    interested</div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- Location -->
                                <!-- <div class="accordion">
                                    <div class="form-label accordion-header" id="locationHeader">
                                        <span>Location</span>
                                        <span class="location-toggle-icon" style="margin-left: 180px;">+</span>
                                    </div>
                                    <div class="accordion-content" id="locationContent">
                                        <div class="mb-4">
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="form-type[]"
                                                    value="1" checked>
                                                <span class="form-check-label">United States</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="form-type[]"
                                                    value="2" checked>
                                                <span class="form-check-label">India</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="form-type[]"
                                                    value="3">
                                                <span class="form-check-label">United Kingdom</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="form-type[]"
                                                    value="3">
                                                <span class="form-check-label">Canada</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="form-type[]"
                                                    value="3">
                                                <span class="form-check-label">Brazil</span>
                                            </label> -->

                                <!-- All locations -->
                                <!-- <div class="accordion">
                                                <div class="form-label accordion-header" id="allLocationsHeader">
                                                    <span style="font-size: 13px;">All locations</span>
                                                    <span class="all-locations-toggle-icon"
                                                        style="margin-left: 155px;">+</span>
                                                </div>
                                                <div class="accordion-content" id="allLocationsContent">
                                                    <div class="mb-4">
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="1" checked>
                                                            <span class="form-check-label">Albania</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="2" checked>
                                                            <span class="form-check-label">Algeria</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Andorra</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Angola</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Argentina</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Armenia</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Australia</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Austria</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Azerbaijan</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Bahamas</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Bangladesh</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Belgium</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Bhutan</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Bolivia</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Bosnia and Herzegovina</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Bulgaria</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Cambodia</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Cameroon</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Chile</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">China</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Colombia</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Costa Rica</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Croatia</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Cyprus</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Czechia</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Democratic Republic of
                                                                Congo</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Denmark</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Dominican Republic</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Ecuador</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Egypt</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">El Salvador</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Estonia</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Ethiopia</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Finland</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">France</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Georgia</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Germany</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Ghana</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Greece</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Guatemala</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Haiti</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Honduras</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Hungary</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Iceland</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Indonesia</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Iran</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Ireland</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Israel</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Italy</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Jamaica</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Japan</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Kazakhstan</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Kenya</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Latvia</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Lithuania</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Malaysia</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Mauritius</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Mexico</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Morocco</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Myanmar</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Nepal</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Netherlands</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">New Zealand</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Nigeria</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">North Macedonia</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Norway</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Oman</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Pakistan</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Paraguay</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Peru</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Philippines</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Poland</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Portugal</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Romania</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Russia</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Rwanda</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Senegal</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Serbia</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Singapore</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Slovakia</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Slovenia</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Somalia</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">South Africa</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Spain</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Sri Lanka</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Sweden</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Switzerland</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Taiwan</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Thailand</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">The Gambia</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Trinidad and Tobago</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Tunisia</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Turkey</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Uganda</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Ukraine</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">United Arab Emirates</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Uruguay</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Uzbekistan</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Venezuela</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Vietnam</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Yemen</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="form-type[]" value="3">
                                                            <span class="form-check-label">Zambia</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div> -->
                                <!-- </div>
                                    </div>
                                </div> -->
                                <!-- Timezone -->
                                <!-- <div class="accordion">
                                    <div class="form-label accordion-header" id="timezoneHeader">
                                        <span>Timezone</span>
                                        <span class="timezone-toggle-icon" style="margin-left: 170px;">+</span>
                                    </div>
                                    <div class="accordion-content" id="timezoneContent">
                                        <div class="mb-4">
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="form-type[]"
                                                    value="1" checked>
                                                <span class="form-check-label">GMT-10</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="form-type[]"
                                                    value="2" checked>
                                                <span class="form-check-label">GMT-8</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="form-type[]"
                                                    value="3">
                                                <span class="form-check-label">GMT-7</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="form-type[]"
                                                    value="3">
                                                <span class="form-check-label">GMT-6</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="form-type[]"
                                                    value="3">
                                                <span class="form-check-label">GMT-5</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="form-type[]"
                                                    value="3">
                                                <span class="form-check-label">GMT-4</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="form-type[]"
                                                    value="3">
                                                <span class="form-check-label">GMT-3</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="form-type[]"
                                                    value="3">
                                                <span class="form-check-label">GMT-1</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="form-type[]"
                                                    value="3">
                                                <span class="form-check-label">GMT</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="form-type[]"
                                                    value="3">
                                                <span class="form-check-label">GMT+1</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="form-type[]"
                                                    value="3">
                                                <span class="form-check-label">GMT+2</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="form-type[]"
                                                    value="3">
                                                <span class="form-check-label">GMT+3</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="form-type[]"
                                                    value="3">
                                                <span class="form-check-label">GMT+3.5</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="form-type[]"
                                                    value="3">
                                                <span class="form-check-label">GMT+4</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="form-type[]"
                                                    value="3">
                                                <span class="form-check-label">GMT+5</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="form-type[]"
                                                    value="3">
                                                <span class="form-check-label">GMT+5.5</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="form-type[]"
                                                    value="3">
                                                <span class="form-check-label">GMT+5.8</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="form-type[]"
                                                    value="3">
                                                <span class="form-check-label">GMT+6</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="form-type[]"
                                                    value="3">
                                                <span class="form-check-label">GMT+6.5</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="form-type[]"
                                                    value="3">
                                                <span class="form-check-label">GMT+7</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="form-type[]"
                                                    value="3">
                                                <span class="form-check-label">GMT+8</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="form-type[]"
                                                    value="3">
                                                <span class="form-check-label">GMT+9</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="form-type[]"
                                                    value="3">
                                                <span class="form-check-label">GMT+9.5</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="form-type[]"
                                                    value="3">
                                                <span class="form-check-label">GMT+10</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="form-type[]"
                                                    value="3">
                                                <span class="form-check-label">GMT+12</span>
                                            </label>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- Update the buttons -->
                                <div class="row mt-5">
                                    <a href="more-devs.php" class="col btn w-100">
                                        Clear
                                    </a>
                                    <button type="submit" class="col btn w-100"
                                        style="background-color: #fe7470; color: white; font-weight: bold;">
                                        Apply
                                    </button>
                                </div>
                            </form>
                        </div>
                        <!-- Filter for mobile -->
                        <div class="d-md-none">
                            <div class="accordion">
                                <div class="form-label accordion-header d-flex justify-content-between" id="mobileFilterHeader">
                                    <span>Filters</span>
                                    <span class="mobile-filter-toggle-icon">🔍</span>
                                </div>
                                <div class="accordion-content" id="mobileFilterContent">
                                    <form action="" method="get" id="mobileFilterForm" autocomplete="off" novalidate>
                                        <div class="form-label">Role level</div>
                                        <div class="mb-4">
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="role_levels[]" value="Junior">
                                                <span class="form-check-label">Junior</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="role_levels[]" value="Mid-level">
                                                <span class="form-check-label">Mid-level</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="role_levels[]" value="Senior">
                                                <span class="form-check-label">Senior</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="role_levels[]" value="Principal/staff">
                                                <span class="form-check-label">Principal / Staff</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="role_levels[]" value="C-level">
                                                <span class="form-check-label">C - level</span>
                                            </label>
                                        </div>
                                        <div class="row mt-3">
                                            <button type="submit" class="col btn w-100" style="background-color: #fe7470; color: white; font-weight: bold;">
                                                Apply
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Developer cards for desktop -->
                        <div class="col-md-9 d-none d-md-block">
                            <div class="row row-cards">
                                <div class="space-y">
                                    <div>
                                        <div class="row g-0">
                                            <div class="col-auto">
                                                <div class="card-body ps-0">
                                                    <div class="row">
                                                        <div class="col">
                                                            <p class="mb-0 text-secondary">Showing
                                                                <strong><?php echo count($developers); ?></strong>
                                                                of <strong>1300+ </strong>developers.
                                                                <!-- If there are any filters applied, display the reset filters link  -->
                                                                <?php if (!empty($_GET)): ?>
                                                                    <a href="more-devs.php" class="text-secondary">
                                                                        <strong>Reset filters</strong></a>
                                                                <?php endif; ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Developer cards for desktop-->
                                    <?php if (empty($developers)): ?>
                                        <p>No developers found for the selected criteria.</p>
                                    <?php else: ?>
                                        <?php foreach ($developers as $developer): ?>
                                            <div class="col-12 d-none d-md-block" style='cursor: pointer;'
                                                onclick="window.location='<?php echo path('developers', 'hire'); ?>?id=<?php echo $developer['id']; ?>';">
                                                <div class="card">
                                                    <!-- Card with image -->
                                                    <div class="row row-0 mb-2">
                                                        <div class="col-3 me-3 d-flex justify-content-center align-items-center">
                                                            <!-- Photo -->
                                                            <?php
                                                            $imageUrl = htmlspecialchars($developer['avatar_path']);
                                                            // Check if the image URL is valid
                                                            if (!empty($imageUrl)): ?>
                                                                <img src="<?php echo $imageUrl; ?>" class="card-img-start"
                                                                    alt="Developer image"
                                                                    loading="lazy"
                                                                    style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover;" />
                                                            <?php else: ?>
                                                                <img src="../Images/image.png" class="card-img-start" alt="Default image" loading="lazy"
                                                                    style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover;" oneerror="this.oneerror=null; this.src='../Images/image.png';" />
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
                                                                <p><span class="badge bg-green-lt">New profile</span></p>
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
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <!-- Developer cards for mobile -->
                        <div class="col-md-9 d-block d-md-none"><!-- Changed to d-block d-md-none to show on mobile and hide on desktop -->
                            <div class="row row-cards">
                                <div class="space-y">
                                    <div>
                                        <div class="row g-0">
                                            <div class="col-auto">
                                                <div class="card-body ps-0">
                                                    <div class="row">
                                                        <div class="col">
                                                            <p class="mb-0 text-secondary">Showing
                                                                <strong><?php echo count($developers); ?></strong>
                                                                of <strong>1300+ </strong>developers.
                                                                <!-- If there are any filters applied, display the reset filters link  -->
                                                                <?php if (!empty($_GET)): ?>
                                                                    <a href="more-devs.php" class="text-secondary">
                                                                        <strong>Reset filters</strong></a>
                                                                <?php endif; ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Developer cards for mobile-->
                                    <?php foreach ($developers as $developer): ?>
                                        <div class="col-12 d-md-none" style='cursor: pointer;'
                                            onclick="window.location='<?php echo path('developers', 'hire'); ?>?id=<?php echo $developer['id']; ?>';">
                                            <div class="card">
                                                <!-- Card with image -->
                                                <div class="row row-0 mb-2">
                                                    <div class="col-3 me-3 d-flex m-4">
                                                        <!-- Photo -->
                                                        <?php
                                                        $imageUrl = htmlspecialchars($developer['avatar_path']);
                                                        // Check if the image URL is valid
                                                        if (!empty($imageUrl) && @getimagesize($imageUrl)): ?>
                                                            <img src="<?php echo $imageUrl; ?>" class="card-img-start"
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
                                                            <p><span class="badge bg-green-lt">New profile</span></p>
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

    <!-- For the work preference accordion -->
    <script>
        const workPreferenceHeader = document.getElementById('workPreferenceHeader');
        const workPrefenceContent = document.getElementById('workPreferenceContent');
        const workPreferenceToggleIcon = workPreferenceHeader.querySelector('.work-preference-toggle-icon');

        workPreferenceHeader.addEventListener('click', function() {
            if (workPreferenceContent.style.display === 'block') {
                workPreferenceContent.style.display = 'none';
                workPreferenceToggleIcon.textContent = '+';
            } else {
                workPreferenceContent.style.display = 'block';
                workPreferenceToggleIcon.textContent = '−'; // This is a minus sign (U+2212)
            }
        });
    </script>

    <!-- For the location accordion -->
    <script>
        const locationHeader = document.getElementById('locationHeader');
        const locationContent = document.getElementById('locationContent');
        const locationToggleIcon = locationHeader.querySelector('.location-toggle-icon');

        locationHeader.addEventListener('click', function() {
            if (locationContent.style.display === 'block') {
                locationContent.style.display = 'none';
                locationToggleIcon.textContent = '+';
            } else {
                locationContent.style.display = 'block';
                locationToggleIcon.textContent = '−'; // This is a minus sign (U+2212)
            }
        });
    </script>

    <!-- For the all locations accordion -->
    <script>
        const allLocationsHeader = document.getElementById('allLocationsHeader');
        const allLocationsContent = document.getElementById('allLocationsContent');
        const allLocationsToggleIcon = allLocationsHeader.querySelector('.all-locations-toggle-icon');

        allLocationsHeader.addEventListener('click', function() {
            if (allLocationsContent.style.display === 'block') {
                allLocationsContent.style.display = 'none';
                allLocationsToggleIcon.textContent = '+';
            } else {
                allLocationsContent.style.display = 'block';
                allLocationsToggleIcon.textContent = '−'; // This is a minus sign (U+2212)
            }
        });
    </script>

    <!-- For the timezone accordion -->
    <script>
        const timezoneHeader = document.getElementById('timezoneHeader');
        const timezoneContent = document.getElementById('timezoneContent');
        const timezoneToggleIcon = timezoneHeader.querySelector('.timezone-toggle-icon');

        timezoneHeader.addEventListener('click', function() {
            if (timezoneContent.style.display === 'block') {
                timezoneContent.style.display = 'none';
                timezoneToggleIcon.textContent = '+';
            } else {
                timezoneContent.style.display = 'block';
                timezoneToggleIcon.textContent = '−'; // This is a minus sign (U+2212)
            }
        });
    </script>

    <!-- JavaScript for the pop-up requiring a paid account to see more devs -->
    <script>
        let hasScrolled = false;

        window.addEventListener('scroll', function() {
            if (!hasScrolled && window.scrollY > 300) {
                hasScrolled = true;
                const modal = new bootstrap.Modal(document.getElementById('paywall-popup'));
                const pageContent = document.querySelector('.page');

                // Add blur when showing modal
                modal._element.addEventListener('show.bs.modal', function() {
                    pageContent.classList.add('blur-content');
                });

                // Remove blur when hiding modal
                modal._element.addEventListener('hide.bs.modal', function() {
                    pageContent.classList.remove('blur-content');
                });

                modal.show();
            }
        });
    </script>

    <!-- For the filters accordion -->
    <script>
        const mobileFilterHeader = document.getElementById('mobileFilterHeader');
        const mobileFilterContent = document.getElementById('mobileFilterContent');
        const mobileFilterToggleIcon = mobileFilterHeader.querySelector('.mobile-filter-toggle-icon');

        mobileFilterHeader.addEventListener('click', function() {
            if (mobileFilterContent.style.display === 'block') {
                mobileFilterContent.style.display = 'none';
                mobileFilterToggleIcon.textContent = '🔍';
            } else {
                mobileFilterContent.style.display = 'block';
                mobileFilterToggleIcon.textContent = '❌'; // This is a minus sign (U+2212)
            }
        });
    </script>

    <!-- Add this script at the bottom of your page, before the closing body tag -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const navbarToggler = document.querySelector('.navbar-toggler');
            const navbarMenu = document.querySelector('#navbar-menu');

            navbarToggler.addEventListener('click', function() {
                navbarMenu.classList.toggle('show');
                // Update aria-expanded attribute
                const isExpanded = navbarMenu.classList.contains('show');
                navbarToggler.setAttribute('aria-expanded', isExpanded);
            });
        });
    </script>
</body>

</html>