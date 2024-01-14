<?php
// Khai báo biến để lưu trữ điều kiện tìm kiếm
$whereClause = "";

// Kiểm tra nếu form đã được gửi và có dữ liệu từ ô tìm kiếm
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['searchProduct'])) {
    //ysqli_real_escape_string($mysqli, $_POST['searchProduct']): Hàm này thực hiện việc "escape" các ký tự đặc biệt trong chuỗi $_POST['searchProduct'], như là ' (single quote), " (double quote), \ (backslash), và nhiều ký tự khác, để chúng không được hiểu là phần của câu truy vấn SQL
    $searchTerm = mysqli_real_escape_string($mysqli, $_POST['searchProduct']);
    // Tạo điều kiện tìm kiếm dựa trên tên và mô tả
    $whereClause = " WHERE ten_san_pham LIKE '%$searchTerm%' OR mo_ta LIKE '%$searchTerm%'";
}

// Tạo câu truy vấn hoàn chỉnh
$sql_find = "SELECT * FROM products" . $whereClause;
?>

<div class="container">
    <div class="row">
        <h3>Tìm kiếm sản phẩm</h3>
        <form method="POST" action="">
            <input type="text" name="searchProduct" placeholder="Nhập từ khóa tìm kiếm" id="">
            <p></p>
            <button type="submit" class="btn">Search</button>
        </form>
    </div>
</div>

<?php
// Kiểm tra xem form đã được gửi và có kết quả hay không
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['searchProduct'])) {
    // Thực hiện truy vấn
    $result = mysqli_query($mysqli, $sql_find);

    // Kiểm tra xem có kết quả hay không
    if ($result !== false) {
        echo "<div class='container'>";
        echo "<div class='row'>";
        echo "<h3>Kết quả tìm kiếm</h3>";

        // Kiểm tra số lượng sản phẩm tìm được
        if (mysqli_num_rows($result) > 0) {
            // Duyệt qua các dòng kết quả
            while ($row = mysqli_fetch_array($result)) {
                echo "<p>ID: " . $row['id_san_pham'] . "</p>";
                echo "<p>Tên sản phẩm: " . $row['ten_san_pham'] . "</p>";
                echo "<p>Mô tả: " . $row['mo_ta'] . "</p>";
                echo "<p>Ảnh sản phẩm: <img src='modules/pm/uploads/{$row['anh_san_pham']}' width='150px' alt='Ảnh sản phẩm'></p>";
                // Các trường dữ liệu khác cũng có thể được in ra tại đây
                echo "<hr>";
            }
        } else {
            echo "<p>Không tìm thấy sản phẩm.</p>";
        }

        echo "</div>";
        echo "</div>";
    } else {
        echo "Lỗi truy vấn: " . mysqli_error($mysqli);
    }
}
?>
