<?php
$host = "localhost";
$user = "root";
$pass = "root";  // Use your password if set in XAMPP/WAMP
$dbname = "ecomission";

$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
