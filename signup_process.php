<?php
if(isset($_POST['submit'])){
    include "connection.php";
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $sql = "SELECT * FROM signup WHERE username='$username'";
    $result_user = mysqli_query($conn, $sql);
    if (!$result_user) {
        die("Error executing query: " . mysqli_error($conn));
    }
    $count_user = mysqli_num_rows($result_user);

    // Check if the username already exists
    if ($count_user > 0) {
        echo '<script>alert("Username already exists."); window.location.href= "index.php";</script>';
        exit();
    }

    // Assuming email is unique, check if the email already exists
    $sql = "SELECT * FROM signup WHERE email='$email'";
    $result_email = mysqli_query($conn, $sql);
    if (!$result_email) {
        die("Error executing query: " . mysqli_error($conn));
    }
    $count_email = mysqli_num_rows($result_email);

    // Check if the email already exists
    if ($count_email > 0) {
        echo '<script>alert("Email already exists."); window.location.href= "index.php";</script>';
        exit();
    }

    // If neither username nor email exists, proceed with signup
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO signup (username, email, password) VALUES ('$username', '$email', '$hash')";
    $result_insert = mysqli_query($conn, $sql);
    if ($result_insert) {
        // Redirect to login page if signup is successful
        header("Location: login.php");
        exit();
    } else {
        // Error handling if insert query fails
        echo '<script>alert("Error in signing up. Please try again.");</script>';
    }
}
?>
