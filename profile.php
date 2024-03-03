<?php
$name = '';
$email = '';
$mobno = '';
$address = '';
$gender = '';
$signupdate = '';
$image = '';
$Complaintresult = false;
$Displayresult = false;
require "partials/_dbconnect.php";
session_start();
if (!isset($_SESSION['loggedin']) || ($_SESSION['loggedin'] != true)) {
    header("location: /RHT2/");
    exit;
} else {
    if ($_SESSION['logtype'] == "User") {
        $username = $_SESSION['username'];
        $sql = "SELECT * FROM userdb WHERE eid = '$username'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        //Displaying the sql query
        if ($num == 1) {
            $row = mysqli_fetch_assoc($result);
            $name = $row['name'];
            $email = $row['eid'];
            $address = $row['address'];
            $gender = $row['gender'];
            $mobno = $row['mobno'];
            $signupdate = $row['datetime'];
            $image = $row['user_image'];
        }
        //For Complaints -- Data Collection which is send by particular user
        $ComplaintQuery = "SELECT * FROM `complaintdb` WHERE `eid` LIKE '$username'";
        $Complaintresult = mysqli_query($conn, $ComplaintQuery);
        $num = mysqli_num_rows($Complaintresult);
        // For Feedbacks Data Collection which is send by particular user
        $DisplayQuery = "SELECT * FROM `feedbackdb` WHERE `eid` LIKE '$username'";
        $Displayresult = mysqli_query($conn, $DisplayQuery);
        $num = mysqli_num_rows($Displayresult);
        $style = "style='display:block'";
    }

    if ($_SESSION['logtype'] == "Municipal") {
        $style = "style='display:none'";
        $username = $_SESSION['username'];
        $sql = "SELECT * FROM municipledb WHERE eid = '$username'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        //Displaying the sql query
        if ($num == 1) {
            $row = mysqli_fetch_assoc($result);
            $name = $row['name'];
            $email = $row['eid'];
            $address = $row['address'];
            $gender = "Municipal";
            $mobno = $row['mobno'];
            $signupdate = '28/01/2024';
            $image = "assets/img/municipal_logo.png";
        }
        $style = "style='display:none'";
    }
}
if (isset($_GET['profile_updated'])) {
    echo"<script>
        alert('Profile Updated Successfully!');
        </script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap Links -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            border: 1px solid #ddd;
        }

        th,
        td {
            font-size: 12px;
            text-align: left;
            text-wrap: balance;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #bab4b4;
        }

        .pflex {
            display: flex;
            font-size: 16px;
            padding: 20px;
        }

        .pflex1 {
            flex: 25%;
            text-align: center;
        }

        .pfdata {
            margin: 10px;
                padding-bottom: 10px;
            }

        .pflex2 {
            flex: 75%;
            justify-content: left;
            padding-top: 20px;
            padding-left: 30px;
            border-left: 1px solid grey;
        }
    </style>
    <title>Road Health Tracker</title>
    <!-- Favicons -->
    <link href="assets/img/RHT_logo-removebg-preview.png" rel="icon">
    <link href="assets/img/RHT_logo-removebg-preview.png" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script>
        if ((document.getElementById("type").value) == "Municipal") {
            document.getElementById("onlyforuser").style.dsiplay = "none";
        }

    </script>
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="d-flex flex-column justify-content-center arrow">
        <nav id="navbar" class="navbar nav-menu">
            <ul>
                <li><a href="/RHT2/main.php" class="nav-link scrollto"><i class="fa-solid fa-arrow-left"
                            style="color: #bab4b4;"></i><span>Go Back</span></a>
                </li>
            </ul>
        </nav>
        <!-- .nav-menu -->
    </header>
    <!-- End Header -->
    <!-- go back button start -->
    <div class="gb">
        <nav id="navbar" class="navbar nav-menu">
            <ul>
                <li>
                    <a href="/RHT2/main.php" class="nav-link scrollto"><i class="fa-solid fa-arrow-left"
                            style="color: #ff0000;"></i></a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- go back button end -->
    <div class="container">
        <div class="card col-md-12">
            <div class="card-header">
                <h1 style="text-align:center"> <b>Profile</b></h1>
                <?php
                if (isset($success)) {
                    echo '<div class="alert alert-danger alert-dismissible fade out">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong>' . $success . '</div>';
                }
                ?>
            </div>
            <div class="card-body">
                <div class="pflex">
                    <div class="pflex1">
                        <h1 class="titl"><span class="title12">Profile Picture</span></h1>
                        <?php
                        echo '<img src="' . $image . '" height="200px" width="200" alt="" class="rounded-pill pict">';
                        ?>
                    </div>
                    <div class="pflex2">
                        <br>
                        <?php
                        echo '<span class="pfdata"><b title="Name"><i class="fa-solid fa-user"></i></b>' . $name . ' </span><br>
                        <span class="pfdata"><b title="You are"><i class="fa-solid fa-genderless"></i></b> ' . $gender . '</span><br>
                        <span class="pfdata"><b title="Email"><i class="fa-solid fa-at"></i></b> ' . $email . '</span><br>
                        <span class="pfdata"><b title="Mobile No"><i class="fa-solid fa-mobile"></i></b> ' . $mobno . '</span><br>
                        <span class="pfdata"><b title="Address"><i class="fa-solid fa-address-card"></i></b> ' . $address . '</span><br>
                        <span class="pfdata"><b title="Sign Up Date"><i class="fa-solid fa-calendar-day"></i></b> ' . $signupdate . '</span><br>';
                        ?>
                    </div>
                    <div>
                        <?php
                        if ($_SESSION['logtype'] == "User") {
                            echo '<a href="/RHT2/edit_profile.php"><i class="fa-solid fa-pen-to-square" style="color:#bb0c0c; font-size:20px;"></i>
                            </a>';
                        }
                        ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
    <!-- Complaints -->
    <?php
    // If the logtype is user then the he can see their sent complaints and feedbacks in there profile.
    //so the if logtype is municipal then he can't see it .
    if ($_SESSION['logtype'] == "User") {
        echo '<div class="card">
    <div class="card-header">
        <h1 style="text-align:center;font-weight:bold;">Complaints</h1>
    </div>
    <div class="card-body">
        <blockquote class="blockquote mb-0">
            <div style="overflow-x:auto;">
                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Image</th>
                            <th>Complaint</th>
                            <th>Area</th>
                            <th>Location</th>
                            <th>Date and Time</th>
                            <th>Verification</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>';

        if ($num > 0) {
            while ($row = mysqli_fetch_assoc($Complaintresult)) {
                echo "<tr data-id='" . $row['sr'] . "'>
                    <td>" . $row['sr'] . "</td>
                    <td><a href=" . $row['image'] . " target='_blank'><img src='" . $row['image'] . "' width='50' height='50'/></a> </td>
                    <td>" . $row['complaint'] . "</td>
                    <td>" . $row['area'] . "</td>
                    <td><a href='#' onclick='openMap(" . $row['latitude'] . "," . $row['longitude'] . ")' class='text-secondary font-weight-bold text-xs' title='Click to go' ><i class='fas fa-map-marker-alt'></i> Click</a></td>
                    <td>" . $row['datentime'] . "</td>
                    <td>" . $row['comfirm'] . "</td>
                    <td>" . $row['status'] . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='8'><br><h3 style='text-align:center;'>No data found!</h3><br></td></tr>";
        }


        echo '            </tbody>
                        </table>
                    </div>
                </blockquote>
            </div>
        </div>

        <!-- Feedbacks -->
        <br><br>
        <hr><br><br><br>

        <div class="card">
            <div class="card-header">
                <h1 style="text-align:center;font-weight:bold;">Feedbacks</h1>
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <div style="overflow-x:auto;">
                        <table>
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Image</th>
                                    <th>Message</th>
                                    <th>Area</th>
                                    <th>Location</th>
                                    <th>Date and Time</th>
                                    <th>Rating</th>
                                    <th>Reply</th>

                                </tr>
                            </thead>
                            <tbody>';
        if ($num > 0) {
            while ($row = mysqli_fetch_assoc($Displayresult)) {

                echo "<tr data-id='" . $row['sr'] . "'>
                                            <td>" . $row['sr'] . "</td>
                                            <td><a href=" . $row['image_link'] . " target='_blank'><img src='" . $row['image_link'] . "' width='50' height='50'/></a> </td>
                                            <td>" . $row['msg'] . "</td>
                                            <td>" . $row['area'] . "</td>
                                            <td><a href='#' onclick='openMap(" . $row['latitude'] . "," . $row['longitude'] . ")' class='text-secondary font-weight-bold text-xs' title='Click to go' ><i class='fas fa-map-marker-alt'></i> Click</a></td>
                                            <td>" . $row['datentime'] . "</td>
                                            <td>" . $row['rating'] . "</td>
                                            <td>" . $row['reply'] . "</td>
                                            </tr>";
            }
        } else {
            echo "<tr ><td colspan='8'><br><h3 style='text-align:center;'>No data found!</h3><br></td></tr>";
        }
        echo '      
                            </tbody>
                        </table>
                    </div>
                </blockquote>
            </div>
        </div>';

    }
    ?>
    <script>
        function openMap(latitude, longitude) {
            // create URL for Google Maps with the provided latitude and longitude
            const url = `https://www.google.com/maps/search/?api=1&query=${latitude},${longitude}`;
            // open the URL in a new window
            window.open(url);
        }
    </script>
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
</body>

</html>