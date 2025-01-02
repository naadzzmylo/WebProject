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

// Fetch total counts
$totalEventsQuery = "SELECT COUNT(*) AS total FROM events";
$totalUsersQuery = "SELECT COUNT(*) AS total FROM users";
$comingEventsQuery = "SELECT * FROM events WHERE event_date >= CURDATE() ORDER BY event_date ASC";
$pastEventsQuery = "SELECT * FROM events WHERE event_date < CURDATE() ORDER BY event_date DESC";

$totalEventsResult = $conn->query($totalEventsQuery);
$totalUsersResult = $conn->query($totalUsersQuery);
$comingEventsResult = $conn->query($comingEventsQuery);
$pastEventsResult = $conn->query($pastEventsQuery);

$totalEvents = $totalEventsResult->fetch_assoc()['total'] ?? 0;
$totalUsers = $totalUsersResult->fetch_assoc()['total'] ?? 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Event Management</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../admin/css/index.css">
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
        <h1>Welcome to the Admin Panel</h1>
        <p>Manage your events and users here. Enjoy the power of event management!</p>
        
        <!-- Dashboard Boxes -->
        <div class="dashboard-boxes">
            <div class="dashboard-box">
                <i class="fas fa-calendar-alt box-icon"></i>
                <div class="box-content">
                    <h2>Total Event</h2>
                    <p><?= $totalEvents ?></p>
                </div>
            </div>
            <div class="dashboard-box">
                <i class="fas fa-users box-icon"></i>
                <div class="box-content">
                    <h2>Total User</h2>
                    <p><?= $totalUsers ?></p>
                </div>
            </div>
            <div class="dashboard-box">
                <i class="fas fa-clock box-icon"></i>
                <div class="box-content">
                    <h2>Coming Event</h2>
                    <p><?= $comingEventsResult->num_rows ?></p>
                </div>
            </div>
            <div class="dashboard-box">
                <i class="fas fa-history box-icon"></i>
                <div class="box-content">
                    <h2>Past Event</h2>
                    <p><?= $pastEventsResult->num_rows ?></p>
                </div>
            </div>
        </div>

        <!-- Event Tables -->
        <div class="event-tables">
            <!-- Container for Coming Events -->
            <div class="table-container coming-events">
                <h2>Coming Events</h2>
                <table class="events-table">
                    <thead>
                        <tr>
                            <th>Event Name</th>
                            <th>Date</th>
                            <th>Location</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($comingEventsResult->num_rows > 0): ?>
                            <?php while ($row = $comingEventsResult->fetch_assoc()): ?>
                                <tr>
                                    <td><?= htmlspecialchars($row['event_name']) ?></td>
                                    <td><?= htmlspecialchars($row['event_date']) ?></td>
                                    <td><?= htmlspecialchars($row['event_location']) ?></td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="3">No upcoming events.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <!-- Container for Past Events -->
            <div class="table-container past-events">
                <h2>Past Events</h2>
                <table class="events-table">
                    <thead>
                        <tr>
                            <th>Event Name</th>
                            <th>Date</th>
                            <th>Location</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($pastEventsResult->num_rows > 0): ?>
                            <?php while ($row = $pastEventsResult->fetch_assoc()): ?>
                                <tr>
                                    <td><?= htmlspecialchars($row['event_name']) ?></td>
                                    <td><?= htmlspecialchars($row['event_date']) ?></td>
                                    <td><?= htmlspecialchars($row['location']) ?></td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="3">No past events.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>

<?php
$conn->close();
?>
