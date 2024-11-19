<?php
// Start the session
session_start();

// Include the path config. This is to make it easy to manage my URLs when I upload to production, that is cpanel
require_once './config/paths.php';

// For meta tags reusability
require_once 'meta-tags.php';
$metaTags = new MetaTags();
echo $metaTags->generateMetaTags('pricing'); // or 'about' or any other page ID
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

        .card,
        .card-md {
            border: none !important;
            /* Force removal of border */
            box-shadow: none !important;
            /* Force removal of shadow */
            border-radius: 0 !important;
            /* Force removal of rounded corners */
        }

        .row-cards {
            border: none !important;
            /* Ensure no border on the row */
        }

        .table {
            border: none !important;
            /* Ensure no border on the table */
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
    <link href="<?php echo path('assets', 'dist'); ?>css/tabler.min.css?1692870487" rel="stylesheet" />
    <link href="<?php echo path('assets', 'dist'); ?>css/tabler-flags.min.css?1692870487" rel="stylesheet" />
    <link href="<?php echo path('assets', 'dist'); ?>css/tabler-payments.min.css?1692870487" rel="stylesheet" />
    <link href="<?php echo path('assets', 'dist'); ?>css/tabler-vendors.min.css?1692870487" rel="stylesheet" />
    <link href="<?php echo path('assets', 'dist'); ?>css/demo.min.css?1692870487" rel="stylesheet" />

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
        <div class="page-wrapper">
            <div class="page-body">
                <div class="container-xl">
                    <div class="row row-deck row-cards">
                        <!--Front Banner-->
                        <div class="col-12">
                            <div class="card-md" style="background-color: #212121; color: #CFCFCF;">
                                <!-- Set height to 50% of the viewport height -->
                                <div class="card-body text-center" style="padding: 4rem;">
                                    <!-- Increased padding -->
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <!-- Changed to col-12 for full width -->
                                            <h3 class="h1" style="font-size: 3rem;">Hire Ruby on Rails developers</h3>
                                            <!-- Increased font size -->
                                            <p class="h3" style="font-size: 1.4rem; color: grey;">Directly connect with
                                                hundreds of Ruby on Rails developers looking for their next
                                                job.</p> <!-- Increased font size -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Pricing table -->
                        <div class="container-xl" style="border: 1px solid #CFCFCF;">
                            <div class="row row-cards">
                                <div class="col-sm-6 col-lg-8">
                                    <div class="card card-md" style="background-color: #212121; color: #CFCFCF;">
                                        <div class="col-12">
                                            <div class="card card-md" style="background-color: #212121; color: #CFCFCF;">
                                                <div class="card-body">
                                                    <div class="row align-items-center">
                                                        <div class="col">
                                                            <h2 class="h1">For your 1st hire and beyond</h2>
                                                            <p class="m-0 text-secondary">Skip the formal job postings
                                                                and middlemen – hire directly from a candidate pool of
                                                                Ruby on Rails developers, from juniors to C-level.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body text-center">
                                            <div class="row">
                                                <div class="col">
                                                    <ul class="list-unstyled lh-lg" style="text-align: left;">
                                                        <li>
                                                            <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="icon me-1 text-success" width="24" height="24"
                                                                viewBox="0 0 24 24" stroke-width="2"
                                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                                stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                <path d="M5 12l5 5l10 -10" />
                                                            </svg>
                                                            Exclusively Ruby on Rails developers
                                                        </li>
                                                        <li>
                                                            <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="icon me-1 text-success" width="24" height="24"
                                                                viewBox="0 0 24 24" stroke-width="2"
                                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                                stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                <path d="M5 12l5 5l10 -10" />
                                                            </svg>
                                                            Hand-selected matches every month
                                                        </li>
                                                        <li>
                                                            <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="icon me-1 text-success" width="24" height="24"
                                                                viewBox="0 0 24 24" stroke-width="2"
                                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                                stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                <path d="M5 12l5 5l10 -10" />
                                                            </svg>
                                                            Email and video support from the founder
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col">
                                                    <ul class="list-unstyled lh-lg" style="text-align: left;">
                                                        <li>
                                                            <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="icon me-1 text-success" width="24" height="24"
                                                                viewBox="0 0 24 24" stroke-width="2"
                                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                                stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                <path d="M5 12l5 5l10 -10" />
                                                            </svg>
                                                            Message directly with developers
                                                        </li>
                                                        <li>
                                                            <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="icon me-1 text-success" width="24" height="24"
                                                                viewBox="0 0 24 24" stroke-width="2"
                                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                                stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                <path d="M5 12l5 5l10 -10" />
                                                            </svg>
                                                            Email updates of new candidates
                                                        </li>
                                                        <li>
                                                            <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="icon me-1 text-success" width="24" height="24"
                                                                viewBox="0 0 24 24" stroke-width="2"
                                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                                stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                <path d="M5 12l5 5l10 -10" />
                                                            </svg>
                                                            Support independent developers and OSS
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                    <div class="card card-md" style="background-color: #212121; color: #CFCFCF;">
                                        <div class="card-body text-center">
                                            <div class="display-5 fw-bold my-3">$299<span class="text-secondary"
                                                    style="font-size: 16px;">/month</span></div>
                                            <a href="#" class="text-secondary">
                                                <u>+ 10% first year salary</u>
                                            </a>
                                            <div class="text-center mt-4">
                                                <a href="https://rovergigs.gumroad.com/l/iedec" class="btn w-100"
                                                    style="background-color: #F5AF00; color: #212121; font-weight: bold; padding: 15px 30px; font-size: 1.2rem;">Get started today</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of Pricing table -->
                        <!-- Social Proof-->
                        <div class="col-12">
                            <div class="card-md" style="background-color: #212121; color: #CFCFCF;">
                                <!-- Set height to 50% of the viewport height -->
                                <div class="card-body text-center" style="padding: 4rem;">
                                    <!-- Increased padding -->
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <!-- Changed to col-12 for full width -->
                                            <h3 class="h2" style="font-size: 3rem;">The Rails-only hiring platform</h3>
                                            <!-- Increased font size -->
                                            <p class="h4" style="font-size: 1.4rem; color: grey;">Organic, genuine
                                                conversations with higher response rates than LinkedIn or cold email.
                                            </p>
                                            <!-- Increased font size -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of Social Proof -->

                        <!-- Social proof cards -->
                        <div class="col-12" style="padding: 4rem;">
                            <div class="row row-cards">
                                <div class="col-sm-6 col-lg-4">
                                    <div class="card card-sm" style="background-color: #212121; color: #CFCFCF;">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <div style="font-weight: bold; font-size: 62px;">
                                                        1400+
                                                    </div>
                                                    <div style="font-size: 16px; color: grey;">
                                                        Rails developers
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                    <div class="card card-sm" style="background-color: #212121; color: #CFCFCF;">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <div style="font-weight: bold; font-size: 62px;">
                                                        62%
                                                    </div>
                                                    <div style="font-size: 16px; color: grey;">
                                                        Response rate
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                    <div class="card card-sm" style="background-color: #212121; color: #CFCFCF;">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <div style="font-weight: bold; font-size: 62px;">
                                                        40+
                                                    </div>
                                                    <div style="font-size: 16px; color: grey;">
                                                        New devs per month
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Testimonials part -->
                        <div class="col-12">
                            <div class="row row-cards">
                                <div class="col-sm-6 col-lg-4">
                                    <div class="card card-borderless" style="background-color: #212121; color: #CFCFCF;">
                                        <div class="card-body">
                                            <div class="row mb-4">
                                                <div class="col-auto">
                                                    <span class="avatar" style="background-image: url(<?php echo path('assets', 'images'); ?>/Sarah.png)"></span>
                                                </div>
                                                <div class="col">
                                                    <div class="text-truncate">
                                                        <strong>Sarah Thompson</strong>
                                                    </div>
                                                    <div>Founder, TechWorks Inc.</div>
                                                </div>
                                            </div>
                                            <div class="mb-4">⭐⭐⭐⭐⭐</div>
                                            <div>Hiring with Railshub was a breeze! We found a skilled Rails developer in record time, and the process was incredibly smooth. The platform's talent pool is impressive!</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                    <div class="card card-borderless" style="background-color: #212121; color: #CFCFCF;">
                                        <div class="card-body">
                                            <div class="row mb-4">
                                                <div class="col-auto">
                                                    <span class="avatar" style="background-image: url(<?php echo path('assets', 'images'); ?>/Mark.png)"></span>
                                                </div>
                                                <div class="col">
                                                    <div class="text-truncate">
                                                        <strong>Mark Jensen</strong>
                                                    </div>
                                                    <div>Tech Lead, BlueSky Solutions</div>
                                                </div>
                                            </div>
                                            <div class="mb-4">⭐⭐⭐⭐⭐</div>
                                            <div>Railshub made hiring seamless and efficient. We quickly connected with top-tier Rails developers who matched our project needs. Highly recommend for any team!</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                    <div class="card card-borderless" style="background-color: #212121; color: #CFCFCF;">
                                        <div class="card-body">
                                            <div class="row mb-4">
                                                <div class="col-auto">
                                                    <span class="avatar" style="background-image: url(<?php echo path('assets', 'images'); ?>/Michael.png)"></span>
                                                </div>
                                                <div class="col">
                                                    <div class="text-truncate">
                                                        <strong>Michael Johnson</strong>
                                                    </div>
                                                    <div>Founder, NexWave Labs</div>
                                                </div>
                                            </div>
                                            <div class="mb-4">⭐⭐⭐⭐⭐</div>
                                            <div>Railshub helped us find the perfect Rails developer within days. The quality of candidates was outstanding, and the platform’s interface made hiring easy and intuitive.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ part -->
                        <div class="page-header d-print-none">
                            <div class="row g-2 align-items-center">
                                <div class="col">
                                    <h2 class="page-title" style="background-color: #212121; color: #CFCFCF;">
                                        Frequently Asked Questions
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <!-- FAQ Body -->
                        <div class="col-12">
                            <div class="card card-md" style="background-color: #212121; color: #CFCFCF; border: 1px solid #CFCFCF !important;">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h3 style="font-weight: bold;">Does RailsHub cost anything for developers?</h3>                                            
                                        </div>
                                        <div class="col">                                            
                                            <p class="h3" style="color: grey;">No. RailsHub is free for developers.</p>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h3 style="font-weight: bold;">How does the 10% hiring fee work?</h3>                                            
                                        </div>
                                        <div class="col">                                            
                                            <p class="h3" style="color: grey;">If you hire a full-time employee through RailsHub you agree to pay a placement fee equal to 10% of their salary. Read the full hiring agreement for more details.</p>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h3 style="font-weight: bold;">Can I pay annually or yearly?</h3>                                            
                                        </div>
                                        <div class="col">                                            
                                            <p class="h3" style="color: grey;">Yes. DM Karl to set up discounted annual billing at karlgustaesimit@gmail.com</p>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h3 style="font-weight: bold;">Can I cancel my subscription at any time?</h3>                                            
                                        </div>
                                        <div class="col">                                            
                                            <p class="h3" style="color: grey;">Yes. You can cancel your subscription from the Billing link in the user drop-down. You will lose access to all paid features at the end of your billing period.</p>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h3 style="font-weight: bold;">Who can I contact for more specific questions?</h3>                                            
                                        </div>
                                        <div class="col">                                            
                                            <p class="h3" style="color: grey;">Email the founder – that's me, Karl! – with any questions. You can reach me on at karlgustaesimit@gmail.com</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Get started today part -->
                        <div class="col-12">
                            <div class="card card-md" style="background-color: #212121; color: #CFCFCF; border: 1px solid #CFCFCF !important;">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h3 class="h1" style="font-size: 25px; font-weight: bold; color: grey;">Ready to start hiring?</h3>
                                            <p class="h3" style="font-size: 25px; font-weight: bold;">Find your next Rails developer today.</p>
                                        </div>
                                        <div class="col-auto">
                                            <a href="https://rovergigs.gumroad.com/l/iedec" class="btn w-100"
                                                style="background-color: #F5AF00; color: #212121; font-weight: bold; padding: 15px 30px; font-size: 1.2rem;">Get started today</a>
                                        </div>
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
    <script src="<?php echo path('assets', 'dist'); ?>libs/apexcharts/dist/apexcharts.min.js" defer></script>
    <script src="<?php echo path('assets', 'dist'); ?>libs/jsvectormap/dist/js/jsvectormap.min.js" defer></script>
    <script src="<?php echo path('assets', 'dist'); ?>libs/jsvectormap/dist/maps/world.js" defer></script>
    <script src="<?php echo path('assets', 'dist'); ?>libs/jsvectormap/dist/maps/world-merc.js" defer></script>
    <!-- Tabler Core -->
    <script src="<?php echo path('assets', 'dist'); ?>js/tabler.min.js" defer></script>
    <script src="<?php echo path('assets', 'dist'); ?>js/demo.min.js" defer></script>
</body>

</html>