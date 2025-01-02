<?php
// Start session and check admin login
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit();
}

// Database connection
$servername = "localhost"; // Update with your server
$username = "root"; // Update with your database username
$password = ""; // Update with your database password
$database = "jomrun"; // Update with your database name

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $event_name = $_POST['event_name'];
    $event_date = $_POST['event_date'];
    $event_time = $_POST['event_time'];  // Get event time from the form
    $event_location = $_POST['event_location'];
    $price = $_POST['price'];
    $status = $_POST['status'];

    // Handle cover image upload
    $cover_image_path = null;
    if (isset($_FILES['cover_image']) && $_FILES['cover_image']['error'] === UPLOAD_ERR_OK) {
        $cover_image_path = $_SERVER['DOCUMENT_ROOT'] . '/uploads/' . basename($_FILES['cover_image']['name']);
        move_uploaded_file($_FILES['cover_image']['tmp_name'], $cover_image_path);
    }

    // Handle detail images upload
    $detail_images = [];
    if (isset($_FILES['detail_images'])) {
        foreach ($_FILES['detail_images']['tmp_name'] as $key => $tmp_name) {
            if ($_FILES['detail_images']['error'][$key] === UPLOAD_ERR_OK) {
                $detail_image_path = $_SERVER['DOCUMENT_ROOT'] . '/uploads/' . basename($_FILES['detail_images']['name'][$key]);
                move_uploaded_file($tmp_name, $detail_image_path);
                $detail_images[] = $detail_image_path;
            }
        }
    }

    // Store data to table
    $stmt = $conn->prepare("INSERT INTO events (event_name, event_date, event_time, event_location, price, status, cover_image, detail_images_1, detail_images_2, detail_images_3) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssss", $event_name, $event_date, $event_time, $event_location, $price, $status, $cover_image_path, $detail_images[0], $detail_images[1], $detail_images[2]);
    $stmt->execute();
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Event - Admin Panel</title>
    <link rel="stylesheet" href="../admin/css/index.css"> <!-- Link to the external CSS file -->
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
        <h1>Add New Event</h1>

        <form method="POST" enctype="multipart/form-data" class="add-event-form">
            <div class="form-left">
                <div class="form-group">
                    <label for="event_name">Event Name:</label>
                    <input type="text" id="event_name" name="event_name" required>
                </div>
                <div class="form-group">
                    <label for="event_date">Event Date:</label>
                    <input type="date" id="event_date" name="event_date" required>
                </div>
                <div class="form-group">
                    <label for="event_time">Event Time:</label>
                    <input type="time" id="event_time" name="event_time" required>
                </div>
                <div class="form-group">
                    <label for="event_location">Event Location:</label>
                    <input type="text" id="event_location" name="event_location" required>
                </div>
                <div class="form-group">
                    <label for="price">Event Price:</label>
                    <input type="text" id="price" name="price" required>
                </div>
                <div class="form-group">
                    <label for="status">Event Status:</label>
                    <select id="status" name="status" required>
                        <option value="coming">Coming</option>
                        <option value="past">Past</option>
                    </select>
                </div>

                <!-- Submit Button -->
                <div class="form-submit">
                    <button type="submit" class="submit-button">Add Event</button>
                </div>
            </div>

            <div class="form-right">
                <div class="form-group">
                    <label for="cover_image">Cover Image:</label>
                    <input type="file" id="cover_image" name="cover_image" accept="image/*" required>
                </div>
                <div class="form-group">
                    <label for="detail_images">Detail Images 1:</label>
                    <input type="file" id="detail_images1" name="detail_images[]" accept="image/*">
                </div>
                <div class="form-group">
                    <label for="detail_images">Detail Images 2:</label>
                    <input type="file" id="detail_images2" name="detail_images[]" accept="image/*">
                </div>
                <div class="form-group">
                    <label for="detail_images">Detail Images 3:</label>
                    <input type="file" id="detail_images3" name="detail_images[]" accept="image/*">
                </div>
            </div>
        </form>

    </div>

    <script src="script.js"></script> <!-- Link to the external JavaScript file -->
</body>

</html>