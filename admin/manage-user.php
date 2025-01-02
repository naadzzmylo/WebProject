<?php
// Start session and verify admin login
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit();
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jomrun";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all users
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage User - Admin Panel</title>
    <link rel="stylesheet" href="../admin/css/index.css"> <!-- Link to your existing CSS -->
    <script>
        // Function to handle the delete action
        function deleteUser(userId) {
            const confirmDelete = confirm("Are you sure you want to delete this user?");
            if (confirmDelete) {
                window.location.href = `delete-user.php?id=${userId}`; // Redirect to delete script
            }
        }
    </script>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <h2>Admin Panel</h2>
        </div>
        <ul class="sidebar-menu">
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="manage-event.php">Manage Event</a></li>
            <li><a href="manage-user.php">Manage User</a></li>
        </ul>
    </div>

    <!-- Top Bar -->
    <div class="topbar">
        <div class="topbar-logo">
            <img src="https://www.jomrun.com/images/jomrunlogo.svg" alt="Logo" class="logo">
        </div>
        <div class="topbar-right">
            <a href="logout.php" class="logout-button">Logout</a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="content">
        <h1>Manage Users</h1>

        <!-- Users Table -->
        <table class="events-table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Username</th>
                    <th>Name</th>
				    <th>Gender</th> <!-- Added Gender -->
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php $count = 1; ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr id="user-row-<?= $row['id'] ?>">
                            <td><?= $count++ ?></td>
                            <td><?= htmlspecialchars($row['username']) ?></td>
                            <td><?= htmlspecialchars($row['fullname']) ?></td>
							<td><?= htmlspecialchars($row['gender']) ?></td> <!-- Display Gender -->
                            <td><?= htmlspecialchars($row['email']) ?></td>
                            <td><?= htmlspecialchars($row['phone_number']) ?></td>
                            <td><?= htmlspecialchars($row['address']) ?></td>
                            
                            <td>
                                <a href="javascript:void(0)" class="delete-button" onclick="deleteUser(<?= $row['id'] ?>)">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8">No users found.</td> <!-- Updated colspan -->
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</body>
</html>

<?php
$conn->close();
?>
