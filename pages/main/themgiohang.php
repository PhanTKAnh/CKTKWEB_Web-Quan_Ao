<?php
session_start();
include('../../admincp/config/config.php');

// Function to update quantity
function updateQuantity($id, $newQuantity, $availableStock) {
    // Check if the new quantity is within the available stock range
    return max(1, min($newQuantity, $availableStock));
}

// Function to display an error message
function displayErrorMessage($message) {
    $_SESSION['error_message'] = $message;
}

// Add product to cart
if (isset($_POST['themgiohang'])) {
    $id = $_GET['idsanpham'];
    $soluong = isset($_POST['soluong']) ? intval($_POST['soluong']) : 1;

    // Validate quantity
    $soluong = max(1, $soluong);

    $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham='" . $id . "' LIMIT 1";
    $query = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_array($query);

    if ($row) {
        $availableStock = $row['soluong'];

        // Check if the requested quantity exceeds the available stock
        $newQuantity = $soluong;
        if ($newQuantity <= $availableStock) {
            $new_product = array(
                'tensanpham' => $row['tensanpham'],
                'id' => $id,
                'soluong' => $newQuantity,
                'giasp' => $row['giasp'],
                'hinhanh' => $row['hinhanh'],
                'masp' => $row['masp'],
                'availableStock' => $availableStock
            );

            if (isset($_SESSION['cart'])) {
                $found = false;
                foreach ($_SESSION['cart'] as &$cart_item) {
                    if ($cart_item['id'] == $id) {
                        // Update quantity
                        $cart_item['soluong'] = $newQuantity;
                        $found = true;
                    }
                }
                if (!$found) {
                    $_SESSION['cart'][] = $new_product;
                }
            } else {
                $_SESSION['cart'] = array($new_product);
            }
        } else {
            // Display an error message
            displayErrorMessage("Error: Quantity exceeds available stock.");
        }
    }
    header('Location:../../index.php?quanly=giohang');
}

// Increase quantity
if (isset($_GET['cong'])) {
    $id = $_GET['cong'];
    foreach ($_SESSION['cart'] as &$cart_item) {
        if ($cart_item['id'] == $id) {
            $newQuantity = $cart_item['soluong'] + 1;
            // Update quantity
            $cart_item['soluong'] = updateQuantity($id, $newQuantity, $cart_item['availableStock']);
        }
    }
    header('Location:../../index.php?quanly=giohang');
}

// Decrease quantity
if (isset($_GET['tru'])) {
    $id = $_GET['tru'];
    foreach ($_SESSION['cart'] as &$cart_item) {
        if ($cart_item['id'] == $id) {
            $newQuantity = $cart_item['soluong'] - 1;
            // Update quantity
            $cart_item['soluong'] = updateQuantity($id, $newQuantity, $cart_item['availableStock']);
        }
    }
    header('Location:../../index.php?quanly=giohang');
}

// ... (the rest of your code remains the same)

// Check if an error message is set and display it
if (isset($_SESSION['error_message'])) {
    echo $_SESSION['error_message'];
    unset($_SESSION['error_message']);
}
?>
