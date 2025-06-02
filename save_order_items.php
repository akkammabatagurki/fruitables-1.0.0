<?php
require_once 'db_connect.php';

// Example: receive order_id and cart_data via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $order_id = isset($_POST['order_id']) ? intval($_POST['order_id']) : 0;
    $cart_data = isset($_POST['cart_data']) ? $_POST['cart_data'] : '[]';
    $cart = json_decode($cart_data, true);

    if ($order_id > 0 && is_array($cart)) {
        $itemStmt = $conn->prepare("INSERT INTO order_items (order_id, product_id, product_name, product_price, quantity, total_price) VALUES (?, ?, ?, ?, ?, ?)");
        foreach ($cart as $item) {
            $product_id = isset($item['id']) ? intval($item['id']) : 0;
            $product_name = $item['name'] ?? '';
            $product_price = isset($item['price']) ? floatval($item['price']) : 0;
            $quantity = isset($item['qty']) ? intval($item['qty']) : 0;
            $total_price = $product_price * $quantity;
            $itemStmt->bind_param(
                "iisdid",
                $order_id,
                $product_id,
                $product_name,
                $product_price,
                $quantity,
                $total_price
            );
            $itemStmt->execute();
            if ($itemStmt->error) {
                error_log("Order item insert error: " . $itemStmt->error);
            }
        }
        $itemStmt->close();
        echo "Order items saved successfully.";
    } else {
        echo "Invalid order ID or cart data.";
    }
} else {
    echo "Invalid request.";
}
?>