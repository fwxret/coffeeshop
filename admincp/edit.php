<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet"href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Thay đổi thông tin</title>
</head>

<body>
<header id="">
            <div class="container">
                <div class="row">
                    <div class="nav">
                        <div class="logo col-4 "><a href="">
                            <img src="../img/logo.png" alt="">
                        </a></div>
                        <div class="nav_menu col-4 ">
                        <ul>
                                <a href="login.php">
                                    <li>LOGIN</li>
                                </a>
                            </ul>
                        </div>
                        <div class="nav_icon col-4">
                            <i class='bx bx-cart-alt'></i>
                            <i class='bx bx-search' ></i>
                            <a href="edit.php">Change Profile</a>
                            <a href="logout.php">Log out</a>
                        </div>
                    </div>
                </div>
            </div>
</header>
    <div class="home">
        <div class="container">
        <div class="row">
                    <div class="col-4"></div>
                    <div class="box form-box col-4">
                        <?php
                        if (isset($_POST['submit'])) {
                            $id_nguoi_dung = $_SESSION['id_nguoi_dung'];
                            $ten_dang_nhap = $_POST['ten_dang_nhap'];
                            $mat_khau = $_POST['mat_khau'];
                            $so_dien_thoai = $_POST['so_dien_thoai'];
                            $dia_chi = $_POST['dia_chi'];
            
                            if ($ten_dang_nhap == '' || $mat_khau == '' || $dia_chi == '' || $so_dien_thoai == '') {
                                echo "<div class='message'>
                                  <p>Vui lòng điền đầy đủ thông tin đăng ký</p>
                                  <a href ='javascript: history.go(-1)'><button class='btn'>Trở lại</button></a>
                              </div><br>";
                            } else {
                                require 'config/connect.php';
                                mysqli_set_charset($conn, 'UTF8');
            
                                $sql = "UPDATE users SET ten_dang_nhap = '$ten_dang_nhap', mat_khau ='$mat_khau', so_dien_thoai = '$so_dien_thoai', dia_chi ='$dia_chi' WHERE id_nguoi_dung = '$id_nguoi_dung'";
            
                                if ($conn->query($sql) === TRUE) {
            
                                    echo "<div class='message'>
                            <p>Thông tin đã được cập nhật</p>
                            <a href='login.php'><button class='btn'>Đăng nhập</button></a>
                          </div><br>";
                                    exit();
                                } else {
                                    echo "Error: " . $sql . "<br>" . $conn->error;
                                }
            
            
                            }
                        } else {
                            // Lưu lại giá trị tên đăng nhập khi người dùng thay đổi thông tin khác
                            $ten_dang_nhap = $_SESSION['ten_dang_nhap'];
                            ?>
                            <header>Thay đổi thông tin</header>
                            <form action="" method="post">
                                <div class="field input">
                                    <label for="">Tên đăng nhập</label>
                                    <input type="text" name="ten_dang_nhap" id="ten_dang_nhap" value="<?php echo $ten_dang_nhap; ?>"
                                        
                                </div>
                                <div class="field input">
                                    <label for="">Mật khẩu</label>
                                    <input type="password" name="mat_khau" id="mat_khau">
                                </div>
                                <div class="field input">
                                    <label for="">Số điện thoại</label>
                                    <input type="text" name="so_dien_thoai" id="so_dien_thoai">
                                </div>
                                <div class="field input">
                                    <label for="">Địa chỉ</label>
                                    <input type="text" name="dia_chi" id="dia_chi">
                                </div>
                                <div class="field">
                                    <input type="submit" name="submit" value="UPDATE" class="btn">
                                </div>
                            </form>
                        <?php } ?>
                    </div>
                    <div class="col-4"></div>
                </div>
        </div>
    </div>
</body>

</html>