<?php
include('header.php'); 

$success_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the OTP from the form
    $otp = $_POST['otp'];

    if (isset($_SESSION['otp_user_id'])) {
        $user_id = $_SESSION['otp_user_id'];

        // Query to fetch OTP and expiration
        $sql = "SELECT otp, otp_expiration FROM users WHERE id = $user_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Check if OTP matches and is not expired
            if ($otp == $row['otp'] && strtotime($row['otp_expiration']) > time()) {
                // OTP is correct and not expired
                $success_message = "Login successful!";
                unset($_SESSION['otp_user_id']);

                // Optionally clear OTP and expiration
                $clear_otp_sql = "UPDATE users SET otp=NULL, otp_expiration=NULL WHERE id = $user_id";
                $conn->query($clear_otp_sql);

                // Redirect to the dashboard or homepage
                header("Location: index.php");
                exit();
            } else {
                $error_message = "Invalid or expired OTP. Please try again.";
            }
        } else {
            $error_message = "Invalid user session.";
        }
    } else {
        $error_message = "Session expired. Please log in again.";
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
    <title>Verify OTP</title>
</head>
<body>
    <div class="container">
        <div class="otp-form">
            <h2>Verify OTP</h2>
            <?php if (!empty($error_message)) : ?>
                <p class="error-message"><?= htmlspecialchars($error_message) ?></p>
            <?php endif; ?>
            <?php if (!empty($success_message)) : ?>
                <p class="success-message"><?= htmlspecialchars($success_message) ?></p>
            <?php endif; ?>
            <form action="" method="post">
                <label for="otp">Enter OTP:</label>
                <input type="number" name="otp" placeholder="Enter the OTP sent to your email" required>
                <input type="submit" value="Verify OTP" class="submit-button">
            </form>
        </div>
    </div>
</body>
</html>

<!-- Add your CSS styling for the OTP form -->
<style>
    /* Style similar to the login form */
    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background: #f7f7f7;
    }

    .otp-form {
        background: white;
        border-radius: 12px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        padding: 40px;
        width: 100%;
        max-width: 400px;
        text-align: center;
    }

    .otp-form h2 {
        margin-bottom: 20px;
    }

    .otp-form label {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 10px;
        display: block;
    }

    .otp-form input[type="number"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 16px;
    }

    .otp-form input[type="submit"] {
        background-color: #F39C12;
        color: white;
        border: none;
        padding: 10px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    .otp-form input[type="submit"]:hover {
        background-color: #E67E22;
    }

    .error-message {
        color: red;
        margin-bottom: 15px;
    }

    .success-message {
        color: green;
        margin-bottom: 15px;
    }
</style>
</body>
</html>
