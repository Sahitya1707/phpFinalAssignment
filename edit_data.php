
<?php
// Include your database connection file
include 'connection.php';

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit'])) {
    // Retrieve ID of the record to be edited
    $id = $_POST['id'];

    // Fetch data of the record to be edited
    $sql = "SELECT * FROM user WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    // Check if record exists
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $username = $row['username'];
        $email = $row['email'];
        $phone = $row['phone'];
    } else {
        // Record not found, handle error
        echo "Record not found!";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link rel="stylesheet" href="./css/dashboard.css">
</head>
<body>
    <div class="container">
        <h2>Edit Data</h2>
        <form action="update_data.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="text" name="username" value="<?php echo $username; ?>" placeholder="Username" required>
            <input type="email" name="email" value="<?php echo $email; ?>" placeholder="Email" required>
            <input type="text" name="phone" value="<?php echo $phone; ?>" placeholder="Phone" required>
            <button type="submit" class="btn" name="update">Update</button>
        </form>
           <form action="logout.php" method="post" class="logout">
            <button type="submit" class="btn">Logout</button>
        </form>
    </div>
</body>
</html>
