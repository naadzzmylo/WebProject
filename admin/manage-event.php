<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
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

// Display success messages
if (isset($_SESSION['success_message'])) {
    echo "<div class='success-message'>" . htmlspecialchars($_SESSION['success_message']) . "</div>";
    unset($_SESSION['success_message']);
}

// Handle delete request
if (isset($_GET['delete_id']) && is_numeric($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    
    // Prepare the delete statement
    $stmt = $conn->prepare("DELETE FROM events WHERE event_id = ?");
    $stmt->bind_param("i", $delete_id);

    if ($stmt->execute()) {
        echo "<script>alert('Event deleted successfully'); window.location.href='manage-event.php';</script>";
    } else {
        echo "<script>alert('Error deleting event: " . $conn->error . "');</script>";
    }
    $stmt->close();
}

// Fetch all events
$sql = "SELECT * FROM events ORDER BY event_date DESC";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Events - Admin Panel</title>
    <link rel="stylesheet" href="../admin/css/index.css">
    <script>
        function deleteEvent(eventId) {
            const confirmDelete = confirm("Are you sure you want to delete this event?");
            if (confirmDelete) {
                window.location.href = "manage-event.php?delete_id=" + eventId;
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
    <!-- Topbar -->
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
        <h1>Manage Events</h1>
        <div class="add-event-container">
            <a href="add-event.php" class="add-event-button">Add New Event</a>
        </div>
        <table class="events-table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Event Name</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Location</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    $no = 1;
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr id='event-row-" . htmlspecialchars($row['event_id']) . "'>
                                <td>" . htmlspecialchars($no) . "</td>
                                <td>" . htmlspecialchars($row['event_name']) . "</td>
                                <td>" . htmlspecialchars($row['event_date']) . "</td>
                                <td>" . htmlspecialchars($row['event_time']) . "</td>
                                <td>" . htmlspecialchars($row['event_location']) . "</td>
                                <td>" . htmlspecialchars($row['price']) . "</td>
                                <td>" . htmlspecialchars($row['status']) . "</td>
                                <td>
                                    <a href='edit-event.php?event_id=" . htmlspecialchars($row['event_id']) . "' class='edit-button'>Edit</a> 
                                    <a href='javascript:void(0);' class='delete-button' onclick='deleteEvent(" . htmlspecialchars($row['event_id']) . ")'>Delete</a>
                                </td>
                            </tr>";
                        $no++;
                    }
                } else {
                    echo "<tr><td colspan='8'>No events found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
