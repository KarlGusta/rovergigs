<?php
// Connecting to the Database
$servername = "localhost";
$username = "root";
$password = "";
$database = "weareremoteokaydb";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);

//Initializing with empty values
$jobTitle = "";
$category = "";
$isThisRoleOpenWorldwide = "";
$applicationLinkOrEmail = "";
$jobType = "";
$jobDescription = "";
$companyName = "";
$companyHQ = "";
$companyWebsiteURL = "";
$email = "";
$companyDescription = "";
$status = "";
$featured = "";

// Initializing with empty values
$errorMessage = "";
$successMessage = "";


// Check if data is transmitted through the POST Method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Initialize the variables above with the data from the form
    $jobTitle = $_POST["jobTitle"];
    $category = $_POST["category"];
    $isThisRoleOpenWorldwide = $_POST["isThisRoleOpenWorldwide"];
    $applicationLinkOrEmail = $connection->real_escape_string($_POST['applicationLinkOrEmail']);
    $jobType = $_POST["jobType"];
    $jobDescription = $connection->real_escape_string($_POST['jobDescription']);
    $companyName = $_POST["companyName"];
    $companyHQ = $_POST["companyHQ"];
    $companyWebsiteURL = $connection->real_escape_string($_POST['companyWebsiteURL']);
    $email = $_POST["email"];
    $companyDescription = $connection->real_escape_string($_POST['companyDescription']);
    $status = $_POST["status"];
    $featured = $_POST["featured"];

    // Check that we don't have any empty fields
    do {
        if (empty($jobTitle) || empty($category) || empty($isThisRoleOpenWorldwide) || empty($applicationLinkOrEmail) || empty($jobType) || empty($jobDescription) || empty($companyName) || empty($companyHQ) || empty($companyWebsiteURL) || empty($email) || empty($companyDescription) || empty($status) || empty($featured)) {
            $errorMessage = "All fields are required";
            break;
        }

        /** 
         * Add new client to the database
         * We are using Two foreach because of the two checkboxes in this page
         * */
        foreach ($isThisRoleOpenWorldwide as $isThisRoleOpenWorldwideItem) {
            foreach ($jobType as $jobTypeItem) {
                $sql = "INSERT INTO jobs(jobTitle, category, isThisRoleOpenWorldwide, applicationLinkOrEmail, jobType, jobDescription, companyName, companyHQ, companyWebsiteURL, email, companyDescription, datePosted, status, featured)" .
                    "VALUES ('$jobTitle', '$category', '$isThisRoleOpenWorldwideItem', '$applicationLinkOrEmail', '$jobTypeItem', '$jobDescription', '$companyName', '$companyHQ', '$companyWebsiteURL', '$email', '$companyDescription', now(), '$status', '$featured')";
            }
        }


        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }

        // After adding, we initialize empty values
        $jobTitle = "";
        $category = "";
        $isThisRoleOpenWorldwide = "";
        $applicationLinkOrEmail = "";
        $jobType = "";
        $jobDescription = "";
        $companyName = "";
        $companyHQ = "";
        $companyWebsiteURL = "";
        $email = "";
        $companyDescription = "";
        $status = "";
        $featured = "";

        // Display success message to the user
        $successMessage = "Congratulations! One more step to join us in the 1% club!";

        // Redirect the user to the lipa early access index page.
        header("location: /weareremoteokay/pay-job-order/index.php");
        exit;
    } while (false);
}
?>


<!doctype html>
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

    <title>Post a Job | Rovergigs</title>
    <!-- CSS files -->
    <link href="./dist/css/tabler.min.css" rel="stylesheet" />
    <link href="./dist/css/tabler-flags.min.css" rel="stylesheet" />
    <link href="./dist/css/tabler-payments.min.css" rel="stylesheet" />
    <link href="./dist/css/tabler-vendors.min.css" rel="stylesheet" />
    <link href="./dist/css/demo.min.css" rel="stylesheet" />
    <!--Favicon-->
    <link rel="icon" type="image/x-icon" href="src/img/logo/rover_logo.png">

    <!-- TinyMCE -->
    <script src="src/js/tinymce/js/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
    tinymce.init({
        selector: '#mytextarea'
    });
    </script>
</head>

<body>
    <div class="page">
        <header class="navbar navbar-expand-md navbar-light d-print-none">
            <div class="container-xl">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                    <a href=".">
                        <img src="src/img/logo/rovergigs_logo.png" alt="logo">
                    </a>
                </h1>
                <div class="navbar-nav flex-row order-md-last">
                    <div class="nav-item d-md-flex me-3">
                        <div class="btn-list">
                            <!--To keep page format-->
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="page-wrapper">
            <div class="container-xl">
                <!-- Page title -->
                <div class="page-header d-print-none">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <!-- Page pre-title -->
                            <div class="page-pretitle">
                                Overview
                            </div>
                            <h2 class="page-title">
                                Post a job
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-body">
                <div class="container-xl">
                    <div class="row row-deck row-cards justify-content-center">
                        <div class="col-12">
                            <div class="card">
                                <!-- Circles which indicates the steps of the form: -->
                                <div class="card-header">
                                    <span class="step"></span>
                                    <span class="step"></span>
                                </div>
                                <div class="card-body">
                                    <!--Display success message if it is not empty-->
                                    <?php
                                    if (!empty($successMessage)) {
                                        echo "
                                    <div class='alert alert-important alert-success alert-dismissible' role='alert'>
                                        <div class='d-flex'>
                                            <div>
                                            <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                                            <!-- SVG icon code with class='alert-icon' -->
                                            </div>
                                            <div>
                                                $successMessage
                                            </div>
                                        </div>
                                        <a class='btn-close btn-close-white' data-bs-dismiss='alert' aria-label='close'></a>
                                    </div>
                                    ";
                                    }
                                    ?>

                                    <!--Display error message if it is empty-->
                                    <?php
                                    if (!empty($errorMessage)) {
                                        echo "
                                    <div class='alert alert-important alert-warning alert-dismissible' role='alert'>
                                        <div class='d-flex'>
                                            <div>
                                             <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                                             <!-- SVG icon code with class='alert-icon' -->
                                             </div>
                                         <div>
                                            $errorMessage
                                         </div>
                                       </div>
                                       <a class='btn-close btn-close-white' data-bs-dismiss='alert' aria-label='close'></a>
                                    </div>
                                    ";
                                    }
                                    ?>
                                    <form method="post">
                                        <div class="tab">
                                            <div class="col mb-3">
                                                <!-- Page pre-title -->
                                                <h2 class="page-title">
                                                    First Tell Us About The Position
                                                </h2>
                                            </div>
                                            <div class="form-group mb-3 row">
                                                <label class="form-label col-3 col-form-label">Job Title *</label>
                                                <div class="col">
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter Job title" name="jobTitle"
                                                        value="<?php echo $jobTitle ?>">
                                                    <small class="form-hint">Example: “Writer”. Titles must describe one
                                                        position.</small>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 row">
                                                <label class="form-label col-3 col-form-label">Category *</label>
                                                <div class="col">
                                                    <select type="text" class="form-select" placeholder="Select a date"
                                                        id="select-tags" name="category"
                                                        value="<?php echo $category ?>">
                                                        <option value="Design">Design</option>
                                                        <option value="Full-stack programming">Full-stack programming
                                                        </option>
                                                        <option value="Back-end programming">Back-end programming
                                                        </option>
                                                        <option value="Front-End programming">Front-End Programming
                                                        </option>
                                                        <option value="Customer Support">Customer Support</option>
                                                        <option value="Sales and Marketing">Sales and Marketing</option>
                                                        <option value="DevOps and Sysadmin">DevOps and Sysadmin</option>
                                                        <option value="Management and Finance">Management and Finance
                                                        </option>
                                                        <option value="Product">Product</option>
                                                        <option value="All Other Remote Jobs">All Other Remote Jobs
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 row">
                                                <label class="form-label col-3 col-form-label">Is this Role Open
                                                    Worldwide? *</label>
                                                <div class="col">
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input checkOptionWorldwideRoles"
                                                            type="checkbox" name="isThisRoleOpenWorldwide[]"
                                                            value="Yes">
                                                        <span class="form-check-label">Yes</span>
                                                    </label>
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input checkOptionWorldwideRoles"
                                                            type="checkbox" name="isThisRoleOpenWorldwide[]" value="No"
                                                            checked>
                                                        <span class="form-check-label">No</span>
                                                    </label>
                                                    <small class="form-hint">Selecting 'Yes' means your future hire can
                                                        work anywhere in the world without any location or time zone
                                                        restrictions!</small>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 row">
                                                <label class="form-label col-3 col-form-label">Application Link or
                                                    Email*</label>
                                                <div class="col">
                                                    <input type="text" class="form-control"
                                                        placeholder="Application link or email"
                                                        name="applicationLinkOrEmail"
                                                        value="<?php echo $applicationLinkOrEmail ?>">
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 row">
                                                <label class="form-label col-3 col-form-label">Job Type*</label>
                                                <div class="col">
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input checkOptionJobType"
                                                            type="checkbox" name="jobType[]" value="Full-Time">
                                                        <span class="form-check-label">Full-Time</span>
                                                    </label>
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input checkOptionJobType"
                                                            type="checkbox" name="jobType[]" value="Contract" checked>
                                                        <span class="form-check-label">Contract</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 row">
                                                <label class="form-label col-3 col-form-label">Job Description *</label>
                                                <div class="col">
                                                    <textarea class="form-control" id="mytextarea" name="jobDescription"
                                                        rows="6" placeholder="What the job description is"
                                                        value="<?php echo $jobDescription ?>"></textarea>
                                                </div>
                                            </div>
                                            <div class="col mb-3">
                                                <!-- Page pre-title -->
                                                <h2 class="page-title mb-3">
                                                    Tell Us More About Your Company
                                                </h2>
                                                <div class=" form-group mb-3 row">
                                                    <label class="form-label col-3 col-form-label"></label>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <label class="form-label">Company Name *</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Enter your company or organization's name."
                                                                name="companyName" value="<?php echo $companyName ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <div class="mb-3">
                                                            <label class="form-label">Company HQ *</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Where your company is officially headquartered."
                                                                name="companyHQ" value="<?php echo $companyHQ ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class=" form-group mb-3 row">
                                                    <label class="form-label col-3 col-form-label"></label>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <label class="form-label">Company's Website URL *</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Example: https://mybusiness.com/"
                                                                name="companyWebsiteURL"
                                                                value="<?php echo $companyWebsiteURL ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <div class="mb-3">
                                                            <label class="form-label">Email *</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="We’ll send your receipt and confirmation email here."
                                                                name="email" value="<?php echo $email ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3 row">
                                                    <label class="form-label col-3 col-form-label">Company Description
                                                        *</label>
                                                    <div class="col">
                                                        <textarea class="form-control" id="mytextarea"
                                                            name="companyDescription" rows="6"
                                                            placeholder="What the Company Description is"
                                                            value="<?php echo $companyDescription ?>"></textarea>
                                                    </div>
                                                </div>

                                                <input type="hidden" name="status" value="Pending">

                                                <input type="hidden" name="featured" value="No">
                                            </div>
                                        </div>
                                        <div class="card-footer text-end">
                                            <div class="d-flex">
                                                <a href="/rovergigs/index.php" role="button"
                                                    class="btn btn-link">Cancel</a>
                                                <a href="/rovergigs/checkout.php" role="button"
                                                    class="btn btn-danger ms-auto">Proceed to Checkout</a>
                                            </div>
                                        </div>
                                    </form>
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
                            Copyright &copy; <script type="text/javascript">document.write(new Date().getFullYear());</script>
                            <a href="www.weareremoteokay.com" class="link-secondary">We Are Remote Okay</a>.
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
    <!--JQuery for the checkboxes-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!--Check option for Job Type-->
    <script type="text/javascript">
    $(document).ready(function() {

        $('.checkOptionJobType').click(function() {
            $('.checkOptionJobType').not(this).prop('checked', false);
        });

    });
    </script>
    <!--Check option for worldwide roles-->
    <script type="text/javascript">
    $(document).ready(function() {

        $('.checkOptionWorldwideRoles').click(function() {
            $('.checkOptionWorldwideRoles').not(this).prop('checked', false);
        });

    });
    </script>
</body>

</html>