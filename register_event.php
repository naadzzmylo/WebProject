<?php include('header.php'); ?>

<!-- Registration Form -->
<div class="register-form">
    <h2>Register for the Event</h2>
    <form action="submit_registration.php" method="POST">
        <label for="name">Full Name:</label>
        <input type="text" id="name" name="name" placeholder="Enter your full name" required>

        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" placeholder="Enter your email address" required>

        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>
        
        <!-- Address Section -->
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" placeholder="Enter your address" required>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
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

    /* Make the form at the top */
    .register-form {
        background-color: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        width: 100%;
        max-width: 800px; /* Increased form width */
        margin: 20px auto; /* Adjusted margin to move the form closer to the top */
    }

    .register-form h2 {
        font-size: 24px;
        margin-bottom: 15px;
        text-align: center;
    }

    .register-form label {
        display: block;
        margin: 10px 0 5px;
        font-weight: bold;
        color: #333;
    }

    .register-form input, .register-form select {
        width: 100%;
        padding: 10px;
        font-size: 14px;
        margin-bottom: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .submit-button {
        width: 100%;
        padding: 12px;
        font-size: 16px;
        background-color: #e67e22;
        color: white;
        border: none;
        border-radius: 25px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .submit-button:hover {
        background-color: #e67e22;
    }

    footer {
        text-align: center;
        padding: 30px;
        background-color: #e67e22;
        color: white;
        font-size: 16px;
        margin-top: 70px;
        border-top: 2px solid #ddd;
    }

    /* To ensure the footer stays at the bottom when content is short */
    footer {
        position: absolute;
        bottom: 0;
        width: 100%;
    }
</style>
