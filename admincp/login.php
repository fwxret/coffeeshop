<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/main.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="../js/main.js">
  <title>Login</title>
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
                                <a href="../index.php">
                                    <li>HOME</li>
                                </a>
                                <a href="register.php">
                                    <li>REGISTER</li>
                                </a>
                            </ul>
                        </div>
                        <div class="nav_icon col-4">
                            <i class='bx bx-cart-alt'></i>
                            <i class='bx bx-search' ></i>
                            
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
             // Lấy thông tin đăng nhập từ form
           
             require 'config/connect.php';
     
             $ten_dang_nhap = $_POST['ten_dang_nhap'];
             $mat_khau = $_POST['mat_khau'];
     
             $sql = "SELECT ten_dang_nhap,mat_khau FROM users WHERE ten_dang_nhap ='$ten_dang_nhap'";
     
             $result = $conn->query($sql);
     
             if ($result->num_rows == 0) {
               echo " <div class='message'>
                           <p>Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại</p>
                           <a href ='javascript: history.go(-1)'><button class='btn'>Trở lại</button></a>
                           </div><br>";
               exit;
             }
     
             $row = $result->fetch_assoc();
     
             if ($mat_khau == $row['mat_khau']) {
               // Mật khẩu đúng
               $_SESSION['ten_dang_nhap'] = $ten_dang_nhap;
               echo "<div class='message'>
                     <p>Xin chào $ten_dang_nhap. Bạn đã đăng nhập thành công</p>
                     <a href='nav.php'><button class='btn'>Trang chủ</button></a>
                   </div><br>";
               exit;
             } else {
               // Mật khẩu sai
               echo "<div class='message'>
                     <p>Mật khẩu không đúng. Vui lòng kiểm tra lại</p>
                     <a href='javascript: history.go(-1)'><button class='btn'>Trở lại</button></a>
                   </div><br>";
               exit;
             }
           }
           ?>
           <header>Đăng nhập</header>
           <form action="" method="post">
             <div class="field input">
               <label for="">Tên đăng nhập</label>
               <input type="text" name="ten_dang_nhap" id="ten_dang_nhap">
             </div>
     
             <div class="field input">
               <label for="">Mật khẩu</label>
               <input type="password" name="mat_khau" id="mat_khau">
             </div>
     
             <div class="field">
     
               <input type="submit" name="submit" value="LOGIN" class="btn" >
             </div>
             <div class="links">
               Bạn chưa có tài khoản? <a href="register.php">Đăng kí</a>
             </div>
           </form>
     
         </div>
         <div class="col-4"></div>
       </div>
  </div>
</div>
</body>
</html>