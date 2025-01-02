<?php
include('header.php');
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$event_id = isset($_GET['event_id']) ? intval($_GET['event_id']) : null; // Sanitize input

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jomrun";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Fetch user data
$user_sql = "SELECT * FROM users WHERE id = ?";
$user_stmt = $conn->prepare($user_sql);
$user_stmt->bind_param("i", $user_id);
$user_stmt->execute();
$user_result = $user_stmt->get_result();

if ($user_result->num_rows > 0) {
    $user = $user_result->fetch_assoc();
    $fullname = $user['fullname'];
    $email = $user['email'];
    $phone_number = $user['phone_number'];
    $address = $user['address'];
    $gender = $user['gender'];
} else {
    echo "No user data found.";
    $fullname = $email = $phone_number = $address = $gender = "";
}

// Fetch event data
$event_name = "Event"; // Default event name
if ($event_id) {
    $event_sql = "SELECT event_name FROM events WHERE id = ?";
    $event_stmt = $conn->prepare($event_sql);
    $event_stmt->bind_param("i", $event_id);
    $event_stmt->execute();
    $event_result = $event_stmt->get_result();

    if ($event_result->num_rows > 0) {
        $event = $event_result->fetch_assoc();
        $event_name = $event['event_name']; // Access the correct column name
    } else {
        $event_name = "Unknown Event"; // If no matching event is found
    }
} else {
    $event_name = "No Event Specified"; // If event_id is missing
}


$conn->close();
?>


<!-- Registration Form -->
<div class="register-form">
    <h2>Register for <?= htmlspecialchars($event_name) ?></h2>
    <form action="submit_registration.php" method="POST">
        <input type="hidden" name="event_id" value="<?= htmlspecialchars($event_id) ?>">
        
        <label for="name">Full Name:</label>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars($fullname) ?>" placeholder="Enter your full name" required>

        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($email) ?>" placeholder="Enter your email address" required>

        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="phone" value="<?= htmlspecialchars($phone_number) ?>" placeholder="Enter your phone number" required>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" value="<?= htmlspecialchars($address) ?>" placeholder="Enter your address" required>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="male" <?= $gender === 'male' ? 'selected' : '' ?>>Male</option>
            <option value="female" <?= $gender === 'female' ? 'selected' : '' ?>>Female</option>
            <option value="other" <?= $gender === 'other' ? 'selected' : '' ?>>Other</option>
        </select>

        <button type="submit" class="submit-button">Submit Registration</button>
    </form>
</div>

<footer>
    <p>&copy; 2024 Running Event System. All rights reserved.</p>
</footer>

<!-- Additional Styles -->
<style>
    /* Ensure the body and HTML take full height */
    html, body {
        height: 100%;
        margin: 0;
        font-family: Arial, sans-serif;
    }

    /* Adjust form size */
    .register-form {
        background-color: #fff;
        padding: 20px; /* Reduced padding */
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Lighter shadow */
        width: 100%;
        max-width: 650px; /* Slightly increased width */
        margin: 15px auto; /* Slightly increased margin */
    }

    .register-form h2 {
        font-size: 20px; /* Reduced font size */
        margin-bottom: 10px;
        text-align: center;
    }

    .register-form label {
        display: block;
        margin: 8px 0 4px; /* Reduced spacing */
        font-weight: bold;
        font-size: 14px; /* Reduced font size */
        color: #333;
    }

    .register-form input, .register-form select {
        width: 100%;
        padding: 8px; /* Reduced padding */
        font-size: 14px;
        margin-bottom: 15px; /* Less margin */
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .submit-button {
        width: 100%;
        padding: 10px; /* Reduced padding */
        font-size: 14px; /* Reduced font size */
        background-color: #e67e22;
        color: white;
        border: none;
        border-radius: 20px; /* Slightly less rounded */
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .submit-button:hover {
        background-color: #d9731f;
    }

    /* Adjust footer size */
    footer {
        text-align: center;
        padding: 15px; /* Reduced padding */
        background-color: #e67e22;
        color: white;
        font-size: 14px; /* Reduced font size */
        margin-top: 50px; /* Less margin */
        border-top: 1px solid #ddd;
    }

    /* Ensure footer sticks to the bottom when content is short */
    footer {
        position: absolute;
        bottom: 0;
        width: 100%;
    }
</style>


