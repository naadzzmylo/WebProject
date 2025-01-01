w<?php
// Get the registration details from the form
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$gender = $_POST['gender'];
$category = $_POST['category'];
// Redirect to payment page with necessary details
header("Location: payment.php?event_id=1&category=$category&tee_size=$tee_size");
exit();
?>
