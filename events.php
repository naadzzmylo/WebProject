<?php
// Include header file
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

// Fetch recently added events (Latest 7 events regardless of 'featured' status)
$recentEventsQuery = "SELECT event_id, event_name, event_date, event_time, event_id 
                      FROM events 
                      ORDER BY event_date DESC 
                      LIMIT 7";
$recentEventsResult = mysqli_query($conn, $recentEventsQuery);

// Fetch featured events (Explicitly where status = 'featured')
$featuredEventsQuery = "SELECT event_id, event_name, event_date, event_time, event_id 
                        FROM events 
                        WHERE event_status = 'coming'
                        ORDER BY event_date ASC";
$featuredEventsResult = mysqli_query($conn, $featuredEventsQuery);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event System</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS -->
</head>

<body>

    <div class="container">
        <!-- Recently Added Section -->
        <div class="events-section recently-added">
            <div class="section-title-container">
                <h2 class="section-title">Recently Added</h2>
            </div>
            <div class="carousel-container">
                <div class="events-grid" id="recentlyAddedCarousel">
                    <!-- Load events dynamically -->
                    <?php while ($event = mysqli_fetch_assoc($recentEventsResult)) { ?>
                        <div class="event-card">
                            <a href="view_event.php?id=<?php echo $event['event_id']; ?>" class="event-link">
                                <img src="get_image.php?image_id=<?php echo $event['event_id']; ?>" alt="<?php echo $event['event_name']; ?>" class="event-image">
                                <div class="event-details">
                                    <div class="event-title"><?php echo $event['event_name']; ?></div>
                                    <div class="event-date"><?php echo date("jS M Y (l)", strtotime($event['event_date'])); ?></div>
                                    <div class="event-time"><?php echo date("h:i A", strtotime($event['event_time'])); ?></div>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

        <!-- Featured Events Section -->
        <div class="events-section featured-events">
            <div class="section-title-container">
                <h2 class="section-title">Featured Events</h2>
            </div>
            <div class="events-grid">
                <!-- Load featured events dynamically -->
                <?php while ($event = mysqli_fetch_assoc($featuredEventsResult)) { ?>
                    <div class="event-card">
                        <a href="view_event.php?id=<?php echo $event['event_id']; ?>" class="event-link">
                            <img src="get_image.php?image_id=<?php echo $event['event_id']; ?>" alt="<?php echo $event['event_name']; ?>" class="event-image">
                            <div class="event-details">
                                <div class="event-title"><?php echo $event['event_name']; ?></div>
                                <div class="event-date"><?php echo date("jS M Y (l)", strtotime($event['event_date'])); ?></div>
                                <div class="event-time"><?php echo date("h:i A", strtotime($event['event_time'])); ?></div>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Running Event System. All rights reserved.</p>
    </footer>

    <!-- Style Section -->
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f6f9;
            color: #333;
        }

        .container {
            max-width: 1600px;
            margin: 0 auto;
            padding: 30px;
        }

        .section-title-container {
            width: 100%;
            padding: 15px 0;
            text-align: center;
            margin-bottom: 30px;
        }

        .section-title {
            font-size: 40px;
            font-weight: bold;
            color: #333;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 30px;
        }

        .events-section {
            margin-bottom: 50px;
        }

        /* Recently Added Section */
        .recently-added .carousel-container {
            position: relative;
            overflow: hidden;
        }

        .recently-added .events-grid {
            display: flex;
            gap: 20px;
            transition: transform 0.5s ease-in-out;
            width: calc(350px * 7 + 20px * 6);
        }

        .recently-added .event-card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            width: 350px;
            height: 400px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            cursor: pointer;
        }

        .recently-added .event-card a {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 1;
            text-decoration: none;
        }

        .recently-added .event-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-bottom: 2px solid #ddd;
            transition: filter 0.3s ease;
        }

        .recently-added .event-card img:hover {
            filter: brightness(0.85);
        }

        .recently-added .event-details {
            padding: 20px;
        }

        .recently-added .event-title {
            font-size: 20px;
            font-weight: bold;
            color: #000000;
            margin-bottom: 10px;
        }

        .recently-added .event-title:hover {
            color: #d35400;
        }

        .recently-added .event-date,
        .recently-added .event-time {
            font-size: 14px;
            color: #7f8c8d;
            margin-bottom: 5px;
        }

        .recently-added .event-time {
            font-weight: bold;
            color: #f39c12;
        }

        /* Featured Events Section */
        .featured-events .events-grid {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .featured-events .event-card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 350px;
            height: 400px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            cursor: pointer;
        }

        .featured-events .event-card a {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 1;
            text-decoration: none;
        }

        .featured-events .event-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-bottom: 2px solid #ddd;
            transition: filter 0.3s ease;
        }

        .featured-events .event-card img:hover {
            filter: brightness(0.85);
        }

        .featured-events .event-details {
            padding: 20px;
        }

        .featured-events .event-title {
            font-size: 20px;
            font-weight: bold;
            color: #000000;
            margin-bottom: 10px;
        }

        .featured-events .event-title:hover {
            color: #d35400;
        }

        .featured-events .event-date,
        .featured-events .event-time {
            font-size: 14px;
            color: #7f8c8d;
            margin-bottom: 5px;
        }

        .featured-events .event-time {
            font-weight: bold;
            color: #f39c12;
        }

        footer {
            text-align: center;
            padding: 20px;
            background-color: #e67e22;
            color: white;
            font-size: 14px;
            margin-top: 50px;
            border-top: 2px solid #ddd;
        }
    </style>

    <script>
        const carousel = document.getElementById('recentlyAddedCarousel');
        const totalSlides = 7; // Total number of events
        const slideWidth = 370; // Width of each card including margin
        let currentSlide = 0;

        function moveSlide() {
            currentSlide = (currentSlide + 1) % totalSlides; // Loop through slides
            carousel.style.transform = `translateX(-${currentSlide * slideWidth}px)`;
        }

        setInterval(moveSlide, 3000); // Slide every 3 seconds
    </script>

</body>

</html>