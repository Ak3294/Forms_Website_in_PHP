<?php

$showError = false;
$showAlert = false;


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include '_dbconnect.php';
    $email = $_POST['loginEmail'];
    $name = $_POST['signup_name'];
    $pass = $_POST['loginPass'];


    $sql = "SELECT * FROM `signup` WHERE `signup_email` = '$email' AND `signup_password` = '$pass'";
    $result = mysqli_query($conn, $sql);

    $numRows = mysqli_num_rows($result);
    if ($numRows == 1) {
        $row = mysqli_fetch_assoc($result);
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['SNo'] = $row['SNo'];
        $_SESSION['id'] = $row['SNo'];

        $_SESSION['signup_email'] = $email;
        $_SESSION['signup_name'] = $name;
        
        // echo "logged in " . $email;
        header("Location: /ForumsWebsite/index.php");
    }
    header("Location: /ForumsWebsite/index.php");
}