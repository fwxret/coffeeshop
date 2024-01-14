<?php
$sql_lietke_sp = "SELECT * FROM products"; 
$query_lietke_sp = mysqli_query($mysqli, $sql_lietke_sp);
?>
<div class="container">
    <div class="row">
    <h3>Liệt kê sản phẩm</h3>
<table>
    <tr>
        <th>ID</th>
        <th>Tên sản phẩm</th>
        <th>Ảnh sản phẩm</th>
        <th>Mô tả</th>
        <th>Số lượng</th>
        <th>Giá tiền</th>
        <th>Thao tác</th>
    </tr>

    <?php
    while ($row = mysqli_fetch_array($query_lietke_sp)) {
    ?>
        <tr>
            <td><?php echo $row['id_san_pham'] ?></td>
            <td><?php echo $row['ten_san_pham'] ?></td>
            <td><img src="modules/pm/uploads/<?php echo $row['anh_san_pham']?>" width="150px"></td>
            <td><?php echo $row['mo_ta'] ?></td>
            <td><?php echo $row['so_luong'] ?></td>
            <td><?php echo $row['gia_tien'] ?></td>
            <td>
                <a class="btn" href="modules/pm/xuly.php?id_san_pham=<?php echo $row['id_san_pham'] ?>">Xóa</a>  
                <a class="btn"  href="?action=quanlysanpham&query=sua&id_san_pham=<?php echo $row['id_san_pham'] ?>">Sửa</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>
    </div>
</div>

