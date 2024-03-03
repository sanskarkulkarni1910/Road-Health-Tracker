<?php
$error = null;
$success = null;
include("partials/_dbconnect.php");
session_start();
if (!isset($_SESSION['loggedin']) || ($_SESSION['loggedin'] != true)) {
    header("location:/RHT2/");
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
            $password = $row['password'];
            $mobno = $row['mobno'];
            $signupdate = $row['datetime'];
            $image = $row['user_image'];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Road health Tracker</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <!-- Bootstrap Links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <style>
        body {
            background-color: rgb(243, 243, 243);
        }
        .title {
            text-align: center;
            margin-bottom: 30px;
            margin-top: -20px;
        }

        .pict {
            margin-left: 75px;
            margin-top: 15px;
            margin-bottom: 15px;
        }

        .btn {
            margin-left: 60px;
        }

        .btn1 {
            margin-left: -15px;
        }

        .titl {
            background-color: rgb(224, 224, 224);
            padding: 5px 0px;
        }

        .title12 {
            margin-left: 20px;
            font-size: 20px;
        }

        .card {
            border-radius: 0px;
            box-shadow: 0 0 5px rgb(51, 51, 51);
        }

        .text1 {
            height: 40px;
            width: 680px;
            padding: 10px;
        }

        .text {
            color: rgb(109, 109, 109);
        }
        .modal-header {
            background-color: rgb(224, 224, 224);
        }
        .text2 {
            width: 48%;
            margin-right: 10px;
            height: 40px;
            padding: 10px;
        }
        .text3 {
            width: 48%;
            margin-right: 10px;
            height: 40px;
            padding: 10px;
        }
        .text4 {
            margin-left: 305px;
        }
        .cp {
            margin-left: 57%;
        }
        .text7 {
            height: 40px;
            width: 100%;
            padding: 10px;
        }
        .text8 {
            margin-right: 140px;
        }
        .text10 {
            width: 215px;
            margin-right: 24px;
            height: 40px;
            padding: 10px;
        }
        .text11 {
            width: 215px;
            height: 40px;
            padding: 10px;
        }
    </style>
    
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="d-flex flex-column justify-content-center arrow">
        <nav id="navbar" class="navbar nav-menu">
            <ul>
                <li><a href="/RHT2/profile.php" class="nav-link scrollto"><i class="fa-solid fa-arrow-left"
                            style="color: #ff0101;"></i><span>Go Back</span></a>
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
                <li><a href="/RHT2/profile.php" class="nav-link scrollto"><i class="fa-solid fa-arrow-left"
                            style="color: #ff0000;"></i><span></span></a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- go back button end -->
    
    <br>
    <br>
    <div class="container">
        <div class="row">
            <h1 class="title">Edit Profile</h1>

            <div class="col-lg-4">
                <div class="card">
                    <?php
                    if (isset($_POST['edit_profile'])) {
                        $name = $_POST['name'];
                        $mobno = $_POST['mobno'];
                        $address = $_POST['address'];
                        $gender = $_POST['gender'];
                        $folder = 'image_data/user_data/';
                        $file = $_FILES['image']['tmp_name'];
                        $file_name = $_FILES['image']['name'];
                        $file_name_array = explode('.', $file_name);
                        $extension = end($file_name_array);
                        $new_image_name = 'profile_' . rand() . '.' . $extension;
                        if ($_FILES["image"]["size"] > 1000000) {
                            $error = 'Sorry,your image is too large.Upload less than 1 MB in size.';
                        }
                        if ($file != "") {
                            if ($extension != "jpg" && $extension != "png" && $extension != "jpeg" && $extension != "gif" && $extension != "PNG" && $extension != "JPG" && $extension != "JPEG" && $extension != "GIF") {
                                $error = 'Sorry, your image is too large.Upload less than 1 MB in size.';
                            }
                        }
                        if (!isset($error)) {
                            if ($file != "") {
                                $result = mysqli_query($conn, "SELECT user_image from userdb WHERE eid='$username'");
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $deleteimage = $row['user_image'];
                                }
                                unlink($deleteimage);
                                move_uploaded_file($file, $folder . $new_image_name);
                                mysqli_query($conn, "UPDATE userdb SET user_image ='$folder$new_image_name' WHERE eid='$username'");
                            }
                            $result = mysqli_query($conn, "UPDATE userdb SET name='$name', gender='$gender', mobno='$mobno',address='$address' WHERE eid='$username'");
                            if ($result) {
                                // header_remove();
                                // header("location: /RHT2/profile.php?profile_updated=1");
                                // $success="Profile Updated Successfully";
                                // header_remove();
                                // header("location: /RHT2/profile.php?profile_updated=1");
                                echo"<script>
                                window.location.href ='/RHT2/profile.php?profile_updated=1';
                                </script>";
                            } else {
                                echo"<script>
                                alert('Something Went Wrong!');
                                </script>";
                            }
                        }
                    }
                    ?>
                    <form method="POST" action="/RHT2/edit_profile.php" enctype="multipart/form-data">
                    <div class="titl">
                    <?php
                    if (isset($success)) {
                        echo '<div class="alert alert-success alert-dismissible fade out">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success !</strong> &nbsp;' . $success . '.</div>';
                    }
                    if (isset($error))
                        echo '<div class="alert alert-danger alert-dismissible fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Error !</strong> &nbsp;' . $error . '.</div>';
                    ?>
                    </div>
                        <h1 class="titl"><span class="title12">Profile Picture</span></h1>
                        <?php
                        if (($image == NULL)) {
                            echo '<img src="image_data/user_default.jpg" height="200px" width="200" alt="" class="rounded-pill pict">';

                        } else {
                            echo '<img src="' . $image . '" height="200px" width="200" alt="" class="rounded-pill pict">';
                        }
                        ?>
                        <!-- <img src="assets/img/u1.jpg" height="200px" width="200" alt="" class="rounded-pill pict"> -->
                        <div class="card-body">
                            <input type="file" id="image" name="image" style="border:darkgrey 2px solid;"
                                class="form-control"  value="<?php echo $image ?>">
                            <!-- <input type="button" class="btn btn-outline-primary" value="Change profile Picture"
                            data-bs-toggle="modal" data-bs-target="#myModal2    "> -->
                        </div>
                </div>
            </div>
            <div class="col-lg-8 navbar-expand-sm">
                <div class="card">
                    <h1 class="titl"><span class="title12">Account Details</span></h1>
                    <div class="card-body">
                        <?php
                        echo '<h6 class="text">Name</h6>
                                <input type="text" id="fname" class="text1" name="name" placeholder="Name" value="' . $name . '" required>
                                <br><br>
                                <h6 class="text"><span class="text5" >Email</span><span class="text6" style="margin:350px;">Mobile No:</span> 
                                </h6>
                                <input type="text" id="mobno" class="text3"  name="email" placeholder="Email" value="' . $email . '" required disabled title="You can not change email id">
                                <input type="phone" id="mobno" class="text3" min="10" maxlength="10" name="mobno" placeholder="Mobile No" value="' . $mobno . '" required>
                                <br><br> 
                                <h6 class="text">Address</h6>
                                <input type="text" id="address" class="text1" name="address" placeholder="Address" value="' . $address . '" required>
                                <br><br>';
                        ?>
                        <h6 class="text"><span class="text5" required>Gender</span></h6>
                        <input type="radio" class="text" name="gender" value="Male"<?php if (($gender == "Male")) {
                            echo "checked";
                        } ?>>&nbsp; Male &nbsp;
                        <input type="radio" name="gender" value="Female" class="text"<?php if (($gender == "Female")) {
                            echo "checked";
                        } ?>>&nbsp;Female
                        <div class="card-body">
                            <input type="submit" class="btn btn1 btn-outline-primary" name="edit_profile"
                                value="Save Changes">
                            </form>
                            <a href="" class="cp" data-bs-toggle="modal" data-bs-target="#myModal">
                                <i class="fa-solid fa-key"></i>
                                Change Password?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
    </div>
    <!-- Modal for change password -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!--modal content-->
                <div class="modal-header">
                    <h5>Change Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <!--Modal content-->
                <div class="modal-body">
                    <?php
                    if (isset($_POST["change_password"])) {
                        $oldpassword = $_POST["oldpassword"];
                        $newpassword = $_POST["newpassword"];
                        $comfirmpassword = $_POST["comfirmpassword"];
                        $mainpassword = $password;
                        if ($mainpassword == $oldpassword) {
                            if ($comfirmpassword == $newpassword) {
                                $result = mysqli_query($conn, "UPDATE userdb SET password ='$newpassword' WHERE eid='$username'");
                                if ($result) {
                                    echo"<script>
                                alert('Password Updated Successfully!');
                                </script>";
                                } else {
                                    echo"<script>
                                alert('Failed to update password!');
                                </script>";
                                }
                            }
                        }
                    }
                    ?>
                    <form method="POST" action="">
                        <!-- <h6 class="text">Username</h6>
                        <input type="text" id="fname" class="text7" name="name" placeholder="Username">
                        <br><br> -->
                        <h6 class="text"> Old Password</h6>
                        <input type="password" id="fname" class="text7" name="oldpassword" placeholder="Password"
                            required>
                        <br><br>
                        <h6 class="text"><span class="text8" required>New Password</span><span class="text9"
                                required>Comfirm Password</span></h6>
                        <input type="password" id="fname" class="text10" name="newpassword" placeholder="New Password"
                            required>
                        <input type="password" id="fname" class="text11" name="comfirmpassword"
                            placeholder="Comfirm Password" required>
                        <br><br>
                </div>
                <!--Modal Footer-->
                <div class="modal-footer">
                    <input type="submit" name="change_password" class="btn btn-primary">
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal for Update profile -->
    <!--  -->
</body>
</html>