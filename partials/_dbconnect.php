<?php
//Script fot connect to the database

$servername = "localhost";
$username = "root";
$password = "";
$database1 = "iforum" ;

// Create a Connection
$conn = mysqli_connect($servername, $username, $password, $database1);

// In Insertion Sequence SR, No,. Not be inserted.
if (!$conn) {
    die("We Failed the Connection :" . mysqli_connect_error());
}
else {
//  echo"connection was successful<br>";
}

?>