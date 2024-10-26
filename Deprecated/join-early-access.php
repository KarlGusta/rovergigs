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
$openToWorldwideRoles = "";
$jobType = "";
$name = "";
$email = "";
$location = "";
$status = "";

// Initializing with empty values
$errorMessage = "";
$successMessage = "";


// Check if data is transmitted through the POST Method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Initialize the variables above with the data from the form
    $jobTitle = $_POST["jobTitle"];
    $category = $_POST["category"];
    $openToWorldwideRoles = $_POST["openToWorldwideRoles"];
    $jobType = $_POST["jobType"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $location = $_POST["location"];
    $status = $_POST["status"];

    // Check that we don't have any empty fields
    do {
        if (empty($jobTitle) || empty($category) || empty($openToWorldwideRoles) || empty($jobType) || empty($name) || empty($email) || empty($location) || empty($status)) {
            $errorMessage = "All fields are required";
            break;
        }

        /** 
         * Add new client to the database
         * We are using Two foreach because of the two checkboxes in this page
         * */
        foreach ($openToWorldwideRoles as $openToWorldwideRolesItem) {
            foreach ($jobType as $jobTypeItem) {
                $sql = "INSERT INTO earlyAccessClients(jobTitle, category, openToWorldwideRoles, jobType, name, email, location, joinedOn, status)" .
                    "VALUES ('$jobTitle', '$category', '$openToWorldwideRolesItem', '$jobTypeItem', '$name', '$email', '$location', now(), '$status')";
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
        $openToWorldwideRoles = "";
        $jobType = "";
        $name = "";
        $email = "";
        $location = "";
        $status = "";

        // Display success message to the user
        $successMessage = "Congratulations! One more step to join us in the 1% club!";

        // Redirect the user to the lipa early access index page.
        header("location: /weareremoteokay/lipa-early-access/index.php");
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

    <title>Join early access | We are remote okay</title>
    <!-- CSS files -->
    <link href="./dist/css/tabler.min.css" rel="stylesheet" />
    <link href="./dist/css/tabler-flags.min.css" rel="stylesheet" />
    <link href="./dist/css/tabler-payments.min.css" rel="stylesheet" />
    <link href="./dist/css/tabler-vendors.min.css" rel="stylesheet" />
    <link href="./dist/css/demo.min.css" rel="stylesheet" />
    <!--Favicon-->
    <link rel="icon" type="image/x-icon" href="src/img/logo/WARO-favicon.ico">


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
                        <!-- Download SVG icon from https://tabler-icons.io/i/checkup-list -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-checkup-list" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2"></path>
                            <rect x="9" y="3" width="6" height="4" rx="2"></rect>
                            <path d="M9 14h.01"></path>
                            <path d="M9 17h.01"></path>
                            <path d="M12 16l1 1l3 -3"></path>
                        </svg>
                        We Are Remote Okay
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
                                Join early access to jobs
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
                                                    First Tell Us About The Position You Want
                                                </h2>
                                            </div>
                                            <div class="form-group mb-3 row">
                                                <label class="form-label col-3 col-form-label">Job Title *</label>
                                                <div class="col">
                                                    <input type="text" class="form-control" placeholder="Enter Job title" name="jobTitle" value="<?php echo $jobTitle ?>" required>
                                                    <small class="form-hint">Example: “Writer”. Titles must describe one position.</small>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 row">
                                                <label class="form-label col-3 col-form-label">Category *</label>
                                                <div class="col">
                                                    <select type="text" class="form-select" placeholder="Select a Category" name="category" id="category" value="<?php echo $category ?>">
                                                        <option value="Design">Design</option>
                                                        <option value="Writing">Writing</option>
                                                        <option value="Full-stack programming">Full-stack programming</option>
                                                        <option value="Back-end programming">Back-end programming</option>
                                                        <option value="Marketing">Marketing</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 row">
                                                <label class="form-label col-3 col-form-label">Open to Worldwide Roles? *</label>
                                                <div class="col">
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input checkOptionWorldwideRoles" type="checkbox" name="openToWorldwideRoles[]" value="Yes">
                                                        <span class="form-check-label">Yes</span>
                                                    </label>
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input checkOptionWorldwideRoles" type="checkbox" name="openToWorldwideRoles[]" value="No">
                                                        <span class="form-check-label">No</span>
                                                    </label>
                                                    <small class="form-hint">Selecting 'Yes' means you want to work anywhere in the world without any location or time zone restrictions!</small>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 row">
                                                <label class="form-label col-3 col-form-label">Job Type*</label>
                                                <div class="col">
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input checkOptionJobType" type="checkbox" name="jobType[]" value="fullTime">
                                                        <span class="form-check-label">Full-Time</span>
                                                    </label>
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input checkOptionJobType" type="checkbox" name="jobType[]" value="contract">
                                                        <span class="form-check-label">Contract</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 row">
                                                <label class="form-label col-3 col-form-label">Your name*</label>
                                                <div class="col">
                                                    <input type="text" class="form-control" placeholder="Your Full name" name="name" value="<?php echo $name ?>">
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 row">
                                                <label class="form-label col-3 col-form-label">Email*</label>
                                                <div class="col">
                                                    <input type="text" class="form-control" placeholder="Email" name="email" value="<?php echo $email ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 row">
                                                <label class="form-label col-3 col-form-label">Location*</label>
                                                <div class="col">
                                                    <select type="text" class="form-select" id="location" name="location" value="<?php echo $location ?>">
                                                        <option value="Andorra" class="flag-country-ad">Andorra</option>
                                                        <option value="United Arab Emirates" class="flag-country-ae">United Arab Emirates</option>
                                                        <option value="Afghanistan" class="flag-country-af">Afghanistan</option>
                                                        <option value="Antigua" class="flag-country-ag">Antigua</option>
                                                        <option value="Anguilla" class="flag-country-ai">Anguilla</option>
                                                        <option value="Armenia" class="flag-country-am">Armenia</option>
                                                        <option value="Angolan" class="flag-country-ao">Angolan</option>
                                                        <option value="Antarctica" class="flag-country-aq">Antarctica</option>
                                                        <option value="Argentina" class="flag-country-ar">Argentina</option>
                                                        <option value="American Samoa" class="flag-country-as">American Samoa</option>
                                                        <option value="at" class="flag-country-at">Austria</option>
                                                        <option value="aw" class="flag-country-aw">Aruba</option>
                                                        <option value="ax" class="flag-country-ax">Aslan Islands</option>
                                                        <option value="az" class="flag-country-az">Azerbaijan</option>
                                                        <option value="ba" class="flag-country-ba">Bosnian</option>
                                                        <option value="bb" class="flag-country-bb">Barbados</option>
                                                        <option value="be" class="flag-country-be">Belgium</option>
                                                        <option value="bf" class="flag-country-bf">Burkina Faso</option>
                                                        <option value="bg" class="flag-country-bg">Bulgaria</option>
                                                        <option value="bh" class="flag-country-bh">Bahrain</option>
                                                        <option value="bi" class="flag-country-bi">Burundi</option>
                                                        <option value="bj" class="flag-country-bj">Benin</option>
                                                        <option value="bl" class="flag-country-bl">Saint-Barthelemy</option>
                                                        <option value="bm" class="flag-country-bm">Bermuda</option>
                                                        <option value="bn" class="flag-country-bn">Bruneian</option>
                                                        <option value="bo" class="flag-country-bo">Bolivia</option>
                                                        <option value="bq" class="flag-country-bq">Bonaire</option>
                                                        <option value="br" class="flag-country-br">Brazil</option>
                                                        <option value="bs" class="flag-country-bs">Bahamas</option>
                                                        <option value="bt" class="flag-country-bt">Bhutan</option>
                                                        <option value="bv" class="flag-country-bv">Bouvet Island</option>
                                                        <option value="bw" class="flag-country-bw">Batswana</option>
                                                        <option value="by" class="flag-country-by">Belarus</option>
                                                        <option value="bz" class="flag-country-bz">Belize</option>
                                                        <option value="ca" class="flag-country-ca">Canada</option>
                                                        <option value="cc" class="flag-country-cc">Cocos Island</option>
                                                        <option value="cd" class="flag-country-cd">Democratic Republic of Congo</option>
                                                        <option value="cf" class="flag-country-cf">Central African Republic</option>
                                                        <option value="cg" class="flag-country-cg">Republic of the Congo</option>
                                                        <option value="ch" class="flag-country-ch">Switzerland</option>
                                                        <option value="ci" class="flag-country-ci">Ivory Coast</option>
                                                        <option value="ck" class="flag-country-ck">Cook Island</option>
                                                        <option value="cl" class="flag-country-cl">Chile</option>
                                                        <option value="cm" class="flag-country-cm">Cameroon</option>
                                                        <option value="cn" class="flag-country-cn">China</option>
                                                        <option value="co" class="flag-country-co">Colombia</option>
                                                        <option value="cr" class="flag-country-cr">Costa Rica</option>
                                                        <option value="cu" class="flag-country-cu">Cuba</option>
                                                        <option value="cv" class="flag-country-cv">Cape Verde</option>
                                                        <option value="cw" class="flag-country-cw">Curacao</option>
                                                        <option value="cx" class="flag-country-cx">Christmas Island</option>
                                                        <option value="cy" class="flag-country-cy">Cyprus</option>
                                                        <option value="cz" class="flag-country-cz">Czech Republic</option>
                                                        <option value="de" class="flag-country-de">Germany</option>
                                                        <option value="dj" class="flag-country-dj">Djibouti</option>
                                                        <option value="dk" class="flag-country-dk">Denmark</option>
                                                        <option value="dm" class="flag-country-dm">Dominica</option>
                                                        <option value="do" class="flag-country-do">Dominican Republic</option>
                                                        <option value="dz" class="flag-country-dz">Algeria</option>
                                                        <option value="ec" class="flag-country-ec">Ecuador</option>
                                                        <option value="ee" class="flag-country-ee">Estonia</option>
                                                        <option value="eg" class="flag-country-eg">Egypt</option>
                                                        <option value="eh" class="flag-country-eh">Sahrawi</option>
                                                        <option value="er" class="flag-country-er">Eritrea</option>
                                                        <option value="es" class="flag-country-es">Spain</option>
                                                        <option value="es-ct" class="flag-country-es-ct">Catalonia</option>
                                                        <option value="et" class="flag-country-et">Ethiopia</option>
                                                        <option value="eu" class="flag-country-eu">European Union</option>
                                                        <option value="fi" class="flag-country-fi">Finland</option>
                                                        <option value="fj" class="flag-country-fj">Fiji</option>
                                                        <option value="fk" class="flag-country-fk">Falkland Islands</option>
                                                        <option value="fm" class="flag-country-fm">Federate States of Micronesia</option>
                                                        <option value="fo" class="flag-country-fo">Faroe Islands</option>
                                                        <option value="fr" class="flag-country-fr">France</option>
                                                        <option value="ga" class="flag-country-ga">Gabon</option>
                                                        <option value="gb" class="flag-country-gb">Great Britain</option>
                                                        <option value="gb-eng" class="flag-country-gb-eng">England</option>
                                                        <option value="gb-nir" class="flag-country-gb-nir">Nothern Ireland</option>
                                                        <option value="gb-sct" class="flag-country-gb-sct">Scotland</option>
                                                        <option value="gb-wls" class="flag-country-gb-wls">Wales</option>
                                                        <option value="gd" class="flag-country-gd">Grenada</option>
                                                        <option value="ge" class="flag-country-ge">Georgia</option>
                                                        <option value="gf" class="flag-country-gf">Guyana</option>
                                                        <option value="gg" class="flag-country-gg">Guernsey</option>
                                                        <option value="gh" class="flag-country-gh">Ghana</option>
                                                        <option value="gi" class="flag-country-gi">Gibraltar</option>
                                                        <option value="gl" class="flag-country-gl">Greenland</option>
                                                        <option value="gm" class="flag-country-gm">Gambia</option>
                                                        <option value="gn" class="flag-country-gn">Guinea</option>
                                                        <option value="gp" class="flag-country-gp">Guadeloupe</option>
                                                        <option value="gq" class="flag-country-gq">Equatorial Guinea</option>
                                                        <option value="gr" class="flag-country-gr">Greece</option>
                                                        <option value="gs" class="flag-country-gs">South Georgia</option>
                                                        <option value="gt" class="flag-country-gt">Guatemala</option>
                                                        <option value="gu" class="flag-country-gu">Guam</option>
                                                        <option value="gw" class="flag-country-gw">Guinea-Bissau</option>
                                                        <option value="gy" class="flag-country-gy">Guyana</option>
                                                        <option value="hk" class="flag-country-hk">Hong Kong</option>
                                                        <option value="hm" class="flag-country-hm">Heard and McDonald Islands</option>
                                                        <option value="hn" class="flag-country-hn">Honduras</option>
                                                        <option value="hr" class="flag-country-hr">Croatia</option>
                                                        <option value="ht" class="flag-country-ht">Haiti</option>
                                                        <option value="hu" class="flag-country-hu">Hungary</option>
                                                        <option value="id" class="flag-country-id">Indonesia</option>
                                                        <option value="ie" class="flag-country-ie">Ireland</option>
                                                        <option value="il" class="flag-country-il">Israel</option>
                                                        <option value="im" class="flag-country-im">Isle of Man</option>
                                                        <option value="in" class="flag-country-in">India</option>
                                                        <option value="io" class="flag-country-io">British Indian Ocean Territory</option>
                                                        <option value="iq" class="flag-country-iq">Iraq</option>
                                                        <option value="ir" class="flag-country-ir">Iran</option>
                                                        <option value="is" class="flag-country-is">Iceland</option>
                                                        <option value="it" class="flag-country-it">Italy</option>
                                                        <option value="je" class="flag-country-je">Jersey</option>
                                                        <option value="jm" class="flag-country-jm">Jamaica</option>
                                                        <option value="jo" class="flag-country-jo">Jordan</option>
                                                        <option value="jp" class="flag-country-jp">Japan</option>
                                                        <option value="ke" class="flag-country-ke">Kenya</option>
                                                        <option value="kg" class="flag-country-kg">Kyrgyzstan</option>
                                                        <option value="kh" class="flag-country-kh">Cambodia</option>
                                                        <option value="ki" class="flag-country-ki">Kiribati</option>
                                                        <option value="km" class="flag-country-km">Comoros</option>
                                                        <option value="kn" class="flag-country-kn">Saint Kitts and Nevis</option>
                                                        <option value="kp" class="flag-country-kp">North Korea</option>
                                                        <option value="kr" class="flag-country-kr">South Korea</option>
                                                        <option value="kw" class="flag-country-kw">Kuwait</option>
                                                        <option value="ky" class="flag-country-ky">Cayman Islands</option>
                                                        <option value="kz" class="flag-country-kz">Kazakhstan</option>
                                                        <option value="la" class="flag-country-la">Laos</option>
                                                        <option value="lb" class="flag-country-lb">Lebanese</option>
                                                        <option value="lc" class="flag-country-lc">Saint Lucia</option>
                                                        <option value="li" class="flag-country-li">Liechtenstein</option>
                                                        <option value="lk" class="flag-country-lk">Sri Lanka</option>
                                                        <option value="lr" class="flag-country-lr">Liberia</option>
                                                        <option value="ls" class="flag-country-ls">Lesotho</option>
                                                        <option value="lt" class="flag-country-lt">Lithuania</option>
                                                        <option value="lu" class="flag-country-lu">Luxembourg</option>
                                                        <option value="lv" class="flag-country-lv">Latvia</option>
                                                        <option value="ly" class="flag-country-ly">Libya</option>
                                                        <option value="ma" class="flag-country-ma">Morocco</option>
                                                        <option value="mc" class="flag-country-mc">Monaco</option>
                                                        <option value="md" class="flag-country-md">Moldova</option>
                                                        <option value="me" class="flag-country-me">Montenegro</option>
                                                        <option value="mf" class="flag-country-mf">Saint Martin</option>
                                                        <option value="mg" class="flag-country-mg">Madagascar</option>
                                                        <option value="mh" class="flag-country-mh">Marshall Islands</option>
                                                        <option value="mk" class="flag-country-mk">Macedonia</option>
                                                        <option value="ml" class="flag-country-ml">Mali</option>
                                                        <option value="mm" class="flag-country-mm">Myanmar</option>
                                                        <option value="mn" class="flag-country-mn">Mongolia</option>
                                                        <option value="mo" class="flag-country-mo">Macao</option>
                                                        <option value="mp" class="flag-country-mp">Nothern Mariana Islands</option>
                                                        <option value="mq" class="flag-country-mq">Martinique</option>
                                                        <option value="mr" class="flag-country-mr">Mauritania</option>
                                                        <option value="ms" class="flag-country-ms">Montserrat</option>
                                                        <option value="mt" class="flag-country-mt">Malta</option>
                                                        <option value="mu" class="flag-country-mu">Mauritius</option>
                                                        <option value="mv" class="flag-country-mv">Maldives</option>
                                                        <option value="mw" class="flag-country-mw">Malawi</option>
                                                        <option value="mx" class="flag-country-mx">Mexico</option>
                                                        <option value="my" class="flag-country-my">Malaysia</option>
                                                        <option value="mz" class="flag-country-mz">Mozambique</option>
                                                        <option value="na" class="flag-country-na">Namibia</option>
                                                        <option value="nc" class="flag-country-nc">New Caledonia</option>
                                                        <option value="ne" class="flag-country-ne">Niger</option>
                                                        <option value="nf" class="flag-country-nf">Norfolk Island</option>
                                                        <option value="ng" class="flag-country-ng">Nigeria</option>
                                                        <option value="ni" class="flag-country-ni">Nicaragua</option>
                                                        <option value="no" class="flag-country-no">Norway</option>
                                                        <option value="np" class="flag-country-np">Nepal</option>
                                                        <option value="nr" class="flag-country-nr">Nauruan</option>
                                                        <option value="nu" class="flag-country-nu">Niger</option>
                                                        <option value="nz" class="flag-country-nz">New Zeland</option>
                                                        <option value="om" class="flag-country-om">Oman</option>
                                                        <option value="pa" class="flag-country-pa">Panama</option>
                                                        <option value="pe" class="flag-country-pe">Peru</option>
                                                        <option value="pf" class="flag-country-pf">French Polynesia</option>
                                                        <option value="pg" class="flag-country-pg">Papua New Guinea</option>
                                                        <option value="ph" class="flag-country-ph">Philippines</option>
                                                        <option value="pk" class="flag-country-pk">Pakistan</option>
                                                        <option value="pl" class="flag-country-pl">Poland</option>
                                                        <option value="pm" class="flag-country-pm">Saint Pierre</option>
                                                        <option value="pn" class="flag-country-pn">Pitcairn Islands</option>
                                                        <option value="pr" class="flag-country-pr">Puerto Rico</option>
                                                        <option value="ps" class="flag-country-ps">Palestine</option>
                                                        <option value="pt" class="flag-country-pt">Portugal</option>
                                                        <option value="pw" class="flag-country-pw">Palau</option>
                                                        <option value="py" class="flag-country-py">Paraguay</option>
                                                        <option value="qa" class="flag-country-qa">Qatar</option>
                                                        <option value="re" class="flag-country-re">Reunion Island</option>
                                                        <option value="ro" class="flag-country-ro">Romania</option>
                                                        <option value="rs" class="flag-country-rs">Serbia</option>
                                                        <option value="ru" class="flag-country-ru">Russia</option>
                                                        <option value="rw" class="flag-country-rw">Rwanda</option>
                                                        <option value="sa" class="flag-country-sa">Saudi Arabia</option>
                                                        <option value="sb" class="flag-country-sb">Solomon Islands</option>
                                                        <option value="sc" class="flag-country-sc">Seychelles</option>
                                                        <option value="sd" class="flag-country-sd">Sudan</option>
                                                        <option value="se" class="flag-country-se">Sweden</option>
                                                        <option value="sg" class="flag-country-sg">Singapore</option>
                                                        <option value="sh" class="flag-country-sh">Saint Helena</option>
                                                        <option value="si" class="flag-country-si">Slovenia</option>
                                                        <option value="sj" class="flag-country-sj">Svalbard Island</option>
                                                        <option value="sk" class="flag-country-sk">Slovakia</option>
                                                        <option value="sl" class="flag-country-sl">Sierra Leone</option>
                                                        <option value="sm" class="flag-country-sm">San Marino</option>
                                                        <option value="sn" class="flag-country-sn">Senegal</option>
                                                        <option value="so" class="flag-country-so">Somalia</option>
                                                        <option value="sr" class="flag-country-sr">Suriname</option>
                                                        <option value="ss" class="flag-country-ss">South Sudan</option>
                                                        <option value="st" class="flag-country-st">Sao Tome</option>
                                                        <option value="sv" class="flag-country-sv">El Salvador</option>
                                                        <option value="sx" class="flag-country-sx">Sint Maarten</option>
                                                        <option value="sy" class="flag-country-sy">Syria</option>
                                                        <option value="sz" class="flag-country-sz">Swaziland</option>
                                                        <option value="tc" class="flag-country-tc">Turks and Caicos</option>
                                                        <option value="td" class="flag-country-td">Chad</option>
                                                        <option value="tf" class="flag-country-tf">French Southern and Antarctic Lands</option>
                                                        <option value="tg" class="flag-country-tg">Togo</option>
                                                        <option value="th" class="flag-country-th">Thailand</option>
                                                        <option value="tj" class="flag flag-country-tj">Tajikistan</option>
                                                        <option value="tk" class="flag-country-tk">Tokelau</option>
                                                        <option value="tl" class="flag-country-tl">Timor Leste</option>
                                                        <option value="tm" class="flag-country-tm">Turkmenistan</option>
                                                        <option value="tn" class="flag-country-tn">Tunisia</option>
                                                        <option value="to" class="flag-country-to">Tonga</option>
                                                        <option value="tr" class="flag-country-tr">Turkey</option>
                                                        <option value="tt" class="flag-country-tt">Trinidad and Tobago</option>
                                                        <option value="tv" class="flag-country-tv">Tuvalu</option>
                                                        <option value="tz" class="flag-country-tz">Tanzania</option>
                                                        <option value="ua" class="flag-country-ua">Ukraine</option>
                                                        <option value="ug" class="flag-country-ug">Uganda</option>
                                                        <option value="um" class="flag-country-um">United States Minor Islands</option>
                                                        <option value="un" class="flag-country-un">United Nations</option>
                                                        <option value="us" class="flag-country-us">United States of America</option>
                                                        <option value="uy" class="flag-country-uy">Uruguay</option>
                                                        <option value="uz" class="flag-country-uz">Uzbekistan</option>
                                                        <option value="va" class="flag-country-va">Vatican City</option>
                                                        <option value="vc" class="flag-country-vc">Saint Vincent</option>
                                                        <option value="ve" class="flag-country-ve">Venezuela</option>
                                                        <option value="vg" class="flag-country-vg">British Virgin Islands</option>
                                                        <option value="vi" class="flag-country-vi">Virgiin Islands</option>
                                                        <option value="vn" class="flag-country-vn">Vietnam</option>
                                                        <option value="vu" class="flag-country-vu">Vanuatu</option>
                                                        <option value="wf" class="flag-country-wf">Wallis and Futuna</option>
                                                        <option value="ws" class="flag-country-ws">Samoa</option>
                                                        <option value="ye" class="flag-country-ye">Yemen</option>
                                                        <option value="za" class="flag-country-za">South Africa</option>
                                                        <option value="zm" class="flag-country-zm">Zambia</option>
                                                        <option value="zw" class="flag-country-zw">Zimbabwe</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <input type="hidden" name="status" value="Pending">
                                        </div>
                                        <div class="card-footer text-end">
                                            <div class="d-flex">
                                                <a href="/weareremoteokay/index.php" role="button" class="btn btn-link">Cancel</a>
                                                <!--<a type="submit" href="/weareremoteokay/lipa-early-access" class="btn btn-danger ms-auto">Proceed to order</a>-->
                                                <button type="submit" class="btn btn-danger ms-auto">Proceed to order</button>
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
                            <a href="https://twitter.com/weareremoteokay" target="_blank" class="link-secondary" rel="noopener">
                                <!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c-.002 -.249 1.51 -2.772 1.818 -4.013z" />
                                </svg>
                                Twitter
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://www.linkedin.com/company/we-are-remote-okay/" target="_blank" class="link-secondary" rel="noopener">
                                <!-- Download SVG icon from http://tabler-icons.io/i/brand-linkedin -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                            Copyright &copy; 2023
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
    <!-- Display only when checked-->
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