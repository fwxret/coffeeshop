<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Trang Chủ</title>
</head>

<body>
    <h3>Welcome</h3>
    <?php
    session_start();
    include('config/connect.php');
    include('modules/header.php');

    // Kết nối đến cơ sở dữ liệu và thực hiện truy vấn để lấy danh sách sản phẩm
    $mysqli = new mysqli("localhost", "root", "", "banhang");

    // Sử dụng INNER JOIN để kết hợp thông tin từ order_items và products
    $sql_order_items = "SELECT oi.*, p.ten_san_pham, p.gia_tien, p.anh_san_pham 
                        FROM order_items oi
                        INNER JOIN products p ON oi.id_san_pham = p.id_san_pham";

    $result_order_items = $mysqli->query($sql_order_items);
    ?>
    <div class="product" id="product">
        <div class="container">
            <div class="row">
                <div class="heading col-12">
                    <h2>Giỏ hàng của bạn</h2>
                </div>
                <div class="product_combo row">
                    <?php while ($row = $result_order_items->fetch_assoc()): ?>
                        <div class="box col-4">
                            <img src="/webshop/admincp/modules/pm/uploads/<?php echo $row['anh_san_pham']; ?>">
                            <h3>
                                <?php echo $row['ten_san_pham']; ?>
                            </h3>
                            <div class="content">
                                <span>$
                                    <?php echo $row['gia_tien']; ?>
                                </span>
                                <p>Quantity: <?php echo $row['so_luong']; ?></p>
                                <!-- Các trường dữ liệu khác cũng có thể được in ra tại đây -->
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
    <?php
    include('modules/footer.php');
    ?>
</body>
</html>
