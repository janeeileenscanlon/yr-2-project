<?php
$servername = "localhost";
$username = "root";
$password = "bAnagher3555!";
$dbname = "florist_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
    $conn->set_charset("utf8");

?>

