<?php include('header.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <div class="container">
        <div class="login-form">
            <h2>Login</h2>
            <form action="profile.php" method="post">
                <label for="email">Email:</label>
                <input type="email" name="email" placeholder="Enter your email" required>

                <label for="password">Password:</label>
                <input type="password" name="password" placeholder="Enter your password" required>

                <input type="submit" value="Login" class="submit-button">
            </form>

            <p>Don't have an account? <a href="signup.php">Sign up here</a></p>
        </div>
    </div>

 

    <!-- CSS at the bottom -->
    <style>
        /* Ensure the body and HTML take full height */
        html, body {
            height: 100%;
            margin: 0;
        }

        /* Container for the login form with background image */
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

        /* Login Form Styling */
        .login-form {
            background: white; /* Solid white background for the form */
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            padding: 40px;
            width: 100%;
            max-width: 600px;
            margin: auto;
        }

        .login-form h2 {
   
            color: black; /* Changed the color to black */
            padding: 25px;
            text-align: center;
            border-radius: 12px 12px 0 0;
            margin: -35px -35px 25px -35px;
            font-size: 32px;
        }

        .login-form label {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 15px;
            display: block;
            color: #555;
        }

        .login-form input[type="email"],
        .login-form input[type="password"] {
            width: 100%;
            padding: 20px;
            margin-bottom: 25px;
            border: 1px solid #ddd;
            border-radius: 10px;
            font-size: 20px;
            box-sizing: border-box;
        }

        .login-form input[type="submit"] {
            background-color: #F39C12;
            color: white;
            border: none;
            font-size: 20px;
            cursor: pointer;
            padding: 20px;
            border-radius: 30px;
            transition: background-color 0.3s ease;
            width: 100%;
            text-align: center;
        }

        .login-form input[type="submit"]:hover {
            background-color: #E67E22;
        }

        .login-form p {
            text-align: center;
            margin-top: 25px;
            font-size: 18px;
            color: #555;
        }

        .login-form a {
            color: #F39C12;
            text-decoration: none;
        }

        .login-form a:hover {
            text-decoration: underline;
        }

      
    </style>
</body>
</html>