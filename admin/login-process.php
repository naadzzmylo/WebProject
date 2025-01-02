<?php
// login-process.php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Dummy admin credentials (replace this with database check in a real-world app)
    $adminUsername = 'admin';
    $adminPassword = 'password123';

    // Get the form input
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if username and password match the dummy credentials
    if ($username === $adminUsername && $password === $adminPassword) {
        $_SESSION['admin_logged_in'] = true;
        header('Location: index.php'); // Redirect to the dashboard
        exit();
    } else {
        // Invalid credentials, redirect back to login
        header('Location: login.php?error=invalid');
        exit();
    }
}
?>
