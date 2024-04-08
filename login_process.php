<?php
session_start();
include 'connection.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Fetch user data from database
    $sql = "SELECT * FROM signup WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Error executing query: " . mysqli_error($conn));
    }
    $row = mysqli_fetch_assoc($result);

    // Check if user exists and verify password
    if ($row && password_verify($password, $row['password'])) {
        // Set session variable to indicate user is logged in
        $_SESSION['username'] = $username;
        // Redirect to dashboard.php after successful login
        header("Location: dashboard.php");
        exit(); // Make sure to exit after redirection
    } else {
        // Authentication failed, redirect back to login page with error message
        header("Location: login.php?error=1");
        exit(); // Make sure to exit after redirection
    }
}
?>
