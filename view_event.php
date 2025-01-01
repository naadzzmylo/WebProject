<?php include('header.php'); ?>

<div class="container">
    <div class="event-page">
        <!-- Left: Image Slider with Next/Prev Arrows -->
        <div class="event-slider">
            <div class="slider">
                <img src="path/to/event-image1.jpg" alt="Slide 1" class="slide">
                <img src="path/to/event-image2.jpg" alt="Slide 2" class="slide">
                <img src="path/to/event-image3.jpg" alt="Slide 3" class="slide">
            </div>
            <!-- Prev and Next Arrow Buttons -->
            <button class="arrow prev">&#10094;</button>
            <button class="arrow next">&#10095;</button>
        </div>

        <!-- Right: Event Details and Registration -->
        <div class="event-details">
            <h1 class="event-title">Event Title Goes Here</h1>
            <p class="event-date">Date: 1st Feb 2025 (Saturday)</p>
            <p class="event-time">Time: 09:00 PM</p>
            <p class="event-location">Location: Event Location</p>
            <p class="event-description">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum at sapien sit amet risus venenatis efficitur. Nam tincidunt arcu id eros efficitur.
            </p>

            <!-- Register Button at the Bottom -->
            <a href="register_event.php" class="register-button">Register</a>
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
        max-width: 1800px;
        margin: 0 auto;
        padding: 40px;
    }

    .event-page {
        display: flex;
        gap: 60px; /* Adjusted gap between the two sections */
    }

    /* Left: Image Slider */
    .event-slider {
        flex: 3; /* Increased flex value to make it wider */
        background-color: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        position: relative;
        width: 85%; /* Adjusted width to be wider */
        height: 600px; /* Same height as .event-details */
    }

    .slider {
        position: relative;
        overflow: hidden;
        width: 100%;
        height: 100%;
    }

    .slide {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 10px;
        display: none; /* Initially hide all images */
    }

    .slide.active {
        display: block; /* Display only the active image */
    }

    /* Arrow buttons */
    .arrow {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background-color: rgba(0, 0, 0, 0.5);
        color: white;
        font-size: 30px;
        width: 60px;  /* Set a specific width for the circular button */
        height: 60px; /* Set a specific height for the circular button */
        border: none;
        padding: 0; /* Remove padding */
        cursor: pointer;
        border-radius: 50%; /* This makes it a perfect circle */
        z-index: 10;
        display: flex;
        align-items: center;
        justify-content: center; /* Center the arrow icon */
        transition: background-color 0.3s ease;
    }

    .arrow:hover {
        background-color: rgba(0, 0, 0, 0.8);
    }

    .prev {
        left: 10px;
    }

    .next {
        right: 10px;
    }

    /* Right: Event Details */
    .event-details {
        flex: 2; /* Kept the flex value of 2 for the event details */
        background-color: #fff;
        padding: 20px 30px; /* Adjusted padding */
        border-radius: 10px;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        width: 80%;
        height: 600px; /* Same height as .event-slider */
    }

    .event-title {
        font-size: 40px; /* Reduced title size */
        font-weight: bold;
        color: #2c3e50;
        margin-bottom: 20px; /* Reduced margin */
    }

    .event-date, .event-time, .event-location, .event-description {
        font-size: 18px; /* Reduced font size */
        color: #7f8c8d;
        margin: 15px 0; /* Reduced margin */
    }

    /* Register Button */
    .register-button {
        display: inline-block;
        width: 100%; /* Full width of container */
        padding: 18px 0; /* Reduced padding */
        font-size: 20px; /* Slightly smaller font size */
        font-weight: bold;
        color: #fff;
        background-color: #e67e22;
        border-radius: 25px; /* Rounded corners */
        text-decoration: none;
        transition: background-color 0.3s ease;
        margin-top: 30px; /* Reduced margin */
        text-align: center;
    }

    .register-button:hover {
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
</style>

<!-- Script Section -->
<script>
    // JavaScript to control the image slider with Next/Prev buttons
    const slides = document.querySelectorAll('.slide');
    let currentSlide = 0;

    // Function to show the current slide
    function showSlide(index) {
        slides.forEach(slide => slide.classList.remove('active')); // Hide all slides
        slides[index].classList.add('active'); // Show the current slide
    }

    // Show the first slide initially
    showSlide(currentSlide);

    // Next button functionality
    document.querySelector('.next').addEventListener('click', function() {
        currentSlide = (currentSlide + 1) % slides.length; // Move to next slide
        showSlide(currentSlide);
    });

    // Prev button functionality
    document.querySelector('.prev').addEventListener('click', function() {
        currentSlide = (currentSlide - 1 + slides.length) % slides.length; // Move to previous slide
        showSlide(currentSlide);
    });
</script>
