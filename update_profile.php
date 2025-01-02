<?php
include('db.php');
session_start();

$user_id = $_SESSION['user_id']; // Get logged-in user's ID

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];


    // Update profile in database
    $sql = "UPDATE users SET fullname = ?, email = ?, phone_number = ?, address = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $name, $email, $phone_number, $address, $user_id);

    if ($stmt->execute()) {
        echo "Profile updated successfully.";
        header("Location: profile.php"); // Redirect to profile page
    } else {
        echo "Error updating profile: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
