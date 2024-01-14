<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php
    session_start();
    require 'config/connect.php';
    if (!isset($_SESSION['ten_dang_nhap'])) {
        // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
        echo "<div class='message'>
                <p>Bạn chưa đăng nhập </p>
                <a href='login.php'><button class='btn'>Đăng nhập</button></a>
              </div><br>";
        exit();
    } else {
        $ten_dang_nhap = $_SESSION['ten_dang_nhap'];
        $sql = "SELECT * FROM users WHERE ten_dang_nhap = '$ten_dang_nhap'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $_SESSION['ten_dang_nhap'] = $ten_dang_nhap;
            $_SESSION['id_nguoi_dung'] = $row['id_nguoi_dung'];
            $_SESSION['role'] = $row['role']; // Lưu quyền hạn vào session 
    
            $role = $_SESSION['role'];
            if ($role == 'admin') {
                header('Location: ../admincp/index.php');
                // echo"<a href='index.php'><button class='btn'>Trang chủ</button></a>";
                
            } elseif ($role == 'user') {
                // echo"<a href='../index.php'><button class='btn'>Trang chủ</button></a>";
                header('Location: ../index.php');
                exit();
                
            }
        } else {
            // Không tìm thấy thông tin user, có thể xử lý hoặc chuyển hướng về trang đăng nhập
            header("Location: login.php");
            exit;
        }
    }
        ?>