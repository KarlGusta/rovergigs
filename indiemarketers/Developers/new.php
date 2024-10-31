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
        font-size: 15px !important;
        /* Adjust the font size as needed */
    }

    .custom-file-upload {
        display: inline-block;
        padding: 10px 20px;
        cursor: pointer;
        background-color: #fe7470;
        /* Button background color */
        color: white;
        /* Text color */
        border-radius: 5px;
        /* Rounded corners */
        text-align: center;
        /* Center the text */
        transition: background-color 0.3s;
        /* Smooth transition */
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
                <form action="submit_profile.php" method="post" enctype="multipart/form-data">
                    <div class="container-xl">
                        <div class="row row-deck row-cards">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h2>Your Developer Profile</h2>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3 row">
                                            <label class="col-3 col-form-label required">Name</label>
                                            <div class="col">
                                                <input type="text" name="name" class="form-control"
                                                    placeholder="Enter name">
                                                <small class="form-hint">Your name will not be displayed on your public
                                                    profile.</small>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-3 col-form-label required">Hero</label>
                                            <div class="col">
                                                <input type="text" name="hero" class="form-control"
                                                    placeholder="Summarize yourself...">
                                                <small class="form-hint">Summarize yourself as a developer in a few
                                                    words.</small>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-3 col-form-label required">Location</label>
                                            <div class="col-sm-6 col-md-3">
                                                <div class="mb-3">
                                                    <label class="form-label">City</label>
                                                    <input type="text" name="city" class="form-control"
                                                        placeholder="City">
                                                    <small class="form-hint">Providing your location makes it easier to
                                                        connect with
                                                        local business.</small>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-3">
                                                <div class="mb-3">
                                                    <label class="form-label">State</label>
                                                    <input type="text" name="state" class="form-control"
                                                        placeholder="City">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-3">
                                                <div class="mb-3">
                                                    <label class="form-label">Country</label>
                                                    <input type="text" name="country" class="form-control"
                                                        placeholder="City">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-3 col-form-label required">Avatar</label>
                                            <div class="col">
                                                <div class="row align-items-center">
                                                    <div class="col-auto"><span id="avatar-preview"
                                                            class="avatar avatar-xl"
                                                            style="background-image: url(../Images/image.png)"></span>
                                                    </div>
                                                    <div class="col-auto">
                                                        <label for="avatar-input" class="custom-file-upload">
                                                            Upload
                                                        </label>
                                                        <input type="file" name="avatar" class="btn" accept="image/*"
                                                            id="avatar-input" style="display: none;">
                                                        <!-- Updated to allow image upload -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Bio -->
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-3 row">
                                            <label class="col-3 col-form-label required">Bio</label>
                                            <div class="col">
                                                <div class="mb-3 mb-0">
                                                    <textarea rows="5" name="bio" class="form-control"
                                                        placeholder="Here can be your description">fdghghghjgns.</textarea>
                                                </div>
                                                <small class="form-hint">Share a few paragraphs on what makes you unique
                                                    as
                                                    a developer. This is your chance to market yourself to potential
                                                    employers – sell yourself a little!

                                                    Example topics
                                                    Your developer origin story
                                                    A recent milestone or accomplishment
                                                    Something new you learned
                                                    What you're passionate about
                                                    How you can help where others can't
                                                    Your unique skills that make you awesome
                                                    Markdown is supported but links and images are removed. Personally
                                                    identifiable information will be removed.</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Specialties -->
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-3 row">
                                            <div class="col-3 col-form-label pt-0">
                                                <h2>Specialties</h2>
                                                <small class="form-hint">
                                                    <p>Choose up to 5 specialties that set you apart from other
                                                        developers.
                                                        Pick ones that you are passionate about - you don't need to be
                                                        an
                                                        expert.</p>
                                                    <p>If you don't see a specialty that matches your unique skills you
                                                        can
                                                        suggest a new specialty.</p>
                                                    <p>This feature is in beta and might be changed. Add your
                                                        specialties
                                                        ASAP - businesses will be able to filter by them soon.</p>
                                                </small>
                                            </div>
                                            <div class="col-sm-6 col-md-3">
                                                <div class="mb-3 row">
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="specialties[]" value="A/B testing">
                                                        <span class="form-check-label">A/B testing</span>
                                                    </label>
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="specialties[]" value="AI">
                                                        <span class="form-check-label">AI</span>
                                                    </label>
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="specialties[]" value="Android">
                                                        <span class="form-check-label">Android</span>
                                                    </label>
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="specialties[]" value="API Integrations">
                                                        <span class="form-check-label">API Integrations</span>
                                                    </label>
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="specialties[]" value="Automated testing">
                                                        <span class="form-check-label">Automated testing</span>
                                                    </label>
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="specialties[]" value="Automation">
                                                        <span class="form-check-label">Automation</span>
                                                    </label>
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="specialties[]" value="AWS">
                                                        <span class="form-check-label">AWS</span>
                                                    </label>
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="specialties[]" value="Bootstrap">
                                                        <span class="form-check-label">Bootstrap</span>
                                                    </label>
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="specialties[]" value="Bullet Train">
                                                        <span class="form-check-label">Bullet Train</span>
                                                    </label>
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="specialties[]" value="Bulma">
                                                        <span class="form-check-label">Bulma</span>
                                                    </label>
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox">
                                                        <span class="form-check-label">CI/CD</span>
                                                    </label>
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="specialties[]" value="Database optimization">
                                                        <span class="form-check-label">Database optimization</span>
                                                    </label>
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="specialties[]" value="Design">
                                                        <span class="form-check-label">Design</span>
                                                    </label>
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="specialties[]" value="Developer happiness">
                                                        <span class="form-check-label">Developer happiness</span>
                                                    </label>
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="specialties[]" value="Vue.js">
                                                        <span class="form-check-label">Vue.js</span>
                                                    </label>
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="specialties[]" value="Webpack">
                                                        <span class="form-check-label">Webpack</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-3">
                                                <div class="mb-3 row">
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="specialties[]" value="DevOps">
                                                        <span class="form-check-label">DevOps</span>
                                                    </label>
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="specialties[]" value="Documentation">
                                                        <span class="form-check-label">Documentation</span>
                                                    </label>
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="specialties[]" value="Domain modeling">
                                                        <span class="form-check-label">Domain modeling</span>
                                                    </label>
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="specialties[]" value="Entrepreneur">
                                                        <span class="form-check-label">Entrepreneur</span>
                                                    </label>
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="specialties[]" value="Hotwire">
                                                        <span class="form-check-label">Hotwire</span>
                                                    </label>
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="specialties[]" value="iOS">
                                                        <span class="form-check-label">iOS</span>
                                                    </label>
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="specialties[]" value="jQuery">
                                                        <span class="form-check-label">jQuery</span>
                                                    </label>
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="specialties[]" value="Jumpstart Pro">
                                                        <span class="form-check-label">Jumpstart Pro</span>
                                                    </label>
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="specialties[]" value="Legacy code">
                                                        <span class="form-check-label">Legacy code</span>
                                                    </label>
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="specialties[]" value="Management">
                                                        <span class="form-check-label">Management</span>
                                                    </label>
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="specialties[]" value="Mentoring">
                                                        <span class="form-check-label">Mentoring</span>
                                                    </label>
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="specialties[]" value="NoSQL">
                                                        <span class="form-check-label">NoSQL</span>
                                                    </label>
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="specialties[]" value="Pair Programming">
                                                        <span class="form-check-label">Pair Programming</span>
                                                    </label>
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="specialties[]" value="Payments">
                                                        <span class="form-check-label">Payments</span>
                                                    </label>
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="specialties[]" value="ViewComponent">
                                                        <span class="form-check-label">ViewComponent</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-3">
                                                <div class="mb-3 row">
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="specialties[]" value="Performance optimization">
                                                        <span class="form-check-label">Performance optimization</span>
                                                    </label>
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="specialties[]" value="Product">
                                                        <span class="form-check-label">Product</span>
                                                    </label>
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="specialties[]" value="Rails upgrades">
                                                        <span class="form-check-label">Rails upgrades</span>
                                                    </label>
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="specialties[]" value="React">
                                                        <span class="form-check-label">React</span>
                                                    </label>
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="specialties[]" value="Refactoring">
                                                        <span class="form-check-label">Refactoring</span>
                                                    </label>
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="specialties[]" value="Security">
                                                        <span class="form-check-label">Security</span>
                                                    </label>
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="specialties[]" value="SQL">
                                                        <span class="form-check-label">SQL</span>
                                                    </label>
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="specialties[]" value="Stimulus">
                                                        <span class="form-check-label">Stimulus</span>
                                                    </label>
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="specialties[]" value="Stimulus Reflex">
                                                        <span class="form-check-label">Stimulus Reflex</span>
                                                    </label>
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="specialties[]" value="Tailwind CSS">
                                                        <span class="form-check-label">Tailwind CSS</span>
                                                    </label>
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="specialties[]" value="TDD">
                                                        <span class="form-check-label">TDD</span>
                                                    </label>
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="specialties[]" value="Test suite optimization">
                                                        <span class="form-check-label">Test suite optimization</span>
                                                    </label>
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="specialties[]" value="Turbo Native">
                                                        <span class="form-check-label">Turbo Native</span>
                                                    </label>
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="specialties[]" value="TypeScript">
                                                        <span class="form-check-label">TypeScript</span>
                                                    </label>
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="specialties[]" value="UX">
                                                        <span class="form-check-label">UX</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Work preferences -->
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-3 row">
                                            <div class="col-3 col-form-label pt-0">
                                                <h2>Work preferences</h2>
                                                <small class="form-hint">
                                                    <p>What kind of work are you looking for next?</p>
                                                </small>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3 row">
                                                    <h3>Search status</h3>
                                                    <label class="form-check form-check-inline" style="color: inherit;">
                                                        <input class="form-check-input" type="radio"
                                                            name="search_status" value="actively_looking">
                                                        <span class="form-check-label">Actively looking</span>
                                                        <small class="form-hint">Your profile can be featured on the
                                                            homepage</small>
                                                    </label>
                                                    <label class="form-check form-check-inline" style="color: inherit;">
                                                        <input class="form-check-input" type="radio"
                                                            name="search_status" value="open">
                                                        <span class="form-check-label">Open</span>
                                                        <small class="form-hint">Companies can still find you, but you
                                                            won't
                                                            appear on the homepage.</small>
                                                    </label>
                                                    <label class="form-check form-check-inline" style="color: inherit;">
                                                        <input class="form-check-input" type="radio"
                                                            name="search_status" value="not_interested">
                                                        <span class="form-check-label">Not interested</span>
                                                        <small class="form-hint">Your profile will not appear in search
                                                            results.</small>
                                                    </label>
                                                    <label class="form-check form-check-inline" style="color: inherit;">
                                                        <input class="form-check-input" type="radio"
                                                            name="search_status" value="invinsible">
                                                        <span class="form-check-label">Invinsible</span>
                                                        <small class="form-hint">Your profile is hidden and can only be
                                                            seen
                                                            by yourself.</small>
                                                    </label>
                                                    <h3>Role type</h3>
                                                    <label class="form-check form-check-inline" style="color: inherit;">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="role_types[]" value="Part-time contract">
                                                        <span class="form-check-label">Part-time contract</span>
                                                    </label>
                                                    <label class="form-check form-check-inline" style="color: inherit;"
                                                        name="role_types[]" value="Full-time contract">
                                                        <input class="form-check-input" type="checkbox">
                                                        <span class="form-check-label">Full-time contract</span>
                                                    </label>
                                                    <label class="form-check form-check-inline" style="color: inherit;"
                                                        name="role_types[]" value="Full-time employment">
                                                        <input class="form-check-input" type="checkbox">
                                                        <span class="form-check-label">Full-time employment</span>
                                                    </label>
                                                    <h3>Role level</h3>
                                                    <label class="form-check form-check-inline" style="color: inherit;">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="role_levels[]" value="Junior">
                                                        <span class="form-check-label">Junior</span>
                                                    </label>
                                                    <label class="form-check form-check-inline" style="color: inherit;">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="role_levels[]" value="Mid-level">
                                                        <span class="form-check-label">Mid-level</span>
                                                    </label>
                                                    <label class="form-check form-check-inline" style="color: inherit;">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="role_levels[]" value="Senior">
                                                        <span class="form-check-label">Senior</span>
                                                    </label>
                                                    <label class="form-check form-check-inline" style="color: inherit;">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="role_levels[]" value="Principal / staff">
                                                        <span class="form-check-label">Principal / staff</span>
                                                    </label>
                                                    <label class="form-check form-check-inline" style="color: inherit;">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="role_levels[]" value="C-level">
                                                        <span class="form-check-label">C-level</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Online presence -->
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-3 row">
                                            <div class="col-3 col-form-label pt-0">
                                                <h2>Online presence</h2>
                                                <small class="form-hint">
                                                    <p>Where can people learn more about you and your work?</p>
                                                </small>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3 row">
                                                    <h4>Website</h4>
                                                    <div class="input-group mb-2">
                                                        <span class="input-group-text">
                                                            https://
                                                        </span>
                                                        <input type="text" class="form-control" name="website"
                                                            autocomplete="off">
                                                    </div>
                                                    <h4>GitHub</h4>
                                                    <div class="input-group mb-2">
                                                        <span class="input-group-text">
                                                            github.com/
                                                        </span>
                                                        <input type="text" class="form-control" name="github"
                                                            autocomplete="off">
                                                    </div>
                                                    <h4>Gitlab</h4>
                                                    <div class="input-group mb-2">
                                                        <span class="input-group-text">
                                                            gitlab.com/
                                                        </span>
                                                        <input type="text" class="form-control" name="gitlab"
                                                            autocomplete="off">
                                                    </div>
                                                    <h4>LinkedIn</h4>
                                                    <div class="input-group mb-2">
                                                        <span class="input-group-text">
                                                            linkedin.com/in/
                                                        </span>
                                                        <input type="text" class="form-control" name="linkedin"
                                                            autocomplete="off">
                                                    </div>
                                                    <h4>Stack Overflow</h4>
                                                    <div class="input-group mb-2">
                                                        <span class="input-group-text">
                                                            stackoverflow/users/
                                                        </span>
                                                        <input type="text" class="form-control" name="stackoverflow"
                                                            autocomplete="off">
                                                    </div>
                                                    <h4>Twitter</h4>
                                                    <div class="input-group mb-2">
                                                        <span class="input-group-text">
                                                            twitter.com/
                                                        </span>
                                                        <input type="text" class="form-control" name="twitter"
                                                            autocomplete="off">
                                                    </div>
                                                    <h4>Mastodon</h4>
                                                    <div class="input-group mb-2">
                                                        <span class="input-group-text">
                                                            https://
                                                        </span>
                                                        <input type="text" class="form-control" name="mastodon"
                                                            autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Scheduling -->
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-3 row">
                                            <div class="col-3 col-form-label pt-0">
                                                <h2>Scheduling</h2>
                                                <small class="form-hint">
                                                    <p>Share your scheduling link (Calendly, SavvyCal, etc.) to make it
                                                        easier to organize interviews with businesses.</p>
                                                </small>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3 row">
                                                    <h4>Scheduling link</h4>
                                                    <div class="input-group mb-2">
                                                        <span class="input-group-text">
                                                            https://
                                                        </span>
                                                        <input type="text" class="form-control" name="scheduling_link"
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
                                            <div class="col-3 col-form-label pt-0">
                                                <h2>Email notifications</h2>
                                                <small class="form-hint">
                                                    <p>Share your scheduling link (Calendly, SavvyCal, etc.) to make it
                                                        easier to organize interviews with businesses.</p>
                                                </small>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3 row">
                                                    <label class="form-check form-check-inline" style="color: inherit;">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="profile_reminders" checked>
                                                        <span class="form-check-label">Profile reminders</span>
                                                        <small class="form-hint">Periodically remind me to update my
                                                            developer profile.</small>
                                                    </label>
                                                    <label class="form-check form-check-inline" style="color: inherit;">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="feature_announcements" checked>
                                                        <span class="form-check-label">Feature announcements</span>
                                                        <small class="form-hint">Keep me up to date with new product
                                                            features.</small>
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

    <!-- Show the image when the user uploads it -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const avatarInput = document.getElementById('avatar-input');
        const avatarPreview = document.getElementById('avatar-preview');

        avatarInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    avatarPreview.style.backgroundImage = `url(${e.target.result})`;
                }
                reader.readAsDataURL(file);
            }
        });
    });
    </script>
</body>

</html>