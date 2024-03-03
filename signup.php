<?php
$showAlert = false;
$showError = false;
use PHPMailer\PHPMailer\PHPMailer;

require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/src/Exception.php';
$smtp = array(
  'host' => 'smtp.gmail.com',
  'port' => 587,
  'username' => 'roadhealthtracker@gmail.com',
  'password' => 'bssh gzmv wszb ecik',
  'SMTPSecure' => PHPMailer::ENCRYPTION_STARTTLS
);
$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPDebug = 0;
$mail->Host = $smtp['host'];
$mail->Port = $smtp['port'];
$mail->SMTPSecure = $smtp['SMTPSecure'];
$mail->SMTPAuth = true;
$mail->Username = $smtp['username'];
$mail->Password = $smtp['password'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  require "partials/_dbconnect.php";
  $fname = $_POST["fname"];
  $gender = $_POST["gender"];
  $password = $_POST["password"];
  $mob = $_POST["mobno"];
  $email = $_POST["eid"];
  $password2 = $_POST["cpassword"];
  $address = $_POST["adrs"];
  $image = 'image_data/user_default.jpg';
  // $exists = false;
  // Checks the existence of user: 
  $existsSql = "SELECT * FROM `userdb` WHERE eid='$email';";
  $result = mysqli_query($conn, $existsSql);
  $numExistRows = mysqli_num_rows($result);
  if ($numExistRows > 0) {
    //if user found
    $showError = "Username Already Exists.";
  } else {
    //If user not found
    $exists = false;
    if (($password == $password2)) {
      $sql = "INSERT INTO `userdb` (`user_image`, `gender`, `name`, `password`, `mobno`, `eid`, `address`, `datetime`) VALUES ('$image', '$gender', '$fname', '$password', '$mob', '$email', '$address', current_timestamp());";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        $mail->setFrom('roadhealthtracker@gmail.com', 'Road Health Tracker');
        $mail->addAddress($email);
        $mail->addReplyTo('roadhealthtracker@gmail.com', 'Road Health Tracker');
        $mail->isHTML(true);
        $mail->Subject = "Hi, Welcome to Road Health Tracker.";
        $mail->Body = "<b>Your Account has been created successfully.</b>
                        <br><br>
                        Hi,$fname.<br>
                        Welcome to the <b>Road Health Tracker.</b>! 
                        <br>We're thrilled to have you as part of our community. 🎉
                        <br>
                        <br>Thank you for choosing us as your platform of choice. Your new account is now set up and ready for you to explore the exciting features we have to offer. 
                        <br><br>Your Username and Password to access our website is as follows: 
                        <br><b>Username: </b>$email<br>
                        <b>Password: </b>$password
                        <br><br><br><br>Thanks & regards,<br>RHT.";
        if ($mail->send()) {
          $success = "A new password has been sent to your email address.";
        } else {
          $error = "Unable to send the new password. Please try again later.";
        }
        $showAlert = true;
        header("location: /RHT2/");

      } else {
        die("Error" . mysqli_error($conn));
      }
    } else {
      $showError = "Password does not match.";
    }
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <link href="assets/img/RHT_logo-removebg-preview.png" rel="icon">
  <link href="assets/img/RHT_logo-removebg-preview.png" rel="apple-touch-icon">

  <!-- bottstrap css -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <!-- <script>
        document.addEventListener('contextmenu', event => event.preventDefault());
    </script> -->

  <!-- Template Main JS File -->

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <!-- title -->
  <title>Road Health Tracker</title>
  <!-- title -->

  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->

  <!-- fontawesome cdn -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <!-- <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet"> -->

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body class="bgofsign">




  <!-- ======= Header ======= -->

  <header id="header" class="d-flex flex-column justify-content-center arrow">
    <nav id="navbar" class="navbar nav-menu">
      <ul>
        <li><a href="/RHT2/" class="nav-link scrollto"><i class="fa-solid fa-arrow-left"
              style="color: #ff0101;"></i><span>Go Back</span></a>
        </li>
      </ul>
    </nav>

    <!-- .nav-menu -->

  </header><!-- End Header -->



  <div class="starting">
    <div class="container2">
      <div class="indextitle">
        <div class="flexlogin">

          <div class="f1">
            <a href="">
              <img src="assets/img/RHT_logo-removebg-preview.png" height="100" width="100" alt="" style="margin: 0 0;">
            </a>
          </div>
          <div class="f2">
            <a href="">
              <h2>Road Health Tracker</h2>
            </a>
            </span>
          </div>
        </div>
        <hr>
        <!-- Dissmissable Error -->
        <?php
        if ($showAlert) {
          echo '<div class="alert alert-success alert-dismissible fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> &nbsp;Your data added succesfully.</div>';
        }
        if ($showError) {
          echo '<div class="alert alert-danger alert-dismissible fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Failed !</strong> &nbsp;' . $showError . '</div>';
        }
        ?>
        <!-- Dismissable Errror -->

        <h2>Sign Up</h2>
      </div>
      <form class="form" action="/RHT2/signup.php" method="post">
        <div class="input-group1">
          <label for="name" class="lable-title1">Enter Your Full Name: *</label>
          <input type="text" name="fname" id="fname" placeholder="Full Name" required />
          <div class="insideflexsu">
            <div class="suflex1">
              <label for="eid" class="lable-title1"> Enter Email: *</label>
              <input type="email" name="eid" id="eid" placeholder="Email" required />
            </div>
            <div class="suflex2">
              <label for="username" class="lable-title1"> Enter Mob No: *</label>
              <input type="text" maxlength="10" max="10" name="mobno" id="mobno" placeholder="+91" required />

            </div>
          </div>
          <div class="insideflexsu">
            <div class="suflex1">
              <label for="password" class="lable-title1"> Password: *</label>
              <input type="password" name="password" maxlength="18" minlength="8" id="password" placeholder="Password"
                required />

            </div>
            <div class="suflex2">
              <label for="password" class="lable-title1">Confirm Password: *</label>
              <input type="password" name="cpassword" maxlength="18" minlength="8" id="cpassword"
                placeholder="Confirm Password" required onfocus="displayMessage()" />
              <p type="hidden" id="hidpara" style="color:red;text-size: 9px;"></p>
            </div>
          </div>
        </div>
        <label for="logtype" class="lable-title1"> Gender:</label>
        <div class="input-group2">

          <input type="radio" name="gender" id="gender" value="Male" required> Male
          &nbsp;&nbsp; <input type="radio" id="gender" name="gender" value="Female"> Female
        </div>
        <div class="input-group1">
          <label for="address" class="lable-title1">Enter Your Address: </label>
          <textarea id="" cols="30" rows="3" name="adrs" id="adrs" minlength="30" maxlength="200"
            placeholder="Address"></textarea>


          <div class="insideflexsu">
            <div class="suflex1">
              <button class="submit-btnnm" type="reset">Reset</button>
            </div>
            <div class="suflex2">
              <button class="submit-btnnm">Submit</button>
            </div>
          </div>


          <br>
          <div class="" style="text-align: center;">
            <span class=" ">Do you have account already ?<a href="/RHT2/">Sign-In</a></span>
          </div>
      </form>
    </div>
  </div>


</body>

</html>