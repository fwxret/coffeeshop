<?php
session_start();

$mysqli = new mysqli("localhost", "root", "", "banhang");

// Kiểm tra có dữ liệu POST và yêu cầu thêm vào giỏ hàng không
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $sql_select_product = "SELECT * FROM products WHERE id_san_pham = '$product_id'";
    $result_select_product = $mysqli->query($sql_select_product);

    if ($result_select_product && $result_select_product->num_rows > 0) {
        $product = $result_select_product->fetch_assoc();

        $quantity = 1; // Số lượng sản phẩm, bạn có thể điều chỉnh tùy theo yêu cầu

        $sql_add_to_cart = "INSERT INTO order_items (id_san_pham, so_luong) VALUES ('$product_id', '$quantity')";
        $result_add_to_cart = $mysqli->query($sql_add_to_cart);

        if ($result_add_to_cart) {
            $_SESSION['cart'][] = array(
                'id_san_pham' => $product['id_san_pham'],
                'ten_san_pham' => $product['ten_san_pham'],
                'mo_ta' => $product['mo_ta'],
                'anh_san_pham' => $product['anh_san_pham'],
                'so_luong' => $quantity,
            );

            header("Location: cart.php"); // Chuyển hướng đến trang cart.php sau khi thêm vào giỏ hàng
            exit();
        } else {
            echo "Error adding to cart";
        }
    } else {
        echo "Product not found";
    }
}

$mysqli->close();
?>
