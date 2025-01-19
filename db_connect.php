<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "avis_it_solutions";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>