<?php
// Include your database connection file
include 'connection.php';

// Check if form data is submitted for deletion
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    // Retrieve ID of the record to be deleted
    $id = $_POST['id'];

    // Delete data from the database
    $sql = "DELETE FROM user WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        // Data deleted successfully, redirect back to dashboard
        header("Location: dashboard.php");
        exit();
    } else {
        // Error handling if delete query fails
        echo "Error deleting data: " . mysqli_error($conn);
    }
} else {
    // Redirect to dashboard if form data is not submitted
    header("Location: index.php");
    exit();
}
?>
