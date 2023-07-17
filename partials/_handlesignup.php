<?php
$showError = false;
$showAlert = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("_dbconnect.php");
    $signup_name = $_POST['signupname'];
    $signup_email = $_POST['signupemail'];
    $signup_pass = $_POST['signuppassword'];
    $signup_cpass = $_POST['signupconpassword'];
    $signup_city = $_POST['signupcity'];
    $signup_state = $_POST['signupstate'];
    $signup_pin = $_POST['signuppin'];
    $signup_gender = $_POST['signupRadio'];

    //    check whether the user already present
    $existSql = "SELECT * FROM `signup` WHERE `signup_email`='$signup_email' AND `signup_password`='$signup_pass'";
    $result = mysqli_query($conn, $existSql);
    $numRows = mysqli_num_rows($result);
    if ($numRows > 0) {
        $showError = "Email is Already Present.";
    } else {
        if ($signup_pass == $signup_cpass) {
            $sql = "INSERT INTO `signup` (`signup_name`, `signup_email`, `signup_password`, `signup_city`, `signup_state`, `signup_pin`, `signup_gender`, `timestamp`) VALUES 
            ('$signup_name', '$signup_email', '$signup_pass', '$signup_city', '$signup_state', '$signup_pin', '$signup_gender', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $showAlert = true;
                //   Redirect the location: location per bhajo after the completion
                header("location: /ForumsWebsite/index.php?signup_success=true");
                exit();
            }
        } else {
            $showError = "Password and Confirm password are not match with each other";
            header("location:/ForumsWebsite/index.php?signup_success=false&error=$showError");
        }
    }
    header("location:/ForumWebsite/index.php?signup_success=false&error=$showError");
}
