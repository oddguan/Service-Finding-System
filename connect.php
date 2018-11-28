<?php
$servername = "localhost";
$username = "cguan3";
$password = "bLzxj7r4";

// create connection
$mysqli = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
    die("Connection Failed: " . $mysqli->connect_error);
}

// echo "Connected Successfully.";
// echo "<br>\n";
?>