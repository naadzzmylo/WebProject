<?php include('header.php'); ?>

<?php
// Capture the GET parameters passed from the registration page
$event_id = $_GET['event_id'];
$category = $_GET['category'];
?>

<div class="container">
    <div class="payment">
        <h3>Event: <?php echo "Event $event_id"; ?></h3>
        <p>Category: <?php echo $category; ?></p>
        <p>Price: $50</p>
        <form id="registrationForm">
            <input type="button" value="Complete Registration" class="btn-submit" onclick="showSuccessModal()">
        </form>
    </div>
</div>

<!-- Modal -->
<div id="successModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Success!</h2>
        </div>
        <div class="modal-body">
            <h3>Your registration has been successfully completed.</h3>
            <p>We look forward to seeing you at the event!</p>
        </div>
        <div class="modal-footer">
            <button class="btn-close" onclick="closeModal()">Close</button>
        </div>
    </div>
</div>

<footer>
    <p>&copy; 2024 Running Event System. All rights reserved.</p>
</footer>

<!-- Additional Styles -->
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f9;
        margin: 0;
        padding: 0;
    }

    .container {
        width: 80%;
        max-width: 1000px;
        margin: 30px auto;
        padding: 20px;
        background-color: #ffffff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    .payment {
        text-align: center;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
        background-color: #f9f9f9;
    }

    .payment h3 {
        font-size: 24px;
        color: #333;
    }

    .payment p {
        font-size: 18px;
        color: #555;
        margin: 10px 0;
    }

    .btn-submit {
        background-color: #ff8c00; /* Orange */
        color: white;
        border: none;
        padding: 12px 24px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin-top: 20px;
        cursor: pointer;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .btn-submit:hover {
        background-color: #e77c00; /* Darker orange */
    }

    footer {
        text-align: center;
        padding: 10px;
        background-color: #333;
        color: white;
        position: fixed;
        width: 100%;
        bottom: 0;
    }

    /* Modal Styles */
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.6);
        padding-top: 100px;
        animation: fadeIn 0.3s ease-out;
    }

    .modal-content {
        background-color: #fff;
        margin: auto;
        padding: 20px;
        border-radius: 10px;
        width: 50%;
        max-width: 600px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        animation: slideUp 0.3s ease-out;
    }

    .modal-header {
        text-align: center;
        margin-bottom: 20px;
    }

    .modal-header h2 {
        font-size: 28px;
        color: #ff8c00; /* Orange */
    }

    .modal-body h3 {
        font-size: 24px;
        color: #333;
    }

    .modal-body p {
        font-size: 18px;
        color: #555;
    }

    .close {
        color: #aaa;
        font-size: 30px;
        font-weight: bold;
        position: absolute;
        top: 10px;
        right: 20px;
        cursor: pointer;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
    }

    .modal-footer {
        text-align: center;
        margin-top: 20px;
    }

    .btn-close {
        background-color: #ff8c00; /* Orange */
        color: white;
        padding: 12px 24px;
        font-size: 16px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-close:hover {
        background-color: #e77c00; /* Darker orange */
    }

    /* Animations */
    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    @keyframes slideUp {
        from {
            transform: translateY(20px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }
</style>

<script>
    function showSuccessModal() {
        // Display the modal
        document.getElementById('successModal').style.display = 'block';
    }

    function closeModal() {
        // Redirect to profile.php after closing the modal
        window.location.href = 'profile.php'; 
    }

    // Close the modal if the user clicks anywhere outside the modal content
    window.onclick = function(event) {
        if (event.target == document.getElementById('successModal')) {
            closeModal();
        }
    }
</script>

</body>
</html>
