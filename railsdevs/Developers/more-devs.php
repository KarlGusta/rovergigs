<?php
require_once('../config/db.php');

// Initialize the WHERE clauses array
$where_clauses = [];
$params = [];

// Handle role level filters
if (!empty($_GET['role_level'])) {
    $role_levels = $_GET['role_level'];
    $placeholders = str_repeat('?,', count($role_levels) - 1) . '?';
    $where_clauses[] = "role_level IN ($placeholders)";
    $params = array_merge($params, $role_levels);
}

// Handle work preference filters
if (!empty($_GET['work_preference'])) {
    $work_preferences = $_GET['work_preference'];
    $placeholders = str_repeat('?,', count($work_preferences) - 1) . '?';
    $where_clauses[] = "work_preference IN ($placeholders)";
    $params = array_merge($params, $work_preferences);
}

// Handle location filters
if (!empty($_GET['location'])) {
    $locations = $_GET['location'];
    $placeholders = str_repeat('?,', count($locations) - 1) . '?';
    $where_clauses[] = "location IN ($placeholders)";
    $params = array_merge($params, $locations);
}

// Handle timezone filters
if (!empty($_GET['timezone'])) {
    $timezones = $_GET['timezone'];
    $placeholders = str_repeat('?,', count($timezones) - 1) . '?';
    $where_clauses[] = "timezone IN ($placeholders)";
    $params = array_merge($params, $timezones);
}

// Build the final query
$sql = "SELECT * FROM developer_profiles";
if (!empty($where_clauses)) {
    $sql .= " WHERE " . implode(' AND ', $where_clauses);
}
$sql .= " ORDER BY created_at DESC";

// Prepare and execute the query
$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$developers = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
</head>

<body>
    <div class="page">
    <header class="navbar navbar-expand-md navbar-light d-print-none">
            <div class="container-xl">
                <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                    <a href=".">
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
        <!-- Page wrapper -->
        <div class="page-wrapper">
            <!-- Page header -->
            <div class="page-header d-print-none">
                <div class="container-xl">
                    <!-- Front banner card -->
                    <div class="col-12">
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
                                        <a href="/rovergigs/railsdevs/Developers/new.php" class="btn"
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
                        <div class="col-md-3">
                            <form action="./" method="get" autocomplete="off" novalidate class="sticky-top">
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
                                        <input type="checkbox" class="form-check-input" name="role_level[]" value="junior" <?php echo in_array('junior', $_GET['role_level'] ?? []) ? 'checked' : ''; ?>>
                                        <span class="form-check-label">Junior</span>
                                    </label>
                                    <label class="form-check">
                                        <input type="checkbox" class="form-check-input" name="role_level[]" value="mid-level" <?php echo in_array('mid-level', $_GET['role_level'] ?? []) ? 'checked' : ''; ?>>
                                        <span class="form-check-label">Mid-level</span>
                                    </label>
                                    <label class="form-check">
                                        <input type="checkbox" class="form-check-input" name="role_level[]" value="senior" <?php echo in_array('senior', $_GET['role_level'] ?? []) ? 'checked' : ''; ?>>
                                        <span class="form-check-label">Senior</span>
                                    </label>
                                    <label class="form-check">
                                        <input type="checkbox" class="form-check-input" name="role_level[]" value="principal" <?php echo in_array('principal', $_GET['role_level'] ?? []) ? 'checked' : ''; ?>>
                                        <span class="form-check-label">Principal / Staff</span>
                                    </label>
                                    <label class="form-check">
                                        <input type="checkbox" class="form-check-input" name="role_level[]" value="c-level" <?php echo in_array('c-level', $_GET['role_level'] ?? []) ? 'checked' : ''; ?>>
                                        <span class="form-check-label">C - level</span>
                                    </label>
                                </div>
                                <!-- Work preference -->
                                <div class="accordion">
                                    <div class="form-label accordion-header" id="workPreferenceHeader">
                                        <span>Work preference</span>
                                        <span class="work-preference-toggle-icon" style="margin-left: 130px;">+</span>
                                    </div>
                                    <div class="accordion-content" id="workPreferenceContent">
                                        <div class="mb-4">
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="work_preference[]" value="part-time" <?php echo in_array('part-time', $_GET['work_preference'] ?? []) ? 'checked' : ''; ?>>
                                                <span class="form-check-label">Part-time contract</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="work_preference[]" value="full-time" <?php echo in_array('full-time', $_GET['work_preference'] ?? []) ? 'checked' : ''; ?>>
                                                <span class="form-check-label">Full-time contract</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="work_preference[]" value="full-time-employment" <?php echo in_array('full-time-employment', $_GET['work_preference'] ?? []) ? 'checked' : ''; ?>>
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
                                </div>
                                <!-- Location -->
                                <div class="accordion">
                                    <div class="form-label accordion-header" id="locationHeader">
                                        <span>Location</span>
                                        <span class="location-toggle-icon" style="margin-left: 180px;">+</span>
                                    </div>
                                    <div class="accordion-content" id="locationContent">
                                        <div class="mb-4">
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="location[]" value="united-states" <?php echo in_array('united-states', $_GET['location'] ?? []) ? 'checked' : ''; ?>>
                                                <span class="form-check-label">United States</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="location[]" value="india" <?php echo in_array('india', $_GET['location'] ?? []) ? 'checked' : ''; ?>>
                                                <span class="form-check-label">India</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="location[]" value="united-kingdom" <?php echo in_array('united-kingdom', $_GET['location'] ?? []) ? 'checked' : ''; ?>>
                                                <span class="form-check-label">United Kingdom</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="location[]" value="canada" <?php echo in_array('canada', $_GET['location'] ?? []) ? 'checked' : ''; ?>>
                                                <span class="form-check-label">Canada</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="location[]" value="brazil" <?php echo in_array('brazil', $_GET['location'] ?? []) ? 'checked' : ''; ?>>
                                                <span class="form-check-label">Brazil</span>
                                            </label>

                                            <!-- All locations -->
                                            <div class="accordion">
                                                <div class="form-label accordion-header" id="allLocationsHeader">
                                                    <span style="font-size: 13px;">All locations</span>
                                                    <span class="all-locations-toggle-icon"
                                                        style="margin-left: 155px;">+</span>
                                                </div>
                                                <div class="accordion-content" id="allLocationsContent">
                                                    <div class="mb-4">
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input" 
                                                                name="location[]" value="albania" 
                                                                <?php echo in_array('albania', $_GET['location'] ?? []) ? 'checked' : ''; ?>>
                                                            <span class="form-check-label">Albania</span>
                                                        </label>
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input" 
                                                                name="location[]" value="algeria"
                                                                <?php echo in_array('algeria', $_GET['location'] ?? []) ? 'checked' : ''; ?>>
                                                            <span class="form-check-label">Algeria</span>
                                                        </label>
                                                        <!-- Continue this pattern for other countries -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Timezone -->
                                <div class="accordion">
                                    <div class="form-label accordion-header" id="timezoneHeader">
                                        <span>Timezone</span>
                                        <span class="timezone-toggle-icon" style="margin-left: 170px;">+</span>
                                    </div>
                                    <div class="accordion-content" id="timezoneContent">
                                        <div class="mb-4">
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="timezone[]" value="GMT-10" <?php echo in_array('GMT-10', $_GET['timezone'] ?? []) ? 'checked' : ''; ?>>
                                                <span class="form-check-label">GMT-10</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="timezone[]" value="GMT-8" <?php echo in_array('GMT-8', $_GET['timezone'] ?? []) ? 'checked' : ''; ?>>
                                                <span class="form-check-label">GMT-8</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="timezone[]" value="GMT-7" <?php echo in_array('GMT-7', $_GET['timezone'] ?? []) ? 'checked' : ''; ?>>
                                                <span class="form-check-label">GMT-7</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="timezone[]" value="GMT-6" <?php echo in_array('GMT-6', $_GET['timezone'] ?? []) ? 'checked' : ''; ?>>
                                                <span class="form-check-label">GMT-6</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="timezone[]" value="GMT-5" <?php echo in_array('GMT-5', $_GET['timezone'] ?? []) ? 'checked' : ''; ?>>
                                                <span class="form-check-label">GMT-5</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="timezone[]" value="GMT-4" <?php echo in_array('GMT-4', $_GET['timezone'] ?? []) ? 'checked' : ''; ?>>
                                                <span class="form-check-label">GMT-4</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="timezone[]" value="GMT-3" <?php echo in_array('GMT-3', $_GET['timezone'] ?? []) ? 'checked' : ''; ?>>
                                                <span class="form-check-label">GMT-3</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="timezone[]" value="GMT-1" <?php echo in_array('GMT-1', $_GET['timezone'] ?? []) ? 'checked' : ''; ?>>
                                                <span class="form-check-label">GMT-1</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="timezone[]" value="GMT" <?php echo in_array('GMT', $_GET['timezone'] ?? []) ? 'checked' : ''; ?>>
                                                <span class="form-check-label">GMT</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="timezone[]" value="GMT+1" <?php echo in_array('GMT+1', $_GET['timezone'] ?? []) ? 'checked' : ''; ?>>
                                                <span class="form-check-label">GMT+1</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="timezone[]" value="GMT+2" <?php echo in_array('GMT+2', $_GET['timezone'] ?? []) ? 'checked' : ''; ?>>
                                                <span class="form-check-label">GMT+2</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="timezone[]" value="GMT+3" <?php echo in_array('GMT+3', $_GET['timezone'] ?? []) ? 'checked' : ''; ?>>
                                                <span class="form-check-label">GMT+3</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="timezone[]" value="GMT+3.5" <?php echo in_array('GMT+3.5', $_GET['timezone'] ?? []) ? 'checked' : ''; ?>>
                                                <span class="form-check-label">GMT+3.5</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="timezone[]" value="GMT+4" <?php echo in_array('GMT+4', $_GET['timezone'] ?? []) ? 'checked' : ''; ?>>
                                                <span class="form-check-label">GMT+4</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="timezone[]" value="GMT+5" <?php echo in_array('GMT+5', $_GET['timezone'] ?? []) ? 'checked' : ''; ?>>
                                                <span class="form-check-label">GMT+5</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="timezone[]" value="GMT+5.5" <?php echo in_array('GMT+5.5', $_GET['timezone'] ?? []) ? 'checked' : ''; ?>>
                                                <span class="form-check-label">GMT+5.5</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="timezone[]" value="GMT+5.8" <?php echo in_array('GMT+5.8', $_GET['timezone'] ?? []) ? 'checked' : ''; ?>>
                                                <span class="form-check-label">GMT+5.8</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="timezone[]" value="GMT+6" <?php echo in_array('GMT+6', $_GET['timezone'] ?? []) ? 'checked' : ''; ?>>
                                                <span class="form-check-label">GMT+6</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="timezone[]" value="GMT+6.5" <?php echo in_array('GMT+6.5', $_GET['timezone'] ?? []) ? 'checked' : ''; ?>>
                                                <span class="form-check-label">GMT+6.5</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="timezone[]" value="GMT+7" <?php echo in_array('GMT+7', $_GET['timezone'] ?? []) ? 'checked' : ''; ?>>
                                                <span class="form-check-label">GMT+7</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="timezone[]" value="GMT+8" <?php echo in_array('GMT+8', $_GET['timezone'] ?? []) ? 'checked' : ''; ?>>
                                                <span class="form-check-label">GMT+8</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="timezone[]" value="GMT+9" <?php echo in_array('GMT+9', $_GET['timezone'] ?? []) ? 'checked' : ''; ?>>
                                                <span class="form-check-label">GMT+9</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="timezone[]" value="GMT+9.5" <?php echo in_array('GMT+9.5', $_GET['timezone'] ?? []) ? 'checked' : ''; ?>>
                                                <span class="form-check-label">GMT+9.5</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="timezone[]" value="GMT+10" <?php echo in_array('GMT+10', $_GET['timezone'] ?? []) ? 'checked' : ''; ?>>
                                                <span class="form-check-label">GMT+10</span>
                                            </label>
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input" name="timezone[]" value="GMT+12" <?php echo in_array('GMT+12', $_GET['timezone'] ?? []) ? 'checked' : ''; ?>>
                                                <span class="form-check-label">GMT+12</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <a href="#" class="col btn w-100">
                                        Clear
                                    </a>
                                    <button class="col btn w-100"
                                        style="background-color: #fe7470; color: white; font-weight: bold;">
                                        Apply
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-9">
                            <div class="row row-cards">
                                <div class="space-y">
                                    <div>
                                        <div class="row g-0">
                                            <div class="col-auto">
                                                <div class="card-body ps-0">
                                                    <div class="row">
                                                        <div class="col">
                                                            <p class="mb-0 text-secondary">
                                                                Showing <strong><?php echo count($developers); ?></strong> developers
                                                                <?php if (!empty($_GET)): ?>
                                                                    <a href="./" class="text-secondary"> <strong>Reset filters</strong></a>
                                                                <?php endif; ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Developer cards -->
                                    <?php foreach ($developers as $developer): ?>
                                    <div class="card">
                                        <div class="row g-0">
                                            <div class="col-12" style='cursor: pointer;' onclick="window.location='/rovergigs/railsdevs/Developers/hire.php?id=<?php echo $developer['id']; ?>';">
                                                <div class="card">
                                                    <div class="row row-0 mb-2">
                                                        <div class="col-3 me-3 d-flex justify-content-center align-items-center">
                                                            <img src="<?php echo htmlspecialchars($developer['avatar_path']); ?>" 
                                                                 class="card-img-start" 
                                                                 alt="Developer image"
                                                                 style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover;" />
                                                        </div>
                                                        <div class="col">
                                                            <div class="card-body">
                                                                <div class="d-flex justify-content-between align-items-center">
                                                                    <h3 class="card-title" style="font-weight: bold; font-size: 20px;">
                                                                        <?php echo htmlspecialchars($developer['hero']); ?>
                                                                    </h3>
                                                                    <?php if (isset($developer['actively_looking']) && $developer['actively_looking']): ?>
                                                                    <p>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                                                             fill="none" stroke="#22C55E" stroke-width="2" stroke-linecap="round"
                                                                             stroke-linejoin="round"
                                                                             class="icon icon-tabler icons-tabler-outline icon-tabler-checkbox">
                                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                            <path d="M9 11l3 3l8 -8" />
                                                                            <path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" />
                                                                        </svg>
                                                                        <span style="color: #22C55E;">Actively looking</span>
                                                                    </p>
                                                                    <?php endif; ?>
                                                                </div>
                                                                <?php if ($developer['feature_announcements']): ?>
                                                                <p><span class="badge bg-green-lt">New profile</span></p>
                                                                <?php endif; ?>
                                                                <p class="text-secondary"><?php echo htmlspecialchars($developer['bio']); ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
                            <a href="https://twitter.com/weareremoteokay" target="_blank" class="link-secondary"
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
                            <a href="https://www.linkedin.com/company/we-are-remote-okay/" target="_blank"
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
                            <a href="www.rovergigs.com" class="link-secondary">Rover Gigs</a>.
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

    <!-- For the work preference accordion -->
    <script>
        const workPreferenceHeader = document.getElementById('workPreferenceHeader');
        const workPrefenceContent = document.getElementById('workPreferenceContent');
        const workPreferenceToggleIcon = workPreferenceHeader.querySelector('.work-preference-toggle-icon');

        workPreferenceHeader.addEventListener('click', function () {
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

        locationHeader.addEventListener('click', function () {
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

        allLocationsHeader.addEventListener('click', function () {
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

        timezoneHeader.addEventListener('click', function () {
            if (timezoneContent.style.display === 'block') {
                timezoneContent.style.display = 'none';
                timezoneToggleIcon.textContent = '+';
            } else {
                timezoneContent.style.display = 'block';
                timezoneToggleIcon.textContent = '−'; // This is a minus sign (U+2212)
            }
        });
    </script>
</body>

</html>