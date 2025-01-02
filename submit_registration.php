w<?php
// Get the registration details from the form
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$gender = $_POST['gender'];
// Redirect to payment page with necessary details
header("Location: payment.php?event_id=?");
exit();
?>
