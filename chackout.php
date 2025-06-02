<?php
require_once 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data
    $firstName = $_POST['first_name'] ?? '';
    $lastName = $_POST['last_name'] ?? '';
    $company = $_POST['company'] ?? '';
    $address = $_POST['address'] ?? '';
    $city = $_POST['city'] ?? '';
    $country = $_POST['country'] ?? '';
    $postcode = $_POST['postcode'] ?? '';
    $mobile = $_POST['mobile'] ?? '';
    $email = $_POST['email'] ?? '';
    $notes = $_POST['notes'] ?? '';

    // Save order to database
    $stmt = $conn->prepare("INSERT INTO orders (first_name, last_name, company, address, city, country, postcode, mobile, email, notes, order_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())");
    $stmt->bind_param("ssssssssss", $firstName, $lastName, $company, $address, $city, $country, $postcode, $mobile, $email, $notes);
    if ($stmt->execute()) {
        // Success message with CSS
        echo '
        <div style="
            max-width: 500px;
            margin: 40px auto;
            background: #e6ffed;
            border: 1px solid #b7eb8f;
            border-radius: 10px;
            padding: 32px 24px;
            text-align: center;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        ">
            <i class="fa fa-check-circle" style="color:#52c41a; font-size:48px; margin-bottom:16px;"></i>
            <h2 style="color:#389e0d; margin-bottom:12px;">Your order is placed successfully!</h2>
            <p style="color:#333; font-size:18px;">Thank you for shopping with us.</p>
        </div>
        ';
    } else {
        echo "<div style='background:#f8d7da;padding:20px;margin:20px 0;border-radius:8px;'>
            <h3>Order Failed!</h3>
            <p>There was an error saving your order. Please try again.</p>
        </div>";
    }
    $stmt->close();
}
?>