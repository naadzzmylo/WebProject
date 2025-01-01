<?php include('header.php'); ?>

<div class="container">
    <!-- Recently Added Section -->
    <div class="events-section recently-added">
        <div class="section-title-container">
            <h2 class="section-title">Recently Added</h2>
        </div>
        <div class="carousel-container">
            <div class="events-grid" id="recentlyAddedCarousel">
                <!-- Event cards go here -->
                <div class="event-card">
                    <a href="view_event.php?id=1" class="event-link">
                        <img src="path/to/event1.jpg" alt="Event 1">
                        <div class="event-details">
                            <div class="event-title">Larian Hari Wilayah Persekutuan - Putrajaya</div>
                            <div class="event-date">1st Feb 2025 (Saturday)</div>
                            <div class="event-time">09:00 PM</div>
                        </div>
                    </a>
                </div>
                <div class="event-card">
                    <a href="view_event.php?id=2" class="event-link">
                        <img src="path/to/event2.jpg" alt="Event 2">
                        <div class="event-details">
                            <div class="event-title">Larian Hari Wilayah Persekutuan - Kuala Lumpur</div>
                            <div class="event-date">16th Feb 2025 (Sunday)</div>
                            <div class="event-time">06:30 AM</div>
                        </div>
                    </a>
                </div>
                <div class="event-card">
                    <a href="view_event.php?id=3" class="event-link">
                        <img src="path/to/event3.jpg" alt="Event 3">
                        <div class="event-details">
                            <div class="event-title">MMC Friendship Half Marathon</div>
                            <div class="event-date">31st May 2025 (Saturday)</div>
                            <div class="event-time">04:00 AM</div>
                        </div>
                    </a>
                </div>
                <div class="event-card">
                    <a href="view_event.php?id=4" class="event-link">
                        <img src="path/to/event4.jpg" alt="Event 4">
                        <div class="event-details">
                            <div class="event-title">Run for Charity</div>
                            <div class="event-date">14th Mar 2025 (Friday)</div>
                            <div class="event-time">07:00 AM</div>
                        </div>
                    </a>
                </div>
                <div class="event-card">
                    <a href="view_event.php?id=5" class="event-link">
                        <img src="path/to/event5.jpg" alt="Event 5">
                        <div class="event-details">
                            <div class="event-title">Annual Fun Run</div>
                            <div class="event-date">20th Apr 2025 (Sunday)</div>
                            <div class="event-time">05:00 PM</div>
                        </div>
                    </a>
                </div>
                <div class="event-card">
                    <a href="view_event.php?id=6" class="event-link">
                        <img src="path/to/event6.jpg" alt="Event 6">
                        <div class="event-details">
                            <div class="event-title">City Marathon</div>
                            <div class="event-date">25th Jun 2025 (Wednesday)</div>
                            <div class="event-time">06:30 AM</div>
                        </div>
                    </a>
                </div>
                <div class="event-card">
                    <a href="view_event.php?id=7" class="event-link">
                        <img src="path/to/event7.jpg" alt="Event 7">
                        <div class="event-details">
                            <div class="event-title">Mid-Year Run</div>
                            <div class="event-date">15th Jul 2025 (Tuesday)</div>
                            <div class="event-time">08:00 AM</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Featured Events Section -->
    <div class="events-section featured-events">
        <div class="section-title-container">
            <h2 class="section-title">Featured Events</h2>
        </div>
        <div class="events-grid">
            <div class="event-card">
                <a href="view_event.php?id=1" class="event-link">
                    <img src="path/to/event1.jpg" alt="Event 1">
                    <div class="event-details">
                        <div class="event-title">Larian Hari Wilayah Persekutuan - Putrajaya</div>
                        <div class="event-date">1st Feb 2025 (Saturday)</div>
                        <div class="event-time">09:00 PM</div>
                    </div>
                </a>
            </div>
            <div class="event-card">
                <a href="view_event.php?id=2" class="event-link">
                    <img src="path/to/event2.jpg" alt="Event 2">
                    <div class="event-details">
                        <div class="event-title">Larian Hari Wilayah Persekutuan - Kuala Lumpur</div>
                        <div class="event-date">16th Feb 2025 (Sunday)</div>
                        <div class="event-time">06:30 AM</div>
                    </div>
                </a>
            </div>
            <div class="event-card">
                <a href="view_event.php?id=3" class="event-link">
                    <img src="path/to/event3.jpg" alt="Event 3">
                    <div class="event-details">
                        <div class="event-title">MMC Friendship Half Marathon</div>
                        <div class="event-date">31st May 2025 (Saturday)</div>
                        <div class="event-time">04:00 AM</div>
                    </div>
                </a>
            </div>
            <div class="event-card">
                <a href="view_event.php?id=4" class="event-link">
                    <img src="path/to/event4.jpg" alt="Event 4">
                    <div class="event-details">
                        <div class="event-title">Run for Charity</div>
                        <div class="event-date">14th Mar 2025 (Friday)</div>
                        <div class="event-time">07:00 AM</div>
                    </div>
                </a>
            </div>
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

    /* Remove Section title background bar */
    .section-title-container {
        width: 100%;
        padding: 15px 0;
        text-align: center;
        margin-bottom: 30px;
    }

    .section-title {
           font-size: 40px; /* Bigger size */
    font-weight: bold; /* Bold text */
    color: #333; /* Ensure consistent color */
    letter-spacing: 2px; /* Optional: Adds spacing between letters */
    text-transform: uppercase; /* Optional: Makes text all caps */
    margin-bottom: 30px; /* Adjust spacing below */
    }

    .events-section {
        margin-bottom: 50px;
    }

    /* Recently Added Section */
    .recently-added .carousel-container {
        position: relative;
        overflow: hidden; /* Hide excess events */
    }

    .recently-added .events-grid {
        display: flex;
        gap: 20px;
        transition: transform 0.5s ease-in-out;
        width: calc(350px * 7 + 20px * 6); /* 7 cards with gaps */
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
        white-space: normal;
        overflow: hidden;
        text-overflow: ellipsis;
        line-height: 1.4;
    }

    .recently-added .event-title:hover {
        color: #d35400; /* Darker orange */
    }

    .recently-added .event-date,
    .recently-added .event-time {
        font-size: 14px;
        color: #7f8c8d;
        margin-bottom: 5px;
    }

    .recently-added .event-time {
        font-weight: bold;
        color: #f39c12; /* Lighter orange */
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
        white-space: normal;
        overflow: hidden;
        text-overflow: ellipsis;
        line-height: 1.4;
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
