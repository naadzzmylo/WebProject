<?php include('header.php'); ?>

<div class="container">
    <!-- Image Slider Section -->
    <div class="slider">
        <div class="slider-container">
            <div class="slides">
                <div class="slide">
                    <img src="image/home1.jpg" alt="Running Event Image 1">
                    <div class="text-overlay">
                        <h2>Join Our Running Event</h2>
                        <p>Be a part of an exciting fitness challenge!</p>
                        <a href="events.php" class="btn">Browse Events</a>
                    </div>
                </div>
                <div class="slide">
                    <img src="image/home2.jpg" alt="Running Event Image 2">
                    <div class="text-overlay">
                        <h2>Fitness for All</h2>
                        <p>Get ready to run and make a difference!</p>
                        <a href="events.php" class="btn">Browse Events</a>
                    </div>
                </div>
                <div class="slide">
                    <img src="image/home3.jpg" alt="Running Event Image 3">
                    <div class="text-overlay">
                        <h2>Run for a Cause</h2>
                        <p>Support a healthy and active lifestyle.</p>
                        <a href="events.php" class="btn">Browse Events</a>
                    </div>
                </div>
            </div>
            <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
            <button class="next" onclick="moveSlide(1)">&#10095;</button>
        </div>
    </div>

    <!-- Steps Section -->
    <div class="steps">
        <div class="step">
            <div class="step-circle">1</div>
            <h3 class="step-title">Download and Signup</h3>
            <p>Download the app and sign up with your phone number or email.</p>
            <p>Available on Playstore or Appstore.</p>
        </div>
        <div class="step">
            <div class="step-circle">2</div>
            <h3 class="step-title">Purchase Ticket</h3>
            <p>Select the event and purchase your ticket via online payment.</p>
            <p>Tickets are stored in your account.</p>
        </div>
        <div class="step">
            <div class="step-circle">3</div>
            <h3 class="step-title">Present Your Ticket</h3>
            <p>Present your ticket at the event for scanning.</p>
            <p>It's that easy!</p>
        </div>
    </div>

    <!-- Video Section -->
    <div class="video">
        <div class="video-container">
            <!-- YouTube Video (auto-play within the section) -->
            <iframe id="youtube-video" src="https://www.youtube.com/embed/49Dx-TUEtLo?autoplay=1&mute=1" 
                frameborder="0" allow="autoplay; fullscreen" allowfullscreen style="width: 100%; height: 100%;">
            </iframe>
        </div>
    </div>

  <!-- Vision and Mission Section with Side-by-Side Style -->
<div class="vision-mission-steps">
    <div class="step">
        <div class="step-circle">1</div>
        <h3 class="step-title">Vision</h3>
        <p>To inspire a global community united by a passion for running, fostering health, fitness, and a sense of belonging across all walks of life.</p>
    </div>
    <div class="step">
        <div class="step-circle">2</div>
        <h3 class="step-title">Mission</h3>
        <p>We aim to create dynamic, inclusive events that promote physical well-being, build connections, and empower individuals to embrace an active lifestyle.</p>
    </div>
</div>






<!-- Footer Section -->
<footer>
    <p>&copy; 2024 Running Event System. All rights reserved.</p>
</footer>

<script>
// JavaScript for the image slider
let slideIndex = 0;

function moveSlide(n) {
    slideIndex += n;
    showSlides(slideIndex);
}

function showSlides(index) {
    let slides = document.getElementsByClassName("slide");
    if (index >= slides.length) { slideIndex = 0; } // Loop to the first slide
    if (index < 0) { slideIndex = slides.length - 1; } // Loop to the last slide
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
    }
    slides[slideIndex].style.display = "block";  
}

// Initialize the slider
showSlides(slideIndex);

// Autoplay functionality
function autoplaySlides() {
    slideIndex++;
    showSlides(slideIndex);
}

// Set interval for autoplay (5 seconds)
setInterval(autoplaySlides, 5000);
</script>

<style>
/* Global Styles */
body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    background-color: #f4f4f4;
}
	
	

.container {
    width: 100%; 
    margin: 0;
    padding: 0;
}

/* Steps Section Styles */
.steps {
    display: grid;
    grid-template-columns: repeat(3, 1fr); 
    gap: 40px;
    margin-top: 80px;
    text-align: center;
}

.step {
    background-color: white;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border-top: 5px solid #FF5722; /* Orange line at the top */
    border-bottom: 5px solid #FF5722; /* Orange line at the bottom */
}

.step:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 25px rgba(0, 0, 0, 0.15);
}

.step-circle {
    background-color: #FF5722;
    color: white;
    font-size: 30px;
    font-weight: bold;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0 auto 20px;
}

.step-title {
    font-size: 1.6rem;
    font-weight: 500;
    color: #333;
    margin-bottom: 15px;
}

.step p {
    font-size: 1rem;
    color: #666;
    line-height: 1.6;
}

/* Image Slider Styles */
.slider-container {
    position: relative;
    width: 100%; 
    height: 60vh; 
    overflow: hidden;
}

.slides {
    display: flex;
    width: 100%;
    height: 100%;
}

.slide {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: none;
    position: relative;
}

.slide img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* Text on image overlay */
.text-overlay {
    position: absolute;
    bottom: 20px;
    left: 50%;
    transform: translateX(-50%);
    color: white;
    text-align: center;
    font-family: 'Arial', sans-serif;
    background-color: rgba(0, 0, 0, 0.5);
    padding: 20px;
    border-radius: 10px;
    width: 80%;
}

.text-overlay h2 {
    font-size: 2.5rem;
    font-weight: bold;
    margin: 0;
}

.text-overlay p {
    font-size: 1.1rem;
    margin: 10px 0;
}

.text-overlay .btn {
    padding: 10px 20px;
    background-color: #F77606;
    color: white;
    font-weight: bold;
    text-decoration: none;
    border-radius: 5px;
    margin-top: 15px;
    display: inline-block;
    text-transform: uppercase;
    transition: background-color 0.3s ease;
}

.text-overlay .btn:hover {
    background-color: #333;
}

/* Navigation buttons for the slider */
button {
    position: absolute;
    top: 50%;
    background-color: #333;
    color: white;
    font-size: 32px;
    border: none;
    padding: 20px;
    cursor: pointer;
    z-index: 1;
    border-radius: 50%;
    transform: translateY(-50%);
    width: 50px;
    height: 50px;
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
}

.prev {
    left: 15px;
}

.next {
    right: 15px;
}

button:hover {
    background-color: #FF5722;
}

/* Video Section */
.video {
    margin-top: 50px;
    text-align: center;
}

.video-container {
    position: relative;
    width: 100%;
    height: 100vh; /* Full screen height */
}

iframe {
    width: 100%;
    height: 100%;
    display: block;
}

/* Vision and Mission Section with Side-by-Side Layout */
.vision-mission-steps {
    margin-top: 80px; /* Add spacing at the top */
    display: flex; /* Use flexbox for side-by-side layout */
    justify-content: center; /* Center the items horizontally */
    align-items: center; /* Center the items vertically */
    text-align: center;
    gap: 10px; /* Reduce the space between the items */
}

/* Remove margin and padding around each step */
.vision-mission-steps .step {
    background-color: white;
    padding: 20px; /* Reduce padding to make the steps smaller */
    border-radius: 12px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border-top: 5px solid #FF5722; /* Orange line at the top */
    border-bottom: 5px solid #FF5722; /* Orange line at the bottom */
    flex: 1; /* Make the steps take equal width */
    max-width: 40%; /* Limit the maximum width of each step */
    margin: 0; /* Remove any margin from the steps */
}

.vision-mission-steps .step:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 25px rgba(0, 0, 0, 0.15);
}

.vision-mission-steps .step-circle {
    background-color: #FF5722;
    color: white;
    font-size: 30px;
    font-weight: bold;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0 auto 20px;
}

.vision-mission-steps .step-title {
    font-size: 1.6rem;
    font-weight: 500;
    color: #333;
    margin-bottom: 15px;
}

.vision-mission-steps .step p {
    font-size: 1rem;
    color: #666;
    line-height: 1.6;
}
	
	/* Add space between Vision and Mission section and Footer */
.vision-mission-steps {
    margin-top: 80px; /* Add spacing at the top */
    display: flex; /* Use flexbox for side-by-side layout */
    justify-content: center; /* Center the items horizontally */
    align-items: center; /* Center the items vertically */
    text-align: center;
    gap: 10px; /* Reduce the space between the items */
    margin-bottom: 50px; /* Add space between Vision and Footer */
}


/* Footer Section */
footer {
    text-align: center;
    padding: 20px;
    background-color: #e67e22; /* Orange background */
    font-size: 0.9rem;
    color: white; /* White text for contrast */
}

</style>

</body>
</html>
