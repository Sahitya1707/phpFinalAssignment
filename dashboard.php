<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // If not logged in, redirect to the login page
    header("Location: login.php");
    exit();
}

// If logged in, display the dashboard content
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./css/dashboard.css">
</head>
<body>
    <div class="container">
        <h2>Dashboard</h2>
        <form action="add_data.php" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="phone" placeholder="Phone" required>
            <button type="submit" class="btn">Add Data</button>
        </form>
        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Display data from the database here -->
                <?php
                // Include your database connection file
                include 'connection.php';

                // Fetch data from the users table
                $sql = "SELECT * FROM user";
                $result = mysqli_query($conn, $sql);

                // Check if there are any records
                if (mysqli_num_rows($result) > 0) {
                    // Output data of each row
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['username'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['phone'] . "</td>";
                        echo "<td>";
                        echo "<form action='edit_data.php' method='post' style='display: inline;'>";
                        echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                        echo "<button type='submit' class='btn' name='edit'>Edit</button>";
                        echo "</form>";
                        echo "<form action='delete_data.php' method='post' style='display: inline;'>";
                        echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                        echo "<button type='submit' class='btn' name='delete'>Delete</button>";
                        echo "</form>";
                     
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No data available</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
        <form action="logout.php" method="post" class="logout">
            <button type="submit" class="btn">Logout</button>
        </form>

    <script>
  // Prevent navigating back to the login page using the browser's back button
        history.pushState(null, null, location.href);
        window.onpopstate = function () {
            history.go(1);
        };

        // Attempt to forward if the user tries to navigate back
        window.history.forward(1);
</script>
</body>
</html>
