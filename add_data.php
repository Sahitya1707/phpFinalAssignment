<?php
// Include your database connection file
include 'connection.php';

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Prepare and execute SQL query to insert data into users table
    $sql = "INSERT INTO user (username, email, phone) VALUES ('$username', '$email', '$phone')";
    if (mysqli_query($conn, $sql)) {
        // Data inserted successfully, redirect back to the dashboard
        header("Location: dashboard.php");
        exit();
    } else {
        // Error handling if insertion fails
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
