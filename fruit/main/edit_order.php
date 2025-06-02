<?php
require_once('auth.php');
require_once('../../db_connect.php');

if (isset($_GET['id'])) {
    $order_id = intval($_GET['id']);
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Update order
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $company = $_POST['company'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $country = $_POST['country'];
        $postcode = $_POST['postcode'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $notes = $_POST['notes'];

        $sql = "UPDATE orders SET first_name=?, last_name=?, company=?, address=?, city=?, country=?, postcode=?, mobile=?, email=?, notes=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssssssi", $first_name, $last_name, $company, $address, $city, $country, $postcode, $mobile, $email, $notes, $order_id);
        if ($stmt->execute()) {
            header("Location: orders.php?msg=updated");
            exit;
        } else {
            echo "Error updating order.";
        }
        $stmt->close();
    } else {
        // Fetch order details
        $sql = "SELECT * FROM orders WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $order_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $order = $result->fetch_assoc();
        $stmt->close();
        if (!$order) {
            echo "Order not found.";
            exit;
        }
    }
} else {
    echo "Invalid request.";
    exit;
}
?>
<link href="css/bootstrap.css" rel="stylesheet">
<div class="container">
    <h2>Edit Order</h2>
    <form method="post">
        <label>First Name: <input type="text" name="first_name" value="<?php echo htmlspecialchars($order['first_name']); ?>" required></label><br>
        <label>Last Name: <input type="text" name="last_name" value="<?php echo htmlspecialchars($order['last_name']); ?>" required></label><br>
        <label>Company: <input type="text" name="company" value="<?php echo htmlspecialchars($order['company']); ?>"></label><br>
        <label>Address: <input type="text" name="address" value="<?php echo htmlspecialchars($order['address']); ?>" required></label><br>
        <label>City: <input type="text" name="city" value="<?php echo htmlspecialchars($order['city']); ?>" required></label><br>
        <label>Country: <input type="text" name="country" value="<?php echo htmlspecialchars($order['country']); ?>" required></label><br>
        <label>Postcode: <input type="text" name="postcode" value="<?php echo htmlspecialchars($order['postcode']); ?>" required></label><br>
        <label>Mobile: <input type="text" name="mobile" value="<?php echo htmlspecialchars($order['mobile']); ?>" required></label><br>
        <label>Email: <input type="email" name="email" value="<?php echo htmlspecialchars($order['email']); ?>" required></label><br>
        <label>Notes: <textarea name="notes"><?php echo htmlspecialchars($order['notes']); ?></textarea></label><br>
        <button type="submit" class="btn btn-success">Update Order</button>
        <a href="orders.php" class="btn btn-default">Cancel</a>
    </form>
</div>