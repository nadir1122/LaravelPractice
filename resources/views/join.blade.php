<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>FlexStart Bootstrap Template - Index</title>
  <meta content="" name="description"> 
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: FlexStart - v1.9.0
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

 @include('menu')
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">
        <header class="section-header">
          <h2>Be part of Union</h2>
          <p>Join Us Now</p>
        </header>
        <div class="row gy-4">
          <div class="col-lg-2">

          </div>
          <div class="col-lg-8">

            <form action="/join" method="post" class="php-email-form">
                {{ csrf_field() }}

                @if(isset($iserror) && $iserror==true)
                    <div class="row">
                        <div class="alert alert-danger" role="alert">
                            {{ $msg }}
                        </div>
                    </div>
                @endif

                @if(isset($join_complete) && $join_complete==false)
              <div class="row gy-4">
                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" name="phone" placeholder="Whatsapp Phone" required>
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" name="city" placeholder="City" required>
                </div>

                  <div class="col-md-12">
                  <input type="text" class="form-control" name="password" placeholder="*****" required>
                </div>
                  <div class="col-md-12">
                      <input type="text" class="form-control" name="confirm_password" placeholder="*****" required>
                  </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>

                  <button type="submit">Join Now</button>
                </div>

              </div>
                @else
                    <div class="row gy-4">
                        <div class="alert alert-success" role="alert">
                            <h3>Your account has been created. Please verify your email </h3>
                        </div>
                    </div>
                @endif
            </form>
          </div>
        </div>
      </div>
    </section><!-- End Contact Section -->


  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Contact Section ======= -->

  </main><!-- End #main -->
 <script>

 </script>

@include('footer')
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
