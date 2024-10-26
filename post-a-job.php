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

    <title>Post a Job | Rover gigs</title>
    <!-- CSS files -->
    <link href="./dist/css/tabler.min.css" rel="stylesheet" />
    <link href="./dist/css/tabler-flags.min.css" rel="stylesheet" />
    <link href="./dist/css/tabler-payments.min.css" rel="stylesheet" />
    <link href="./dist/css/tabler-vendors.min.css" rel="stylesheet" />
    <link href="./dist/css/demo.min.css" rel="stylesheet" />

    <!--Favicon-->
    <link rel="icon" type="image/x-icon" href="src/img/logo/rovergigs_logo.png">
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
                        Rover Gigs
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
                                    <form id="post-a-job-form" action="https://formspree.io/f/mjkbnrjz" method="post">
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
                                                        placeholder="Enter Job title" name="jobTitle" required>
                                                    <small class="form-hint">Example: “Writer”. Titles must describe one
                                                        position.</small>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 row">
                                                <label class="form-label col-3 col-form-label">Category *</label>
                                                <div class="col">
                                                    <select type="text" class="form-select" placeholder="Select a date"
                                                        id="select-tags" name="category">
                                                        <option value="Design">🎨 Design</option>
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
                                            <!-- Tags -->
                                            <div class="form-group mb-3 row">
                                                <label class="form-label col-3 col-form-label">Tags*</label>
                                                <div class="col">
                                                    <select type="text" class="form-select" placeholder="Select tags"
                                                        id="job-tags" name="jobTags[]" multiple>
                                                        <option value="Executive">💼 Executive</option>
                                                        <option value="Senior">👴 Senior</option>
                                                        <option value="Finance">💰 Finance</option>
                                                        <option value="SysAdmin">🖥️ SysAdmin</option>
                                                        <option value="JavaScript">🚀 JavaScript</option>
                                                        <option value="Backend">⛁ Backend</option>
                                                        <option value="Golang">🦫 Golang</option>
                                                        <option value="Cloud">☁️ Cloud</option>
                                                        <option value="Medical">🩺 Medical</option>
                                                        <option value="Finance">💰 Finance</option>
                                                        <option value="Front End">👨🏻‍💻 Front End</option>
                                                        <option value="Full Stack">⚒ Full Stack</option>
                                                        <option value="Ops">🔄 Ops</option>
                                                        <option value="Design">Design</option>
                                                        <option value="React">React</option>
                                                        <option value="InfoSec">InfoSec</option>
                                                        <option value="Marketing">Marketing</option>
                                                        <option value="Mobile">Mobile</option>
                                                        <option value="Content Writing">Content Writing</option>
                                                        <option value="SaaS">SaaS</option>
                                                        <option value="Recruiter">Recruiter</option>
                                                        <option value="Full Time">Full Time</option>
                                                        <option value="API">API</option>
                                                        <option value="Sales">Sales</option>
                                                        <option value="Ruby">Ruby</option>
                                                        <option value="Education">Education</option>
                                                        <option value="DevOps">DevOps</option>
                                                        <option value="Stats">Stats</option>
                                                        <option value="Python">Python</option>
                                                        <option value="Node">Node</option>
                                                        <option value="English">English</option>
                                                        <option value="Non Tech">Non Tech</option>
                                                        <option value="Video">Video</option>
                                                        <option value="Travel">Travel</option>
                                                        <option value="Quality Assurance">Quality Assurance
                                                        </option>
                                                        <option value="Ecommerce">Ecommerce</option>
                                                        <option value="Teaching">Teaching</option>
                                                        <option value="Linux">Linux</option>
                                                        <option value="Java">Java</option>
                                                        <option value="Crypto">Crypto</option>
                                                        <option value="Junior">Junior</option>
                                                        <option value="Git">Git</option>
                                                        <option value="Legal">Legal</option>
                                                        <option value="Android">Android</option>
                                                        <option value="Accounting">Accounting</option>
                                                        <option value="Admin">Admin</option>
                                                        <option value="Microsoft">Microsoft</option>
                                                        <option value="Excel">Excel</option>
                                                        <option value="PHP">PHP</option>
                                                        <option value="Amazon">Amazon</option>
                                                        <option value="Serverless">Serverless</option>
                                                </div>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- End of tags -->
                                        <div class="form-group mb-3 row">
                                            <label class="form-label col-3 col-form-label">Is this Role Open
                                                Worldwide? *</label>
                                            <div class="col">
                                                <label class="form-check form-check-inline">
                                                    <input class="form-check-input checkOptionWorldwideRoles"
                                                        type="checkbox" name="isThisRoleOpenWorldwide[]" value="Yes">
                                                    <span class="form-check-label">Yes</span>
                                                </label>
                                                <label class="form-check form-check-inline">
                                                    <input class="form-check-input checkOptionWorldwideRoles"
                                                        type="checkbox" name="isThisRoleOpenWorldwide[]" value="No">
                                                    <span class="form-check-label">No</span>
                                                </label>
                                                <small class="form-hint">Selecting 'Yes' means your future hire can
                                                    work anywhere in the world without any location or time zone
                                                    restrictions!</small>
                                            </div>
                                        </div>
                                        <!-- Location of the job -->
                                        <div class="form-group mb-3 row">
                                            <label class="form-label col-3 col-form-label">Job is restricted to
                                                locations? *</label>
                                            <div class="col">
                                                <select type="text" class="form-select" placeholder="Select a date"
                                                    id="select-tags" name="location">
                                                    <option value="Worldwide">🌎 Worldwide</option>
                                                    <option value="Africa">🌄 Africa</option>
                                                    <option value="Asia">🍜 Asia</option>
                                                    <option value="Europe">💂 Europe</option>
                                                    <option value="Latin America">🤠 Latin America</option>
                                                    <option value="Middle East">🕌 Middle East</option>
                                                    <option value="North America">🦅 North America</option>
                                                    <option value="Ocenia">🌊 Ocenia</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- Salary range -->
                                        <div class=" form-group mb-3 row">
                                            <label class="form-label col-3 col-form-label">Annual Salary or
                                                Compensation in USD (Gross, Annualized, Full-Time-Equivalent (FTE) in
                                                USD
                                                equivalent)*</label>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Minimum per year *</label>
                                                    <div class="col">
                                                        <select type="text" class="form-select"
                                                            placeholder="Select a date" id="select-tags"
                                                            name="minimumSalary">
                                                            <option value="">Select a minimum amount</option>
                                                            <option value="10000">USD 10,000 per year</option>
                                                            <option value="20000">USD 20,000 per year
                                                            </option>
                                                            <option value="30000">USD 30,000 per year
                                                            </option>
                                                            <option value="40000">USD 40,000 per year
                                                            </option>
                                                            <option value="50000">USD 50,000 per year</option>
                                                            <option value="60000">USD 60,000 per year
                                                            </option>
                                                            <option value="70000">USD 70,000 per year
                                                            </option>
                                                            <option value="80000">USD 80,000 per year
                                                            </option>
                                                            <option value="90000">USD 90,000 per year</option>
                                                            <option value="100000">USD 100,000 per year
                                                            </option>
                                                            <option value="110000">USD 110,000 per year
                                                            </option>
                                                            <option value="120000">USD 120,000 per year
                                                            </option>
                                                            <option value="130000">USD 130,000 per year
                                                            </option>
                                                            <option value="140000">USD 140,000 per year
                                                            </option>
                                                            <option value="150000">USD 150,000 per year
                                                            </option>
                                                            <option value="160000">USD 160,000 per year
                                                            </option>
                                                            <option value="170000">USD 170,000 per year
                                                            </option>
                                                            <option value="180000">USD 180,000 per year
                                                            </option>
                                                            <option value="190000">USD 190,000 per year
                                                            </option>
                                                            <option value="200000">USD 200,000 per year
                                                            </option>
                                                            <option value="210000">USD 210,000 per year
                                                            </option>
                                                            <option value="220000">USD 220,000 per year
                                                            </option>
                                                            <option value="230000">USD 230,000 per year
                                                            </option>
                                                            <option value="240000">USD 240,000 per year
                                                            </option>
                                                            <option value="250000">USD 250,000 per year
                                                            </option>
                                                            <option value="260000">USD 260,000 per year
                                                            </option>
                                                            <option value="270000">USD 270,000 per year
                                                            </option>
                                                            <option value="280000">USD 280,000 per year
                                                            </option>
                                                            <option value="290000">USD 290,000 per year
                                                            </option>
                                                            <option value="300000">USD 300,000 per year
                                                            </option>
                                                            <option value="310000">USD 310,000 per year
                                                            </option>
                                                            <option value="320000">USD 320,000 per year
                                                            </option>
                                                            <option value="330000">USD 330,000 per year
                                                            </option>
                                                            <option value="340000">USD 340,000 per year
                                                            </option>
                                                            <option value="350000">USD 350,000 per year
                                                            </option>
                                                            <option value="360000">USD 360,000 per year
                                                            </option>
                                                            <option value="370000">USD 370,000 per year
                                                            </option>
                                                            <option value="380000">USD 380,000 per year
                                                            </option>
                                                            <option value="390000">USD 390,000 per year
                                                            </option>
                                                            <option value="400000">USD 400,000 per year
                                                            </option>
                                                            <option value="410000">USD 410,000 per year
                                                            </option>
                                                            <option value="420000">USD 420,000 per year
                                                            </option>
                                                            <option value="430000">USD 430,000 per year
                                                            </option>
                                                            <option value="440000">USD 440,000 per year
                                                            </option>
                                                            <option value="450000">USD 450,000 per year
                                                            </option>
                                                            <option value="460000">USD 460,000 per year
                                                            </option>
                                                            <option value="470000">USD 470,000 per year
                                                            </option>
                                                            <option value="480000">USD 480,000 per year
                                                            </option>
                                                            <option value="490000">USD 490,000 per year
                                                            </option>
                                                            <option value="500000">USD 500,000 per year
                                                            </option>
                                                            <option value="510000">USD 510,000 per year
                                                            </option>
                                                            <option value="520000">USD 520,000 per year
                                                            </option>
                                                            <option value="530000">USD 530,000 per year
                                                            </option>
                                                            <option value="540000">USD 540,000 per year
                                                            </option>
                                                            <option value="550000">USD 550,000 per year
                                                            </option>
                                                            <option value="560000">USD 560,000 per year
                                                            </option>
                                                            <option value="570000">USD 570,000 per year
                                                            </option>
                                                            <option value="580000">USD 580,000 per year
                                                            </option>
                                                            <option value="590000">USD 590,000 per year
                                                            </option>
                                                            <option value="600000">USD 600,000 per year
                                                            </option>
                                                            <option value="610000">USD 610,000 per year
                                                            </option>
                                                            <option value="620000">USD 620,000 per year
                                                            </option>
                                                            <option value="630000">USD 630,000 per year
                                                            </option>
                                                            <option value="640000">USD 640,000 per year
                                                            </option>
                                                            <option value="650000">USD 650,000 per year
                                                            </option>
                                                            <option value="660000">USD 660,000 per year
                                                            </option>
                                                            <option value="670000">USD 670,000 per year
                                                            </option>
                                                            <option value="680000">USD 680,000 per year
                                                            </option>
                                                            <option value="690000">USD 690,000 per year
                                                            </option>
                                                            <option value="700000">USD 700,000 per year
                                                            </option>
                                                            <option value="710000">USD 710,000 per year
                                                            </option>
                                                            <option value="720000">USD 720,000 per year
                                                            </option>
                                                            <option value="730000">USD 730,000 per year
                                                            </option>
                                                            <option value="740000">USD 740,000 per year
                                                            </option>
                                                            <option value="750000">USD 750,000 per year
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="mb-3">
                                                    <label class="form-label">Maximum per year *</label>
                                                    <div class="col">
                                                        <select type="text" class="form-select"
                                                            placeholder="Select a date" id="select-tags"
                                                            name="maximumSalary">
                                                            <option value="">Select a maximum amount</option>
                                                            <option value="10000">USD 10,000 per year</option>
                                                            <option value="20000">USD 20,000 per year
                                                            </option>
                                                            <option value="30000">USD 30,000 per year
                                                            </option>
                                                            <option value="40000">USD 40,000 per year
                                                            </option>
                                                            <option value="50000">USD 50,000 per year</option>
                                                            <option value="60000">USD 60,000 per year
                                                            </option>
                                                            <option value="70000">USD 70,000 per year
                                                            </option>
                                                            <option value="80000">USD 80,000 per year
                                                            </option>
                                                            <option value="90000">USD 90,000 per year</option>
                                                            <option value="100000">USD 100,000 per year
                                                            </option>
                                                            <option value="110000">USD 110,000 per year
                                                            </option>
                                                            <option value="120000">USD 120,000 per year
                                                            </option>
                                                            <option value="130000">USD 130,000 per year
                                                            </option>
                                                            <option value="140000">USD 140,000 per year
                                                            </option>
                                                            <option value="150000">USD 150,000 per year
                                                            </option>
                                                            <option value="160000">USD 160,000 per year
                                                            </option>
                                                            <option value="170000">USD 170,000 per year
                                                            </option>
                                                            <option value="180000">USD 180,000 per year
                                                            </option>
                                                            <option value="190000">USD 190,000 per year
                                                            </option>
                                                            <option value="200000">USD 200,000 per year
                                                            </option>
                                                            <option value="210000">USD 210,000 per year
                                                            </option>
                                                            <option value="220000">USD 220,000 per year
                                                            </option>
                                                            <option value="230000">USD 230,000 per year
                                                            </option>
                                                            <option value="240000">USD 240,000 per year
                                                            </option>
                                                            <option value="250000">USD 250,000 per year
                                                            </option>
                                                            <option value="260000">USD 260,000 per year
                                                            </option>
                                                            <option value="270000">USD 270,000 per year
                                                            </option>
                                                            <option value="280000">USD 280,000 per year
                                                            </option>
                                                            <option value="290000">USD 290,000 per year
                                                            </option>
                                                            <option value="300000">USD 300,000 per year
                                                            </option>
                                                            <option value="310000">USD 310,000 per year
                                                            </option>
                                                            <option value="320000">USD 320,000 per year
                                                            </option>
                                                            <option value="330000">USD 330,000 per year
                                                            </option>
                                                            <option value="340000">USD 340,000 per year
                                                            </option>
                                                            <option value="350000">USD 350,000 per year
                                                            </option>
                                                            <option value="360000">USD 360,000 per year
                                                            </option>
                                                            <option value="370000">USD 370,000 per year
                                                            </option>
                                                            <option value="380000">USD 380,000 per year
                                                            </option>
                                                            <option value="390000">USD 390,000 per year
                                                            </option>
                                                            <option value="400000">USD 400,000 per year
                                                            </option>
                                                            <option value="410000">USD 410,000 per year
                                                            </option>
                                                            <option value="420000">USD 420,000 per year
                                                            </option>
                                                            <option value="430000">USD 430,000 per year
                                                            </option>
                                                            <option value="440000">USD 440,000 per year
                                                            </option>
                                                            <option value="450000">USD 450,000 per year
                                                            </option>
                                                            <option value="460000">USD 460,000 per year
                                                            </option>
                                                            <option value="470000">USD 470,000 per year
                                                            </option>
                                                            <option value="480000">USD 480,000 per year
                                                            </option>
                                                            <option value="490000">USD 490,000 per year
                                                            </option>
                                                            <option value="500000">USD 500,000 per year
                                                            </option>
                                                            <option value="510000">USD 510,000 per year
                                                            </option>
                                                            <option value="520000">USD 520,000 per year
                                                            </option>
                                                            <option value="530000">USD 530,000 per year
                                                            </option>
                                                            <option value="540000">USD 540,000 per year
                                                            </option>
                                                            <option value="550000">USD 550,000 per year
                                                            </option>
                                                            <option value="560000">USD 560,000 per year
                                                            </option>
                                                            <option value="570000">USD 570,000 per year
                                                            </option>
                                                            <option value="580000">USD 580,000 per year
                                                            </option>
                                                            <option value="590000">USD 590,000 per year
                                                            </option>
                                                            <option value="600000">USD 600,000 per year
                                                            </option>
                                                            <option value="610000">USD 610,000 per year
                                                            </option>
                                                            <option value="620000">USD 620,000 per year
                                                            </option>
                                                            <option value="630000">USD 630,000 per year
                                                            </option>
                                                            <option value="640000">USD 640,000 per year
                                                            </option>
                                                            <option value="650000">USD 650,000 per year
                                                            </option>
                                                            <option value="660000">USD 660,000 per year
                                                            </option>
                                                            <option value="670000">USD 670,000 per year
                                                            </option>
                                                            <option value="680000">USD 680,000 per year
                                                            </option>
                                                            <option value="690000">USD 690,000 per year
                                                            </option>
                                                            <option value="700000">USD 700,000 per year
                                                            </option>
                                                            <option value="710000">USD 710,000 per year
                                                            </option>
                                                            <option value="720000">USD 720,000 per year
                                                            </option>
                                                            <option value="730000">USD 730,000 per year
                                                            </option>
                                                            <option value="740000">USD 740,000 per year
                                                            </option>
                                                            <option value="750000">USD 750,000 per year
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3 row">
                                            <label class="form-label col-3 col-form-label"></label>
                                            <div class="col">
                                                <small class="form-hint"><strong>It's illegal to not share salary range
                                                        on job posts since 2021.</strong> Posts without salary will
                                                    automatically show an estimate of salary based on similar jobs.
                                                    Remote job postings are <a
                                                        href="https://www.natlawreview.com/article/colorado-pay-transparency-more-guidance-job-promotional-posting-requirements-issued">legally
                                                        required to show a salary compensation range in many U.S. states
                                                        and countries.</a> Google does NOT index jobs without salary
                                                    data. If it's a short-term gig, use the annual full-time equivalent.
                                                    For example, if it's a 2-week project for $2,000, the annual
                                                    equivalent would be $2,000 / 2 weeks * 52 weeks = $52,000. Please
                                                    use USD equivalent. We don't have currency built-in yet and we'd
                                                    like to use this salary data to show salary trends in remote work.
                                                    Rover Gigs is a supporter of #OpenSalaries.</small>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3 row">
                                            <label class="form-label col-3 col-form-label">Application Link or
                                                Email*</label>
                                            <div class="col">
                                                <input type="text" class="form-control"
                                                    placeholder="Application link or email"
                                                    name="applicationLinkOrEmail">
                                            </div>
                                        </div>
                                        <div class="form-group mb-3 row">
                                            <label class="form-label col-3 col-form-label">Job Type*</label>
                                            <div class="col">
                                                <label class="form-check form-check-inline">
                                                    <input class="form-check-input checkOptionJobType" type="checkbox"
                                                        name="jobType[]" value="Full-Time">
                                                    <span class="form-check-label">Full-Time</span>
                                                </label>
                                                <label class="form-check form-check-inline">
                                                    <input class="form-check-input checkOptionJobType" type="checkbox"
                                                        name="jobType[]" value="Contract">
                                                    <span class="form-check-label">Contract</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3 row">
                                            <label class="form-label col-3 col-form-label">Job Description *</label>
                                            <div class="col">
                                                <textarea id="tinymce-mytextarea" name="jobDescription"
                                                    placeholder="Enter your job's description."></textarea>
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
                                                            name="companyName">
                                                    </div>
                                                </div>
                                                <div class="col-lg-5">
                                                    <div class="mb-3">
                                                        <label class="form-label">Company HQ *</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Where your company is officially headquartered."
                                                            name="companyHQ">
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
                                                            name="companyWebsiteURL">
                                                    </div>
                                                </div>
                                                <div class="col-lg-5">
                                                    <div class="mb-3">
                                                        <label class="form-label">Email *</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="We’ll send your receipt and confirmation email here."
                                                            name="email">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 row">
                                                <label class="form-label col-3 col-form-label">Company Description
                                                    *</label>
                                                <div class="col">
                                                    <textarea id="tinymce-mytextarea" name="companyDescription"
                                                        placeholder="Enter your company or organization's description."></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 row">
                                                <label class="form-label col-3 col-form-label">Status*</label>
                                                <div class="col">
                                                    <select class="form-select" name="status" value="">
                                                        <option value="Approved">Approved</option>
                                                        <option value="Pending">Pending</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 row">
                                                <label class="form-label col-3 col-form-label">Featured*</label>
                                                <div class="col">
                                                    <select class="form-select" name="featured">
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="card-footer text-end">
                                    <div class="d-flex">
                                        <a href="/rovergigs/index.php" role="button" class="btn btn-link">Cancel</a>
                                        <button type="submit" class="btn btn-danger ms-auto">Proceed to
                                            order</button>
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
    <script src="./dist/libs/nouislider/dist/nouislider.min.js?1692870487" defer></script>
    <script src="./dist/libs/litepicker/dist/litepicker.js?1692870487" defer></script>
    <script src="./dist/libs/tom-select/dist/js/tom-select.base.min.js?1692870487" defer></script>
    <script src="./dist/libs/tinymce/tinymce.min.js?1692870487" defer></script>
    <!-- Tabler Core -->
    <script src="./dist/js/tabler.min.js" defer></script>
    <script src="./dist/js/demo.min.js" defer></script>
    <!--JQuery for the checkboxes-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!--Check option for Job Type-->
    <script type="text/javascript">
        $(document).ready(function () {

            $('.checkOptionJobType').click(function () {
                $('.checkOptionJobType').not(this).prop('checked', false);
            });

        });
    </script>
    <!--Check option for worldwide roles-->
    <script type="text/javascript">
        $(document).ready(function () {

            $('.checkOptionWorldwideRoles').click(function () {
                $('.checkOptionWorldwideRoles').not(this).prop('checked', false);
            });

        });
    </script>
    <!-- For the select tags-->
    <script>
        // @formatter:off
        document.addEventListener("DOMContentLoaded", function () {
            var el;
            window.TomSelect && (new TomSelect(el = document.getElementById('job-tags'), {
                copyClassesToDropdown: false,
                dropdownParent: 'body',
                controlInput: '<input>',
                render: {
                    item: function (data, escape) {
                        if (data.customProperties) {
                            return '<div><span class="dropdown-item-indicator">' + data
                                .customProperties + '</span>' + escape(data.text) + '</div>';
                        }
                        return '<div>' + escape(data.text) + '</div>';
                    },
                    option: function (data, escape) {
                        if (data.customProperties) {
                            return '<div><span class="dropdown-item-indicator">' + data
                                .customProperties + '</span>' + escape(data.text) + '</div>';
                        }
                        return '<div>' + escape(data.text) + '</div>';
                    },
                },
            }));
        });
        // @formatter:on
    </script>
    <!-- TinyMCE -->
    <script>
        // @formatter:off
        document.addEventListener("DOMContentLoaded", function () {
            let options = {
                selector: '#tinymce-mytextarea',
                height: 300,
                menubar: false,
                statusbar: false,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table paste code help wordcount'
                ],
                toolbar: 'undo redo | formatselect | ' +
                    'bold italic backcolor | alignleft aligncenter ' +
                    'alignright alignjustify | bullist numlist outdent indent | ' +
                    'removeformat',
                content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif; font-size: 14px; -webkit-font-smoothing: antialiased; }'
            }
            if (localStorage.getItem("tablerTheme") === 'dark') {
                options.skin = 'oxide-dark';
                options.content_css = 'dark';
            }
            tinyMCE.init(options);
        })
        // @formatter:on
    </script>

    <!-- Skip the formspree thank you page and go to my checkout page -->
    <script>
        document.getElementById("post-a-job-form").addEventListener("submit", function (e) {
            e.preventDefault();

            var form = e.target;
            var formData = new FormData(form);

            fetch(form.action, {
                method: form.method,
                body: formData,
                headers: {
                    'Accept': 'application/json'
                }
            })
                .then(response => response.json())
                .then(data => {
                    // Redirect to your checkout page
                    window.location.href = '/rovergigs/checkout.php';
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    </script>
</body>

</html>