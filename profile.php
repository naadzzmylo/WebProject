<?php
include('header.php');

$user_id = $_SESSION['user_id']; // Assuming user_id is stored in session


// Fetch user data from the database
$sql = "SELECT * FROM users WHERE id = '$user_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $fullname = $user['fullname'];
    $username = $user['username']; // Fetch the username
    $email = $user['email'];
    $phone_number = $user['phone_number'];
    $address = $user['address'];
    $gender = $user['gender']; // Fetch gender
} else {
    echo "No user found.";
}

$conn->close();
?>

<div class="container">
    <div class="profile-page">
        <!-- Left: Profile Information -->
        <div class="profile-left">
            <div class="profile-image">
                <img src="https://cdn3.iconfinder.com/data/icons/vector-icons-6/96/256-512.png" alt="Profile Image" class="profile-img">
            </div>
           <div class="profile-info">
    <p><strong>Username:</strong> <?= htmlspecialchars($username) ?></p>
    <p><strong>Name:</strong> <?= htmlspecialchars($fullname) ?></p>
    <p><strong>Gender:</strong> <?= htmlspecialchars($gender) ?></p> <!-- Gender after Fullname -->
    <p><strong>Email:</strong> <?= htmlspecialchars($email) ?></p>
    <p><strong>Phone:</strong> <?= htmlspecialchars($phone_number) ?></p>
    <p><strong>Address:</strong> <?= htmlspecialchars($address) ?></p>
</div>

        </div>

        <!-- Right: Tabs for Profile Details and Events Participated -->
        <div class="profile-right">
            <ul class="tab-nav">
                <li class="tab-item active" id="profile-tab">Profile</li>
                <li class="tab-item" id="events-tab">Events Participated</li>
            </ul>

            <div class="tab-content">
                <div class="tab-panel active" id="profile-edit">
                    <h2>Edit Profile</h2>
                   <form action="update_profile.php" method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="<?= htmlspecialchars($fullname) ?>" required>

    <label for="gender">Gender:</label> <!-- Gender field after fullname -->
    <select id="gender" name="gender" required>
        <option value="male" <?= $gender === 'male' ? 'selected' : '' ?>>Male</option>
        <option value="female" <?= $gender === 'female' ? 'selected' : '' ?>>Female</option>
        <option value="other" <?= $gender === 'other' ? 'selected' : '' ?>>Other</option>
    </select>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?= htmlspecialchars($email) ?>" required>

    <label for="phone_number">Phone:</label>
    <input type="text" id="phone_number" name="phone_number" value="<?= htmlspecialchars($phone_number) ?>" required>

    <label for="address">Address:</label>
    <textarea id="address" name="address" rows="4" required><?= htmlspecialchars($address) ?></textarea>

    <button type="submit" class="btn-submit">Save Changes</button>
</form>

                </div>

                <div class="tab-panel" id="events-participated">
                    <h2>Events Participated</h2>
                    <div class="events-list">
                        <div class="event-item">
                            <div class="event-date">January 2024</div>
                            <div class="event-details">
                                <strong>Running Marathon 2024</strong>
                                <p>Participated in the annual marathon event. A great experience running with hundreds of others!</p>
                            </div>
                        </div>
                       <div class="event-item">
                            <div class="event-date">January 2024</div>
                            <div class="event-details">
                                <strong>Running Marathon 2024</strong>
                                <p>Participated in the annual marathon event. A great experience running with hundreds of others!</p>
                            </div>
                        </div>
						<div class="event-item">
                            <div class="event-date">January 2024</div>
                            <div class="event-details">
                                <strong>Running Marathon 2024</strong>
                                <p>Participated in the annual marathon event. A great experience running with hundreds of others!</p>
                            </div>
                        </div>
						<div class="event-item">
                            <div class="event-date">January 2024</div>
                            <div class="event-details">
                                <strong>Running Marathon 2024</strong>
                                <p>Participated in the annual marathon event. A great experience running with hundreds of others!</p>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer>
    <p>&copy; 2024 Running Event System. All rights reserved.</p>
</footer>

<!-- Style Section -->
<style>
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f4f6f9;
        color: #333;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
    }
	
	select {
    width: 100%; /* Make dropdown width match other input fields */
    padding: 12px; /* Same padding as text inputs */
    font-size: 16px; /* Consistent font size */
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}


    .container {
        display: flex;
        flex-direction: column;
        flex-grow: 1;
        padding: 40px;
    }

    .profile-page {
        display: flex;
        gap: 40px;
        flex-grow: 1;
        justify-content: space-between;
    }

    .profile-left {
        flex: 1;
        background-color: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }

    .profile-left h2 {
        font-size: 35px;
        font-weight: bold;
        color: #2c3e50;
        margin-bottom: 20px;
    }

    /* Profile Image Styling (Circle) */
    .profile-image {
        margin-top: 20px;
        text-align: center;
    }

    .profile-img {
        width: 180px;
        height: 180px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #e67e22;
    }

    .profile-info {
        margin-top: 20px;
    }

    .profile-info p {
        font-size: 22px;
        color: #555;
        margin: 15px 0;
    }

    .profile-info p strong {
        color: #333;
    }

    .profile-right {
        flex: 2;
        background-color: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }

    .tab-nav {
        list-style: none;
        padding: 0;
        display: flex;
        justify-content: space-around;
        margin-bottom: 20px;
    }

    .tab-item {
        font-size: 18px;
        font-weight: bold;
        padding: 12px;
        cursor: pointer;
        transition: background-color 0.3s;
        color: #555;
    }

    .tab-item.active {
        color: #e67e22;
        border-bottom: 2px solid #e67e22;
    }

    .tab-item:hover {
        background-color: #f2f2f2;
    }

    .tab-content {
        display: block;
    }

    .tab-panel {
        display: none;
    }

    .tab-panel.active {
        display: block;
    }

    .tab-panel form {
        display: flex;
        flex-direction: column;
    }

    .tab-panel label {
        margin-bottom: 10px;
        font-size: 16px;
    }

    .tab-panel input, .tab-panel textarea {
        margin-bottom: 15px;
        padding: 12px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .tab-panel button {
        padding: 15px 25px;
        font-size: 18px;
        background-color: #e67e22;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .tab-panel button:hover {
        background-color: #d35400;
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

    /* Styling for Events Participated Section */
    .events-list {
        margin-top: 20px;
        max-height: 400px; /* Set a max height for the scrollable area */
        overflow-y: auto;  /* Enables vertical scrolling */
        padding-right: 15px; /* Prevent content from hiding behind scroll */
    }

    .event-item {
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 10px;
        margin-bottom: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .event-date {
        font-size: 16px;
        color: #888;
        margin-bottom: 10px;
    }

    .event-details {
        font-size: 18px;
    }

    .event-details strong {
        font-size: 20px;
        color: #333;
    }
</style>

<script>
    const profileTab = document.getElementById('profile-tab');
    const eventsTab = document.getElementById('events-tab');
    const profileEditPanel = document.getElementById('profile-edit');
    const eventsPanel = document.getElementById('events-participated');

    // Add event listeners to handle tab switching
    profileTab.addEventListener('click', function() {
        profileTab.classList.add('active');
        eventsTab.classList.remove('active');
        profileEditPanel.classList.add('active');
        eventsPanel.classList.remove('active');
    });

    eventsTab.addEventListener('click', function() {
        eventsTab.classList.add('active');
        profileTab.classList.remove('active');
        eventsPanel.classList.add('active');
        profileEditPanel.classList.remove('active');
    });

    // Ensure the first tab (Profile) is active when the page loads
    document.addEventListener('DOMContentLoaded', function() {
        profileTab.classList.add('active');
        profileEditPanel.classList.add('active');
    });
</script>

</body>
</html>
