<?php
$servername="localhost";
$username="root";
$password="";
$database = "database2";

// Create connection
$conn = new mysqli($servername, $username, $password, $database,3306);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    // echo "Connected successfully";
}

// Close connection (optional)
// $conn->close();
?>