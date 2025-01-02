<?php
// login.php
session_start();

if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] == true) {
    header("Location: index.php"); // Redirect to dashboard if already logged in
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Admin credentials (you can store these securely in a database)
    $admin_username = 'admin';
    $admin_password = 'password123'; // Change this to a more secure password

    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $admin_username && $password === $admin_password) {
        $_SESSION['admin_logged_in'] = true;
        header("Location: index.php"); // Redirect to dashboard on successful login
        exit();
    } else {
        $error_message = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin Panel</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../admin/css/index.css"> <!-- Link to your login page CSS -->
</head>
<body>
    <!-- Login Container -->
    <div class="login-container">
        <div class="login-box">
            <h2>Admin Login</h2>
            <!-- Login Form -->
            <form action="login-process.php" method="POST">
                <div class="input-container">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required placeholder="Enter your username">
                </div>
                <div class="input-container">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required placeholder="Enter your password">
                </div>
                <div class="remember-me">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Remember me</label>
                </div>
                <button type="submit" class="login-btn">Login</button>
            </form>
            <div class="footer">
                <p>© 2024 Event Management. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</body>
</html>
