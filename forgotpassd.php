<?php
include("partials/_dbconnect.php");
use PHPMailer\PHPMailer\PHPMailer;

require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/src/Exception.php';
// SMTP configuration
$smtp = array(
    'host' => 'smtp.gmail.com',
    'port' => 587,
    'username' => 'roadhealthtracker@gmail.com',
    'password' => 'bssh gzmv wszb ecik',
    'SMTPSecure' => PHPMailer::ENCRYPTION_STARTTLS
);
// Create a new PHPMailer instance
$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPDebug = 0;
$mail->Host = $smtp['host'];
$mail->Port = $smtp['port'];
$mail->SMTPSecure = $smtp['SMTPSecure'];
$mail->SMTPAuth = true;
$mail->Username = $smtp['username'];
$mail->Password = $smtp['password'];

if (isset($_POST['submit'])) {
    // Retrieve user input from the form
    $email = $_POST['email'];
    // Validate email address format
    // if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //     $error = "Invalid email format";
    // } else {
    $sql = "SELECT * FROM `userdb` WHERE eid='$email'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    // $numExistRows = mysqli_num_rows($result);                                                                                                                                              -
    if (mysqli_num_rows($result)) {
        // $showError = "Username Already Exists.";
        $new_password = substr(md5(uniqid(mt_rand(), true)), 0, 8);
        $sql = "UPDATE userdb SET password = '$new_password' WHERE eid = '$email'";
        mysqli_query($conn, $sql);
        $sql = "UPDATE municipledb SET password = '$new_password' WHERE eid = '$email'";
        mysqli_query($conn, $sql);
        $mail->setFrom('roadhealthtracker@gmail.com', 'Road Health Tracker');
        $mail->addAddress($email);
        $mail->addReplyTo('roadhealthtracker@gmail.com', 'Road Health Tracker');
        $mail->isHTML(true);
        $mail->Subject = "Your Password Updated Successfully!";
        $mail->Body = "<b>Password has been updated Successfully</b>
                           <br>Your updated passeord of your account .$email. is: " . $new_password
            . "<br><br><br><br>Thanks & regards,<br>RHT.";
        if ($mail->send()) {
            $success = "A new password has been sent to your email address.";
        } else {
            $error = "Unable to send the new password. Please try again later.";
        }
    }
    // Check if the email exists in the database
    // $sql = "(SELECT * FROM userdb WHERE eid = '$email')
    //       UNION
    //       (SELECT * FROM municipledb WHERE eid = '$email')";
    // $result = mysqli_query($conn, $sql);
    // $row = $result->fetch_assoc();
    // $sts = $row['status'];
    // If email exists, generate a random password and update the database
    // if (mysqli_num_rows($result) > 0 && $sts == 'active') {
    // $new_password = substr(md5(uniqid(mt_rand(), true)), 0, 8);
    // $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
    // Update password in both tables
    // $sql = "UPDATE userdb SET password = '$new_password' WHERE eid = '$email'";
    // mysqli_query($conn, $sql);
    // $sql = "UPDATE municipledb SET password = '$new_password' WHERE eid = '$email'";
    // mysqli_query($conn, $sql);
    // Send the new password to the user's email address
    // $mail->setFrom('roadhealthtracker@gmail.com', 'Road Health Tracker');
    // $mail->addAddress($email);
    // $mail->addReplyTo('roadhealthtracker@gmail.com','Road Health Tracker');
    // $mail->Subject = "New Password";
    // $mail->Body = "Your new password is: " . $new_password;
    // if ($mail->send()) {
    //     $success = "A new password has been sent to your email address.";
    // } else {
    //     $error = "Unable to send the new password. Please try again later.";
    // }
    else {
        $error = "Invalid email address!!" . "<br>" . "Check and try again !!";
    }
}
// }
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Road Health Tracker</title>
    <!-- bottstrap css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <!-- HTML form to enter the user's email address -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="" method="post">
                    <div class="form-group"><br><br>
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.min.js"></script>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php if (isset($success)): ?>
                    <div class="alert alert-success alert-dismissible fade show mx-auto" role="alert">
                        <?php echo $success; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
                <?php if (isset($error)): ?>
                    <div class="alert alert-danger alert-dismissible fade show mx-auto" role="alert">
                        <?php echo $error; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>