<?php
// Include the path config. This is to make it easy to manage my URLs when I upload to production, that is cpanel
require_once 'config/paths.php';
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
    <meta property="og:title" content="Rover Gigs" />
    <meta property="og:type" content="remote jobs" />
    <meta property="og:url" content="https://rovergigs.com" />
    <meta property="og:image"
        content="https://dev-to-uploads.s3.amazonaws.com/uploads/articles/0p4eq5kustxxpk2mbe2t.png" />
    <meta property="og:description" content="A global community of remote workers." />
    <meta property="og:site_name" content="Rover Gigs" />
    <meta property="og:locale" content="en_US" />

    <title>Rovergigs - Apply</title>

    <!-- CSS Styles -->
    <style>
        body {
            font-family: 'Bricolage Grotesque', sans-serif !important;
            /* Change font to Bricolage Grotesque */
            font-size: 15px !important;
            /* Adjust the font size as needed */
            background-color: #FFD015 !important;
            /* Change background color to #212121 */
            color: #0B090A;
            /* Change text color to #CFCFCF */
        }
    </style>
    <!-- CSS files -->
    <link href="<?php echo path('assets', 'dist'); ?>css/tabler.min.css" rel="stylesheet" />
    <link href="<?php echo path('assets', 'dist'); ?>css/tabler-flags.min.css" rel="stylesheet" />
    <link href="<?php echo path('assets', 'dist'); ?>css/tabler-payments.min.css" rel="stylesheet" />
    <link href="<?php echo path('assets', 'dist'); ?>css/tabler-vendors.min.css" rel="stylesheet" />
    <link href="<?php echo path('assets', 'dist'); ?>css/demo.min.css" rel="stylesheet" />

    <!--Favicon-->
    <link rel="icon" type="image/x-icon" href="src/img/logo/rovergigs_logo.png">

        <!-- For the font -->
        <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="page">
        <header class="navbar navbar-expand-md navbar-light d-print-none" style="background-color: #FFD015;">
            <div class="container-xl">
                <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                    <a href="." style="text-decoration: none;">
                        Rover Gigs
                    </a>
                </h1>
            </div>
        </header>
        <div class="page-wrapper">
            <div class="page-body">
                <div class="container-xl">
                    <div class="row row-deck row-cards">
                        <!--Connection to the database-->
                        <?php
                        // Get id from the url
                        $id = $_GET['id'];

                        require_once 'config/db.php';

                        // Create connection to the database
                        $connection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

                        // Check if the connection is established correctly or not
                        if ($connection->connect_error) {
                            die("Connection failed: " . $connection->connect_error);
                        }

                        /**
                         * Else, the connection is good, we can read the data
                         * Read all row from the database table
                         */
                        $sql = "SELECT * FROM jobs where jobId = $id";
                        $result = $connection->query($sql);

                        // If the query does not execute correctly
                        if (!$result) {
                            die("Invalid query: " . $connection->error);
                        }

                        // Otherwise, we read the data using the while loop
                        while ($row = $result->fetch_assoc()) {
                            $word = "@";
                            $applicationLinkOrEmailFromDB = "$row[applicationLinkOrEmail]";

                            // Test if string contains the word 
                            if (strpos($applicationLinkOrEmailFromDB, $word) !== false) {
                                echo "
                                <!--Organization Description-->
                              <div class='col-12'>
                                  <div class='card card-md' style='background-color: #FFD015; color:#0B090A;'>
                                      <div class='card-body'>
                                          <div class='row align-items-center'>
                                              <div class='col-10'>
                                                  <h3 class='h1'>Organization name - $row[companyName]</h3>
                                                  <div class='markdown text-muted'>
                                                      $row[companyDescription]
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
      
                              <!--Job Description-->
                                <div class='col-12'>
                                  <div class='card card-md' style='background-color: #FFD015; color:#0B090A;'>
                                      <div class='card-body'>
                                          <div class='row align-items-center'>
                                              <div class='col-10'>
                                                  <h3 class='h1'>Job Description</h3>
                                                  <div class='markdown text-muted'>
                                                      $row[jobDescription]
                                                  </div>
                                                  <div class='mt-3'>                                                      
                                                      <input type='hidden' value='<?php $row[applicationLinkOrEmail] ?>'
                        id='myInput'>
                        <p id='emailFromDBToBeCopied' style='display:none'>$row[applicationLinkOrEmail]</p>
                        <button type='button' class='btn btn-success' id='emailCopiedToClipboardButton'
                            style='display:none;' data-bs-toggle='tooltip' data-bs-placement='right'
                            title='Email Copied to clipboard'>Email copied!</button>
                        <button type='button' id='buttonToBeClickedToCopyEmail' class='btn btn-danger' style='background-color: #F1F2F6; color:#0B090A;' id='button1'
                            onclick='copyContent()'>Apply for job</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Benefits -->
    <div class='col-12'>
        <div class='card card-md' style='background-color: #FFD015; color:#0B090A;'>
            <div class='card-body'>
                <div class='row align-items-center'>
                    <div class='col-10'>
                        <h3 class='h1'>Benefits</h3>
                        <div class='list-group list-group-flush'>
                            <a href='#' class='list-group-item-action'>💰 401(k)</a>
                            <a href='#' class='list-group-item-action'>🌎 Distributed team</a>
                            <a href='#' class='list-group-item-action'>⏰ Async</a>
                            <a href='#' class='list-group-item-action'>🤓 Vision insurance</a>
                            <a href='#' class='list-group-item-action'>🦷 Dental insurance</a>
                            <a href='#' class='list-group-item-action'>🚑 Medical insurance</a>
                            <a href='#' class='list-group-item-action'>🏖 Unlimited vacation</a>
                            <a href='#' class='list-group-item-action'>🏖 Paid time off</a>
                            <a href='#' class='list-group-item-action'>📆 4 day workweek</a>
                            <a href='#' class='list-group-item-action'>💰 401k matching</a>
                            <a href='#' class='list-group-item-action'>🏔 Company retreats</a>
                            <a href='#' class='list-group-item-action'>🏬 Coworking budget</a>
                            <a href='#' class='list-group-item-action'>📚 Learning budget</a>
                            <a href='#' class='list-group-item-action'>💪 Free gym membership</a>
                            <a href='#' class='list-group-item-action'>🧘 Mental wellness budget</a>
                            <a href='#' class='list-group-item-action'>🖥 Home office budget</a>
                            <a href='#' class='list-group-item-action'>🥧 Pay in crypto</a>
                            <a href='#' class='list-group-item-action'>🥸 Pseudonymous</a>
                            <a href='#' class='list-group-item-action'>💰 Profit sharing</a>
                            <a href='#' class='list-group-item-action'>💰 Equity compensation</a>
                            <a href='#' class='list-group-item-action'>⬜️ No whiteboard interview</a>
                            <a href='#' class='list-group-item-action'>👀 No monitoring system</a>
                            <a href='#' class='list-group-item-action'>🚫 No politics at work</a>
                            <a href='#' class='list-group-item-action'>🎅 We hire old (and young)</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Share this job-->
    <div class='col-12'>
        <div class='card card-md' style='background-color: #FFD015; color:#0B090A;'>
            <div class='card-body'>
                <div class='row align-items-center'>
                    <h4>
                        Share this job
                    </h4>
                    <div class='col-10'>
                        <!-- AddToAny BEGIN -->
                        <div class='a2a_kit a2a_kit_size_32 a2a_default_style'
                            data-a2a-title='$row[companyName] is hiring $row[jobTitle]! 🚀 via Rover Gigs'>
                            <a>
                                <!-- Download SVG icon from http://tabler-icons.io/i/send -->
                                <svg xmlns='http://www.w3.org/2000/svg' class='icon' width='24' height='24'
                                    viewBox='0 0 24 24' stroke-width='2' stroke='currentColor' fill='none'
                                    stroke-linecap='round' stroke-linejoin='round'>
                                    <path stroke='none' d='M0 0h24v24H0z' fill='none' />
                                    <line x1='10' y1='14' x2='21' y2='3' />
                                    <path
                                        d='M21 3l-6.5 18a0.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a0.55 .55 0 0 1 0 -1l18 -6.5' />
                                </svg>
                            </a>
                            <a class='a2a_button_twitter'>
                                <!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
                                <svg xmlns='http://www.w3.org/2000/svg' class='icon' width='24' height='24'
                                    viewBox='0 0 24 24' stroke-width='2' stroke='currentColor' fill='none'
                                    stroke-linecap='round' stroke-linejoin='round'>
                                    <path stroke='none' d='M0 0h24v24H0z' fill='none' />
                                    <path
                                        d='M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c-.002 -.249 1.51 -2.772 1.818 -4.013z' />
                                </svg>
                            </a>
                            <a class='a2a_button_linkedin'>
                                <!-- Download SVG icon from http://tabler-icons.io/i/brand-linkedin -->
                                <svg xmlns='http://www.w3.org/2000/svg' class='icon' width='24' height='24'
                                    viewBox='0 0 24 24' stroke-width='2' stroke='currentColor' fill='none'
                                    stroke-linecap='round' stroke-linejoin='round'>
                                    <path stroke='none' d='M0 0h24v24H0z' fill='none' />
                                    <rect x='4' y='4' width='16' height='16' rx='2' />
                                    <line x1='8' y1='11' x2='8' y2='16' />
                                    <line x1='8' y1='8' x2='8' y2='8.01' />
                                    <line x1='12' y1='16' x2='12' y2='11' />
                                    <path d='M16 16v-3a2 2 0 0 0 -4 0' />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    ";
                            } else {
                                echo "
    <!--Organization Description-->
    <div class='col-12'>
        <div class='card card-md'>
            <div class='card-body'>
                <div class='row align-items-center'>
                    <div class='col-10'>
                        <h3 class='h1'>Organization name - $row[companyName]</h3>
                        <div class='markdown text-muted'>
                            $row[companyDescription]
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Job Description-->
    <div class='col-12'>
        <div class='card card-md'>
            <div class='card-body'>
                <div class='row align-items-center'>
                    <div class='col-10'>
                        <h3 class='h1'>Job Description</h3>
                        <div class='markdown text-muted'>
                            $row[jobDescription]
                        </div>
                        <div class='mt-3'>
                            <a href='https://$row[applicationLinkOrEmail]' class='btn btn-danger'>Apply for the job</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Benefits -->
    <div class='col-12'>
        <div class='card card-md'>
            <div class='card-body'>
                <div class='row align-items-center'>
                    <div class='col-10'>
                        <h3 class='h1'>Benefits</h3>
                        <div class='list-group list-group-flush'>
                            <a href='#' class='list-group-item list-group-item-action'>💰 401(k)</a>
                            <a href='#' class='list-group-item list-group-item-action'>🌎 Distributed team</a>
                            <a href='#' class='list-group-item list-group-item-action'>⏰ Async</a>
                            <a href='#' class='list-group-item list-group-item-action'>🤓 Vision insurance</a>
                            <a href='#' class='list-group-item list-group-item-action'>🦷 Dental insurance</a>
                            <a href='#' class='list-group-item list-group-item-action'>🚑 Medical insurance</a>
                            <a href='#' class='list-group-item list-group-item-action'>🏖 Unlimited vacation</a>
                            <a href='#' class='list-group-item list-group-item-action'>🏖 Paid time off</a>
                            <a href='#' class='list-group-item list-group-item-action'>📆 4 day workweek</a>
                            <a href='#' class='list-group-item list-group-item-action'>💰 401k matching</a>
                            <a href='#' class='list-group-item list-group-item-action'>🏔 Company retreats</a>
                            <a href='#' class='list-group-item list-group-item-action'>🏬 Coworking budget</a>
                            <a href='#' class='list-group-item list-group-item-action'>📚 Learning budget</a>
                            <a href='#' class='list-group-item list-group-item-action'>💪 Free gym membership</a>
                            <a href='#' class='list-group-item list-group-item-action'>🧘 Mental wellness budget</a>
                            <a href='#' class='list-group-item list-group-item-action'>🖥 Home office budget</a>
                            <a href='#' class='list-group-item list-group-item-action'>🥧 Pay in crypto</a>
                            <a href='#' class='list-group-item list-group-item-action'>🥸 Pseudonymous</a>
                            <a href='#' class='list-group-item list-group-item-action'>💰 Profit sharing</a>
                            <a href='#' class='list-group-item list-group-item-action'>💰 Equity compensation</a>
                            <a href='#' class='list-group-item list-group-item-action'>⬜️ No whiteboard interview</a>
                            <a href='#' class='list-group-item list-group-item-action'>👀 No monitoring system</a>
                            <a href='#' class='list-group-item list-group-item-action'>🚫 No politics at work</a>
                            <a href='#' class='list-group-item list-group-item-action'>🎅 We hire old (and young)</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Share this job-->
    <div class='col-12'>
        <div class='card card-md'>
            <div class='card-body'>
                <div class='row align-items-center'>
                    <h4>
                        Share this job
                    </h4>
                    <div class='col-10'>
                        <!-- AddToAny BEGIN -->
                        <div class='a2a_kit a2a_kit_size_32 a2a_default_style'
                            data-a2a-title='$row[companyName] is hiring $row[jobTitle]! 🚀 via Rover Gigs'>
                            <a>
                                <!-- Download SVG icon from http://tabler-icons.io/i/send -->
                                <svg xmlns='http://www.w3.org/2000/svg' class='icon' width='24' height='24'
                                    viewBox='0 0 24 24' stroke-width='2' stroke='currentColor' fill='none'
                                    stroke-linecap='round' stroke-linejoin='round'>
                                    <path stroke='none' d='M0 0h24v24H0z' fill='none' />
                                    <line x1='10' y1='14' x2='21' y2='3' />
                                    <path
                                        d='M21 3l-6.5 18a0.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a0.55 .55 0 0 1 0 -1l18 -6.5' />
                                </svg>
                            </a>
                            <a class='a2a_button_twitter'>
                                <!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
                                <svg xmlns='http://www.w3.org/2000/svg' class='icon' width='24' height='24'
                                    viewBox='0 0 24 24' stroke-width='2' stroke='currentColor' fill='none'
                                    stroke-linecap='round' stroke-linejoin='round'>
                                    <path stroke='none' d='M0 0h24v24H0z' fill='none' />
                                    <path
                                        d='M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c-.002 -.249 1.51 -2.772 1.818 -4.013z' />
                                </svg>
                            </a>
                            <a class='a2a_button_linkedin'>
                                <!-- Download SVG icon from http://tabler-icons.io/i/brand-linkedin -->
                                <svg xmlns='http://www.w3.org/2000/svg' class='icon' width='24' height='24'
                                    viewBox='0 0 24 24' stroke-width='2' stroke='currentColor' fill='none'
                                    stroke-linecap='round' stroke-linejoin='round'>
                                    <path stroke='none' d='M0 0h24v24H0z' fill='none' />
                                    <rect x='4' y='4' width='16' height='16' rx='2' />
                                    <line x1='8' y1='11' x2='8' y2='16' />
                                    <line x1='8' y1='8' x2='8' y2='8.01' />
                                    <line x1='12' y1='16' x2='12' y2='11' />
                                    <path d='M16 16v-3a2 2 0 0 0 -4 0' />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    ";
                            }
                        }
                        ?>
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
                            <a href="www.weareremoteokay.com" class="link-secondary">Rover Gigs</a>.
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
    <!--Copy to Clipboard-->
    <script>
        let emailFromDBToBeCopied = document.getElementById('emailFromDBToBeCopied').innerHTML;
        const copyContent = async () => {
            try {
                await navigator.clipboard.writeText(emailFromDBToBeCopied);
                document.getElementById('emailCopiedToClipboardButton').style.display = "block";
                document.getElementById('buttonToBeClickedToCopyEmail').style.display = "none";
            } catch (err) {
                console.error('Failed to copy: ', err);
            }
        }
    </script>
    <!--Share the job-->
    <script async src="https://static.addtoany.com/menu/page.js"></script>
</body>

</html>