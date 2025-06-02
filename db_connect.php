<?php
$host = "localhost";
$user = "root";
$pass = ""; // your MySQL password
$dbname = "sale"; // your database name

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>