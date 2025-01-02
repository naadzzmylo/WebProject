<?php
include('header.php');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jomrun";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the event ID from the URL
$event_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch event details
$eventQuery = "SELECT * FROM events WHERE event_id = ?";
$stmt = $conn->prepare($eventQuery);
$stmt->bind_param("i", $event_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $event = $result->fetch_assoc();
} else {
    die("Event not found!");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Details</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f6f9;
            color: #333;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
        }

        .event-slider {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: relative;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .slider {
            position: relative;
            overflow: hidden;
            width: 100%;
            height: 300px;
        }

        .slide {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
            display: none;
        }

        .slide.active {
            display: block;
        }

        .arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            font-size: 20px;
            width: 40px;
            height: 40px;
            border: none;
            cursor: pointer;
            border-radius: 50%;
            z-index: 10;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .arrow:hover {
            background-color: rgba(0, 0, 0, 0.7);
        }

        .prev {
            left: 10px;
        }

        .next {
            right: 10px;
        }

        .event-details {
            font-size: 16px;
            color: #2c3e50;
        }

        .event-title {
            font-size: 24px;
            font-weight: bold;
        }

        .event-date,
        .event-time,
        .event-location {
            margin: 5px 0;
        }

        .register-button-slider {
            display: inline-block;
            padding: 12px 0;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            background-color: #e67e22;
            border-radius: 25px;
            text-decoration: none;
            text-align: center;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        .register-button-slider:hover {
            background-color: #d35400;
        }

        footer {
            text-align: center;
            padding: 20px;
            background-color: #e67e22;
            color: white;
            font-size: 14px;
            margin-top: 30px;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Event Slider with Details -->
        <div class="event-slider">
            <div class="slider">
                <!-- Display the cover image -->
                <img src="<?php echo $event['cover_image']; ?>" alt="Cover Image" class="slide active">

                <!-- Display detail images dynamically if available -->
                <img src="<?php echo $event['detail_images_1']; ?>" alt="Detail Image 1" class="slide">
                <img src="<?php echo $event['detail_images_2']; ?>" alt="Detail Image 2" class="slide">
                <img src="<?php echo $event['detail_images_3']; ?>" alt="Detail Image 3" class="slide">
            </div>
            <button class="arrow prev">&#10094;</button>
            <button class="arrow next">&#10095;</button>

            <!-- Event Details -->
            <div class="event-details">
                <h1 class="event-title"><?php echo htmlspecialchars($event['event_name']); ?></h1>
                <p class="event-date">Date: <?php echo date("jS M Y (l)", strtotime($event['event_date'])); ?></p>
                <p class="event-time">Time: <?php echo date("h:i A", strtotime($event['event_time'])); ?></p>
                <p class="event-location">Location: <?php echo htmlspecialchars($event['event_location']); ?></p>
            </div>

            <!-- Register Button -->
            <a href="register_event.php?id=<?php echo $event['event_id']; ?>" class="register-button-slider">Register</a>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Running Event System. All rights reserved.</p>
    </footer>

    <script>
        const slides = document.querySelectorAll('.slide');
        let currentSlide = 0;

        function showSlide(index) {
            slides.forEach(slide => slide.classList.remove('active'));
            slides[index].classList.add('active');
        }

        showSlide(currentSlide);

        document.querySelector('.next').addEventListener('click', function() {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide(currentSlide);
        });

        document.querySelector('.prev').addEventListener('click', function() {
            currentSlide = (currentSlide - 1 + slides.length) % slides.length;
            showSlide(currentSlide);
        });
    </script>
</body>

</html>