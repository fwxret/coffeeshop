<?php
include "../../config/connect.php";
$ten_san_pham = $_POST['ten_san_pham'];
$anh_san_pham = $_FILES['anh_san_pham']['name'];
$anh_san_pham_tmp = $_FILES['anh_san_pham']['tmp_name'];
$anh_san_pham = time() . '' .$anh_san_pham;
$mo_ta = $_POST['mo_ta'];
$so_luong = $_POST['so_luong'];
$gia_tien = $_POST['gia_tien'];

if (isset($_POST['addProduct'])) {
  $sql_add = "INSERT INTO products (ten_san_pham, anh_san_pham, mo_ta, so_luong, gia_tien)  VALUES ('" . $ten_san_pham . "','" . $anh_san_pham . "','" . $mo_ta . "','" . $so_luong . "','" . $gia_tien . "') ";
  mysqli_query($mysqli,$sql_add);
  move_uploaded_file($anh_san_pham_tmp, 'uploads/' . $anh_san_pham);
  header('Location: ../../index.php?action=quanlysanpham&query=them');
} elseif(isset($_POST['changeProduct'])){
  if($_POST['anh_san_pham']){
    $sql_update = "UPDATE products SET ten_san_pham = '".$ten_san_pham."', anh_san_pham = '".$anh_san_pham."', mo_ta = '".$mo_ta."', so_luong = '".$so_luong."', gia_tien = '".$gia_tien."' WHERE id_san_pham = " . $_GET['id_san_pham'];
  }else{
    $sql_update = "UPDATE products SET ten_san_pham = '".$ten_san_pham."', mo_ta = '".$mo_ta."', so_luong = '".$so_luong."', gia_tien = '".$gia_tien."' WHERE id_san_pham = " . $_GET['id_san_pham'];
  }
  mysqli_query($mysqli,$sql_update);
  header('Location: ../../index.php?action=quanlysanpham&query=them');
}
else {
  $id = $_GET['id_san_pham'];
  $sql = "SELECT * FROM products WHERE id_san_pham = '.$id.' LIMIT 1";
  $query = mysqli_query($mysqli,$sql);
  while($row = mysqli_fetch_array($query)){
    unlink('uploads/' .$row['anh_san_pham']);
  } 
  $sql_xoa = "DELETE FROM products WHERE id_san_pham = '".$id."' ";
  mysqli_query($mysqli,$sql_xoa);
  header('Location: ../../index.php?action=quanlysanpham&query=them');
}
?>