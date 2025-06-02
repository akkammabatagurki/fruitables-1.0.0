<?php
session_start();

$product = [
    'name' => $_POST['product_name'],
    'price' => $_POST['product_price'],
    'image' => $_POST['product_image'],
    'qty' => 1
];

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$found = false;
foreach ($_SESSION['cart'] as &$item) {
    if ($item['name'] === $product['name']) {
        $item['qty'] += 1;
        $found = true;
        break;
    }
}
unset($item);

if (!$found) {
    $_SESSION['cart'][] = $product;
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;
?>