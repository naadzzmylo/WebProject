<?php
// Start session and check if admin is logged in
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

// Check database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch event data if event_id is set
if (isset($_GET['event_id'])) {
    $event_id = intval($_GET['event_id']); // Ensure event_id is an integer
    $stmt = $conn->prepare("SELECT * FROM events WHERE event_id = ?");
    $stmt->bind_param("i", $event_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $event = $result->fetch_assoc();
    } else {
        die("Event not found");
    }
    $stmt->close();
} else {
    die("No event ID provided");
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $event_name = $conn->real_escape_string($_POST['event_name']);
    $event_date = $conn->real_escape_string($_POST['event_date']);
    $event_time = $conn->real_escape_string($_POST['event_time']); // Added event_time
    $event_location = $conn->real_escape_string($_POST['event_location']);
    $event_price = floatval($_POST['event_price']);
    $event_status = $conn->real_escape_string($_POST['event_status']);

    // Handle file uploads
    $upload_dir = "/uploads/"; // Ensure this directory is writable
    $cover_image_path = $event['cover_image']; // Default to current image
    $detail_images = [
        $event['detail_images_1'] ?? "",
        $event['detail_images_2'] ?? "",
        $event['detail_images_3'] ?? ""
    ];

    if (isset($_FILES['cover_image']) && $_FILES['cover_image']['error'] == UPLOAD_ERR_OK) {
        $cover_image_path = $upload_dir . basename($_FILES['cover_image']['name']);
        move_uploaded_file($_FILES['cover_image']['tmp_name'], $cover_image_path);
    }

    foreach ($_FILES['detail_images']['tmp_name'] as $key => $tmp_name) {
        if ($_FILES['detail_images']['error'][$key] == UPLOAD_ERR_OK) {
            $detail_images[$key] = $upload_dir . basename($_FILES['detail_images']['name'][$key]);
            move_uploaded_file($tmp_name, $detail_images[$key]);
        }
    }

    // Update the event in the database
    $stmt = $conn->prepare("UPDATE events 
                        SET event_name = ?, 
                            event_date = ?, 
                            event_time = ?, 
                            event_location = ?, 
                            price = ?, 
                            event_status = ?, 
                            cover_image = ?, 
                            detail_images_1 = ?, 
                            detail_images_2 = ?, 
                            detail_images_3 = ? 
                        WHERE event_id = ?");
$stmt->bind_param(
    "ssssssssss", // Use "d" for the float type (price)
    $event_name,
    $event_date,
    $event_time,
    $event_location,
    $event_price,  // This will be a float (use "d")
    $event_status,
    $cover_image_path,
    $detail_images[0],
    $detail_images[1],
    $detail_images[2],
    $event_id
);


    if ($stmt->execute()) {
        $_SESSION['success_message'] = "Event updated successfully!";
        header("Location: manage-event.php"); // Redirect to manage page
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event - Admin Panel</title>
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
        <h1>Edit Event</h1>
        <form method="POST" enctype="multipart/form-data" class="add-event-form">
            <div class="form-left">
                <div class="form-group">
                    <label for="event_name">Event Name:</label>
                    <input type="text" id="event_name" name="event_name" value="<?php echo htmlspecialchars($event['event_name']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="event_date">Event Date:</label>
                    <input type="date" id="event_date" name="event_date" value="<?php echo htmlspecialchars($event['event_date']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="event_time">Event Time:</label>
                    <input type="time" id="event_time" name="event_time" value="<?php echo htmlspecialchars($event['event_time']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="event_location">Event Location:</label>
                    <input type="text" id="event_location" name="event_location" value="<?php echo htmlspecialchars($event['event_location']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="event_price">Event Price:</label>
                    <input type="text" id="event_price" name="event_price" value="<?php echo htmlspecialchars($event['price']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="event_status">Event Status:</label>
                    <select id="event_status" name="event_status" required>
                        <option value="coming" <?php echo $event['event_status'] == 'coming' ? 'selected' : ''; ?>>Coming</option>
                        <option value="past" <?php echo $event['event_status'] == 'past' ? 'selected' : ''; ?>>Past</option>
                    </select>
                </div>
            </div>
            <div class="form-right">
                <div class="form-group">
                    <label for="cover_image">Cover Image:</label>
                    <input type="file" id="cover_image" name="cover_image" accept="image/*">
                    <p>Current Image: <img src="<?php echo htmlspecialchars($event['cover_image']); ?>" alt="Cover Image" width="100"></p>
                </div>
                <div class="form-group">
                    <label for="detail_images">Detail Image 1:</label>
                    <input type="file" id="detail_images1" name="detail_images[]" accept="image/*">
                    <p>Current Image: <img src="<?php echo htmlspecialchars($event['detail_images_1']); ?>" alt="Detail Image 1" width="100"></p>
                </div>
                <div class="form-group">
                    <label for="detail_images">Detail Image 2:</label>
                    <input type="file" id="detail_images2" name="detail_images[]" accept="image/*">
                    <p>Current Image: <img src="<?php echo htmlspecialchars($event['detail_images_2']); ?>" alt="Detail Image 2" width="100"></p>
                </div>
                <div class="form-group">
                    <label for="detail_images">Detail Image 3:</label>
                    <input type="file" id="detail_images3" name="detail_images[]" accept="image/*">
                    <p>Current Image: <img src="<?php echo htmlspecialchars($event['detail_images_3']); ?>" alt="Detail Image 3" width="100"></p>
                </div>
            </div>
            <div class="form-submit">
                <button type="submit" class="submit-button">Update Event</button>
            </div>
        </form>
    </div>
</body>
</html>
