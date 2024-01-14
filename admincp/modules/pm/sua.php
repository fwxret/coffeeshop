<?php
$sql_sua_sp = "SELECT * FROM products WHERE id_san_pham='$_GET[id_san_pham]' LIMIT 1";
$query_sua_sp = mysqli_query($mysqli, $sql_sua_sp);

// Lấy dữ liệu từ kết quả truy vấn
$row = mysqli_fetch_array($query_sua_sp);
?>

<div class="container">
    <div class="row">
    <h3>Sửa sản phẩm</h3>
<table>
    <form method="POST" action="modules/pm/xuly.php?id_san_pham=<?php echo $_GET['id_san_pham']?>" enctype="multipart/form-data" >
        <tr>
            <td>ID</td> 
            <td><input value="<?php echo $row['id_san_pham'] ?>"  type="text" name="id_san_pham" readonly  ></td>
        </tr>
        <tr>
            <td>Tên sảm phẩm</td> 
            <td><input value="<?php echo $row['ten_san_pham'] ?>"  type="text" name="ten_san_pham" ></td>
        </tr>
        <tr>
            <td>Ảnh sản phẩm</td> 
            <td><input type="file" name="anh_san_pham" id="">
            <img src="modules/pm/uploads/<?php echo $row['anh_san_pham']?>" width="150px"> 
            </td>
        </tr>
        <tr>
            <td>Mô tả</td>
            <td><input value="<?php $row['mo_ta']?>"  type="text" name="mo_ta" ></td>
        </tr>
        <tr>
            <td>Số lượng</td>
            <td><input value="<?php $row['so_luong']?>" type="text" name="so_luong" ></td>
        </tr>
        <tr>
            <td>Giá tiền</td>
            <td><input  value="<?php echo $row['gia_tien']?>"  type="text" name="gia_tien"></td>
        </tr>
        <tr>
            <td><input type="submit" name="changeProduct" value="CHANGE" class="btn"></td>
        </tr>
    </form>
</table>
    </div>
</div>
