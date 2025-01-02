<?php
include('header.php');


// Form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form input values
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];  // Updated to match the new field name
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];

    // Sanitize inputs to prevent SQL injection
    $username = $conn->real_escape_string($username);
    $fullname = $conn->real_escape_string($fullname);
    $email = $conn->real_escape_string($email);
    $phone_number = $conn->real_escape_string($phone_number);  // Updated to match the new field name
    $password = $conn->real_escape_string($password);
    $confirm_password = $conn->real_escape_string($confirm_password);

    // Check if passwords match
    if ($password !== $confirm_password) {
        $error_message = "Passwords do not match.";
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert the data into the database
        $sql = "INSERT INTO users (username, fullname, email, phone_number, password) VALUES ('$username', '$fullname', '$email', '$phone_number', '$hashed_password')";

        if ($conn->query($sql) === TRUE) {
            // Registration successful, redirect to the login page
            header("Location: login.php"); // Redirect to login page instead of profile
            exit();
        } else {
            $error_message = "Error: " . $conn->error;
        }
    }
}

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
</head>
<body>
    <div class="container">
        <div class="signup-form">
            <h2>Sign Up</h2>
            <?php if (!empty($error_message)) : ?>
                <p class="error-message"><?= htmlspecialchars($error_message) ?></p>
            <?php endif; ?>
            <form action="signup.php" method="post">
                <label for="username">Username:</label>
                <input type="text" name="username" placeholder="Enter your username" required>

                <label for="fullname">Full Name:</label>
                <input type="text" name="fullname" placeholder="Enter your full name" required>

                <label for="email">Email:</label>
                <input type="email" name="email" placeholder="Enter your email" required>

                <label for="phone_number">Phone Number:</label>
                <input type="text" name="phone_number" placeholder="Enter your phone number" required>

                <label for="password">Password:</label>
                <input type="password" name="password" placeholder="Enter your password" required>

                <label for="confirm-password">Confirm Password:</label>
                <input type="password" name="confirm-password" placeholder="Confirm your password" required>

                <input type="submit" value="Sign Up" class="submit-button">
            </form>

            <p>Already have an account? <a href="login.php">Log in here</a></p>
        </div>
    </div>

    <!-- CSS at the bottom -->
    <style>
        /* Ensure the body and HTML take full height */
        html, body {
            height: 100%;
            margin: 0;
        }

        /* Container for the signup form with background image */
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Take full height of the screen */
            width: 100%;
            position: relative;
            background-image: url('https://www.jomrun.com/images/mainslider/ken-11.jpg'); /* Background image */
            background-size: cover;
            background-position: center;
        }

        /* Signup Form Styling */
        .signup-form {
            background: white; /* Solid white background for the form */
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            padding: 30px;  /* Reduced padding */
            width: 100%;
            max-width: 500px; /* Reduced max-width */
            margin: auto;
        }

        .signup-form h2 {
            color: black; /* Changed the color to black */
            padding: 20px;
            text-align: center;
            border-radius: 12px 12px 0 0;
            margin: -25px -25px 20px -25px; /* Reduced margin */
            font-size: 28px;  /* Reduced font size */
        }

        .signup-form label {
            font-size: 16px;  /* Reduced font size */
            font-weight: bold;
            margin-bottom: 12px; /* Reduced margin */
            display: block;
            color: #555;
        }

        .signup-form input[type="text"],
        .signup-form input[type="email"],
        .signup-form input[type="password"] {
            width: 100%;
            padding: 12px; /* Reduced padding */
            margin-bottom: 15px; /* Reduced margin */
            border: 1px solid #ddd;
            border-radius: 10px;
            font-size: 16px; /* Reduced font size */
            box-sizing: border-box;
        }

        .signup-form input[type="submit"] {
            background-color: #F39C12;
            color: white;
            border: none;
            font-size: 18px; /* Reduced font size */
            cursor: pointer;
            padding: 15px; /* Reduced padding */
            border-radius: 30px;
            transition: background-color 0.3s ease;
            width: 100%;
            text-align: center;
        }

        .signup-form input[type="submit"]:hover {
            background-color: #E67E22;
        }

        .signup-form p {
            text-align: center;
            margin-top: 20px; /* Reduced margin */
            font-size: 16px; /* Reduced font size */
            color: #555;
        }

        .signup-form a {
            color: #FF6F00;
            text-decoration: none;
        }

        .signup-form a:hover {
            text-decoration: underline;
        }
    </style>
</body>
</html>
