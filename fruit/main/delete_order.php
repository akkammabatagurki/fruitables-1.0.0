<?php
require_once('auth.php');
require_once('../../db_connect.php');

if (isset($_GET['id'])) {
    $order_id = intval($_GET['id']);
    // Delete the order (and its items if you have ON DELETE CASCADE)
    $sql = "DELETE FROM orders WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $order_id);
    if ($stmt->execute()) {
        header("Location: orders.php?msg=deleted");
        exit;
    } else {
        echo "Error deleting order.";
    }
    $stmt->close();
} else {
    echo "Invalid request.";
}
?>