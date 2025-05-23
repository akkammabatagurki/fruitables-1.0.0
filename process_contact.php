<?php
// Database connection settings
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "sale";

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get POST data and sanitize
$name = $conn->real_escape_string($_POST['name'] ?? '');
$email = $conn->real_escape_string($_POST['email'] ?? '');
$message = $conn->real_escape_string($_POST['message'] ?? '');

// Simple validation
if ($name && $email && $message) {
    $sql = "INSERT INTO contacts (name, email, message) VALUES ('$name', '$email', '$message')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Thank you for contacting us!');window.location='contact.html';</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');window.location='contact.html';</script>";
    }
} else {
    echo "<script>alert('Please fill all fields.');window.location='contact.html';</script>";
}

$conn->close();
?>