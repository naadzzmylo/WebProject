<?php
// Start the session to access session variables
session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    echo "User ID: " . $user_id;
} else {
    echo "User is not logged in.";
}

// Replace these with your actual database credentials
$servername = "localhost";
$username = "root";  // your database username
$password = "";      // your database password
$dbname = "jomrun"; // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$error_message = "";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Running Event System</title>
    <style>
        /* Body and container setup */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
            display: flex;
            flex-direction: column;
            height: 100vh;
            /* Full height */
        }

        .content {
            flex-grow: 1;
            /* Takes up remaining space */
        }

        header {
            background-color: white;
            color: #333;
            padding: 20px 0;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            border-bottom: 1px solid #e1e1e1;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        header img {
            height: 60px;
            margin-right: 15px;
        }

        h1 {
            font-size: 30px;
            color: #333;
            font-weight: 700;
            margin: 0;
        }

        nav {
            background-color: #F77606;
            /* Orange color */
            padding: 10px 0;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
            /* Subtle shadow for depth */
            display: flex;
            justify-content: center;
            /* Center the navigation bar content */
        }

        nav a {
            color: white;
            text-decoration: none;
            padding: 12px 25px;
            margin: 0 10px;
            display: inline-block;
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
            background-color: #FFA726;
            /* Light orange background for buttons */
            border-radius: 25px;
            /* Rounded buttons */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            /* Button shadow */
            transition: all 0.3s ease;
            /* Smooth transitions */
        }

        nav a:hover {
            background-color: #FF8C00;
            /* Slightly darker orange on hover */
            color: white;
            transform: translateY(-2px);
            /* Lift effect */
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
            /* Stronger shadow on hover */
        }

        nav a:active {
            transform: translateY(0);
            /* Return to original position */
            box-shadow: 0 3px 5px rgba(0, 0, 0, 0.15);
            /* Reduced shadow */
        }

        @media (max-width: 768px) {
            nav {
                flex-wrap: wrap;
                /* Allow wrapping for smaller screens */
            }

            nav a {
                padding: 10px 15px;
                margin: 5px;
                font-size: 14px;
            }
        }
    </style>
</head>

<body>

    <header>
        <img src="https://www.jomrun.com/images/jomrunlogo.svg" alt="JomRun Logo">
    </header>

    <nav>
        <a href="index.php">Home</a>
        <a href="events.php">Events</a>
        <?php if (isset($_SESSION['user_id'])) : ?>
            <a href="profile.php">Profile</a>
            <a href="logout.php">Logout</a>
        <?php else : ?>
            <a href="login.php">Login</a>
        <?php endif; ?>
    </nav>

</body>

</html>