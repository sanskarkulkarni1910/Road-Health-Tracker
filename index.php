<?php
$login = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require "partials/_dbconnect.php";
    $username = $_POST["username"];
    $password = $_POST["password"];
    $logtype = $_POST["logtype"];
    // describing he is user or municipal -->

    if ($logtype == "User") {
        $sql = "SELECT * FROM userdb WHERE eid = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $login = true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['logtype'] = $logtype;
            header("location: main.php");

        } else {
            $showError = "Invalid Credentials";
        }
    }

    if ($logtype == "Municipal") {
        $sql = "SELECT * FROM municipledb WHERE eid = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $login = true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['logtype'] = $logtype;
            header("location: /RHT2/main.php");

        } else {
            $showError = "Invalid Credentials";
        }
    } 
    else {
        $showError = " Something Went Wrong ";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <link href="assets/img/RHT_logo-removebg-preview.png" rel="icon">
    <link href="assets/img/RHT_logo-removebg-preview.png" rel="apple-touch-icon">

    <!-- <script>
        document.addEventListener('contextmenu', event => event.preventDefault());
    </script> -->
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

    <div class="starting">
        <div class="container1">
            <div class="indextitle">
                <div class="flexlogin">

                    <div class="f1">
                        <a href="">
                            <img src="assets/img/RHT_logo-removebg-preview.png" height="100" width="100" alt=""
                                style="margin: 0 0;">
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
                if ($login) {
                    echo '<div class="alert alert-success alert-dismissible fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success! </strong> You are logged in</div>';
                }
                if ($showError) {
                    echo '<div class="alert alert-danger alert-dismissible fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Failed!</strong>' . $showError . '</div>';
                }
                ?>
                <!-- Dismissable Errror -->
                <h2>Sign-In</h2>
            </div>
            <form class="form" action="/RHT2/" method="POST">
                <div class="input-group1">
                    <label for="username" class="lable-title1"> Username or Email Id: </label>
                    <input type="email" name="username" id="username" placeholder="Username" required />

                    <label for="password" class="lable-title1"> Password: </label>
                    <input type="password" name="password" id="password" placeholder="Password" required />
                </div>
                <label for="logtype" class="lable-title1"> Are you:</label>
                <div class="input-group2">

                    <input type="radio" name="logtype" id="logtype" value="User" required> User
                    &nbsp;&nbsp; <input type="radio" id="logtype" name="logtype" value="Municipal"> Municipal
                </div>
                <br>
                <span> If you don't have any account, <a href="/RHT2/signup.php">Sign Up.</a></span>
                <br>
                <br>
                <div class="input-group1">

                    <button class="submit-btnnm">Submit</button>

                </div>
                <br>
                <div class="input-group3">
                    <span class="fp"><a href="/RHT2/forgotpassd.php">Forgot Password?</a></span>
                </div>
            </form>

        </div>
    </div>
</body>

</html>