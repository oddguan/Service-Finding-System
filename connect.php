<?php
$servername = "localhost";
$username = "cguan3";
$password = "bLzxj7r4";

// create connection
$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

// echo "Connected Successfully.";
?>