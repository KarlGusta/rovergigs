<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>WARO - Home</title>
  <!-- CSS files -->
  <link href="../dist/css/tabler.min.css" rel="stylesheet" />
  <link href="../dist/css/tabler-flags.min.css" rel="stylesheet" />
  <link href="../dist/css/tabler-payments.min.css" rel="stylesheet" />
  <link href="../dist/css/tabler-vendors.min.css" rel="stylesheet" />
  <link href="../dist/css/demo.min.css" rel="stylesheet" />

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
          <a href="/weareremoteokay/index.php">
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
                  <form class="paypal" action="request.php" method="post" id="paypal_form">
                    <div class="tab">
                      <div class="row row-cards">
                        <div class="col-lg-12">
                          <div class="d-flex align-items-center mb-3">
                            <div class="me-3">
                              <!-- Download SVG icon from http://tabler-icons.io/i/cart -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <circle cx="6" cy="19" r="2"></circle>
                                <circle cx="17" cy="19" r="2"></circle>
                                <path d="M17 17h-11v-14h-2"></path>
                                <path d="M6 5l14 1l-1 7h-13"></path>
                              </svg>
                            </div>
                            <div>
                              <h3 class="lh-1">Order Summary</h3>
                            </div>
                          </div>
                          <ul class="list-unstyled space-y-1">
                            <li><!-- Download SVG icon from http://tabler-icons.io/i/check -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon text-green" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M5 12l5 5l10 -10" />
                              </svg>
                              Job Posting - $299
                            </li>
                            <li><!-- Download SVG icon from http://tabler-icons.io/i/check -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon text-green" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M5 12l5 5l10 -10" />
                              </svg>
                              Social Media Posting - $0
                            </li>
                            <li><!-- Download SVG icon from http://tabler-icons.io/i/check -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon text-green" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M5 12l5 5l10 -10" />
                              </svg>
                              Tax - $0
                            </li>
                            <li><!-- Download SVG icon from http://tabler-icons.io/i/check -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon text-green" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M5 12l5 5l10 -10" />
                              </svg>
                              <b>Total</b> - $299
                            </li>
                          </ul>
                          <p>At the end of the 30-day term, job listings <b>automatically renew</b> to help make your hiring process more convenient.
                            After each renewal, your listing returns to the top of the feed until the job is cancelled.
                            Auto-renewal can be turned off anytime through the email receipt or your account dashboard after purchase.</p>
                          </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer text-end">
                      <div class="d-flex">
                        <div id="paypal-button-container-P-9D323108BU244171SMPIPO5A"></div>
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
  <!--This is where the footer should be but I have removed it-->
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
  <!-- PayPal -->
  <script src="https://www.paypal.com/sdk/js?client-id=AepFjoQ_4xd6hvOw2KCbQKDmGgSMWBe4C78XkVbaA65raM_2QfMv1c7OeR0GZnlyZNciZeYushFxKLFn&vault=true&intent=subscription" data-sdk-integration-source="button-factory"></script>
  <script>
    paypal.Buttons({
      style: {
        shape: 'rect',
        color: 'silver',
        layout: 'vertical',
        label: 'paypal'
      },
      createSubscription: function(data, actions) {
        return actions.subscription.create({
          /* Creates the subscription */
          plan_id: 'P-9D323108BU244171SMPIPO5A'
        });
      },
      onApprove: function(data, actions) {
        alert(data.subscriptionID); // You can add optional success message for the subscriber here
      }
    }).render('#paypal-button-container-P-9D323108BU244171SMPIPO5A'); // Renders the PayPal button
  </script>
</body>

</html>