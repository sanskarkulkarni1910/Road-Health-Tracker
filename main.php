<?php
session_start();
require_once("nav.php");
if (!isset($_SESSION['loggedin']) || ($_SESSION['loggedin'] != true)) {
  header("location: /RHT2/");
  exit;
}
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html>
<head>
  <!-- <script>
    document.addEventListener('contextmenu', event => event.preventDefault());
    </script>  -->
  <!-- Bootstrap Links -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <!-- Template Main JS File -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <!-- title -->
  <title>Road Health Tracker</title>
  <!-- title -->
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link href="assets/img/RHT_logo-removebg-preview.png" rel="icon">
  <link href="assets/img/RHT_logo-removebg-preview.png" rel="apple-touch-icon">
  <!-- fontawesome cdn -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
  <i class="bi bi-list mobile-nav-toggle d-lg-none"></i>
  <!-- ======= Header ======= -->
  <!-- End Header -->
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center">
    <div class="container" data-aos="zoom-in" data-aos-delay="100">
      <h1 class="rhtletter"><span class="typed" data-typed-items="ROAD HEALTH TRACKER"></span></h1>
      <div class="social-links">
        <!-- header -->
        <h2><b class="other">Complaint us to improve road health...</b></h2>
        <!-- header -->
      </div>
    </div>
  </section>
  <!-- End Hero -->
  <main id="main">
    <!-- ======= About Us Section ======= -->
    <section id="about" class="about-us">
      <div class="container">
        <div class="section-title">
          <!-- header -->
          <h2 class="heading">About</h2>
          <!-- header -->
        </div>
        <div class="row no-gutters">
          <div class="image col-xl-5 d-flex align-items-stretch justify-content-center justify-content-lg-start"
            data-aos="fade-right">
            <div class="col-lg-6">
              <!-- image -->
              <img src="./assets/img/ezgif.com-video-to-gif (3).gif" class="img" alt="">
              <!-- image -->
            </div>
          </div>
          <div class="col-xl-7 ps-0 ps-lg-5 pe-lg-1 d-flex align-items-stretch">
            <div class="content d-flex flex-column justify-content-center text765">
              <div class="bold">
                <h1 data-aos="fade-up"><b class="there">There are various accidents happen because of bad road, highway
                    and heavy turn.</b></h1>
              </div>
              <br>
              <!-- rows -->
              <div class="row row1">
                <div class="col-md-6 icon-box" data-aos="fade-up">
                  <br>
                  <h1><b class="iod">In One Day</b></h1>
                  <p><h3 class="there">430 two-wheeler accidents have taken place in which 122 two-wheeler riders have lost their lives
                    whereas 202 riders have become disabled.</h3></p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                  <br>
                  <h1><b>In One Week</b></h1>
                  <p><h3 class="there">In kolhapur District 1,030 accident are happen, where 370 people lost their lives and 652 people
                    got enjured in the last year 20230.</h3></p>
                </div><br>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                  <h1><b>In One Month</b></h1>
                  <p><h3 class="there">In Kolhapur District has reported 5,640 accidents, happen where 1,459 people got enjured and 312
                    people lost their life.</h3></p>
                </div>
                <d iv class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                  <h1><b>In One Year</b></h1>
                  <p><h3 class="there">The report stated that there are 65,890 accidents have taken place in the Kolhapur District in the
                    calendar year 2023.</h3></p>
                </d>
              </div>
              <!-- rows -->
            </div>
            <!-- End .content-->
          </div>
        </div>

      </div>
    </section>
    <!-- End About Us Section -->
    <!-- services start -->
    <?php
    if ($_SESSION['logtype'] == "User") {
      echo '
                      <section id="services" class="features">
                        <div class="container">
                          <div class="section-title">
    
                            <!-- header -->
    
                            <h2 class="heading">Services</h2>
    
                            <!-- header -->
                          </div>
                          <div class="container">
                            <div class="row">
                              <div class="col-lg-6">
                                <div class="card-box card1">
                                  <a href="/RHT2/frm_complaint.php"><img src="./assets/img/comp1.jpg" class="imgcomp" alt=""></a>
                                </div>
                                <br>
                              </div>
                              <div class="col-lg-6">
                                <div class="card-box card2">
                                  <br>
                                  <a href="/RHT2/frm_feedback.php"><img src="./assets/img/feed2.jpg" class="imgfeed" alt=""></a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </section>';
    }
    ?>
    <!-- services end -->
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact ">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <!-- header -->
          <h2 class="heading">Contact</h2>
          <!-- header -->
        </div>
        <div class="row mt-1">
          <div class="col-lg-8  mt-5 mt-lg-0 m-auto">
            <!-- form -->
            <form action="https://formspree.io/f/xjvnydpl" method="POST" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="fname" class="form-control" id="name" placeholder="First Name" required>
                </div>
                <div class="col-md-6 form-group">
                  <input type="text" name="lname" class="form-control" id="name" placeholder="Last Name" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <?php echo "<input type='email' class='form-control' value=".$username." name='email' id='email' disabled required>";?>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit"><h4>Send Message</h4></button></div>
            </form>
            <!-- form -->
          </div>
        </div>
      </div>
    </section>
    <!-- End Contact Section -->
  </main>
  <!-- End #main -->


  <!-- ======= Footer ======= -->
  <footer id="footer">
    <section id="about" class="about-us">
      <div class="container">
        <div class="row no-gutters">

          <div class="image col-lg-5 d-flex align-items-stretch justify-content-center justify-content-lg-start"
            data-aos="fade-right">
            <div class="col-lg-7 icons1" ><br>
            <h1 data-aos="fade-up" class="lastheader"><b class="rhtlast">Contact Details</b></h1><br>
              <h4 class="lastitem1">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-phone"></i> 0231-254 0291</h4>
              <h4><i class="fa-solid fa-envelope" class="lastitem"></i><a href="mailto:roadhealthtracker@gmail.com"
                  class="rhtgmail"> roadhealthtracker@gmail.com </a></h4>
            </div>
          </div>

          <div class="col-xl-3 ps-0 ps-lg-3 pe-lg-1 d-flex align-items-stretch">
            <div class="vertical"></div>
            <div class="information d-flex flex-column">
              <div class="bold"><br>
                <h1 data-aos="fade-up" class="lastheader"><b class="rhtlast">Road Health Tracker</b></h1><br>
                <div class="roadhrt">
                  <h4 classs="rhtr">Roads are a crucial part of our daily lives, providing a means to get to work,
                    school,
                    and other destinations.</h4>
                </div>
              </div>
            </div>
          </div>
         <!-- End .content-->


          <div class="col-xl-3 ps-0 ps-lg-3 pe-lg-1 d-flex align-items-stretch">
            <div class="vertical1"></div><br>
            <div class=" information d-flex flex-column justify-content-center">
              <h1 data-aos="fade-up" class="lastheader"><b class="rhtlast1">Quick Links</b></h1>
              <h4 classs="rht"><a href="#services" class="complaint"><b>Forms</b></a></h4><br>
              <div class="bold">
                <h4 classs="rht"><a href="frm_complaint.php" class="complaint">Complaint &nbsp; <i class="fa-solid fa-arrow-up-right-from-square"></i></a></h4>
                <h4 classs="rht"><a href="frm_feedback.php" class="feedback"> Feedback &nbsp; <i class="fa-solid fa-arrow-up-right-from-square"></i></a></h4>
              </div>
            </div>
            <!-- End .content-->
            
          </div>
        </div>
      </div>
      <br>
      <span class="roadht">.. Designed By<a href="/"> Road Health Tracker</a> ..</span>
      
    </section>
  </footer>
  <!-- End Footer -->


  <div id="preloader" class="preloader"></div>
  <!-- arrow -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>
  <!-- arrow -->

  

  <!-- pop up model end -->
  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/typed.js/typed.umd.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <!-- Vendor JS Files -->
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>
</html>