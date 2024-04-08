

<?php
// Include your database connection file
include 'connection.php';

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    // Retrieve form data
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Update data in the database
    $sql = "UPDATE user SET username='$username', email='$email', phone='$phone' WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        // Data updated successfully, redirect back to dashboard
        header("Location: dashboard.php");
        exit();
    } else {
        // Error handling if update query fails
        echo "Error updating data: " . mysqli_error($conn);
    }
} else {
    // Redirect to dashboard if form data is not submitted
    header("Location: index.php");
    exit();
}
?>
