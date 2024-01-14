<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/main.css">
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <title>Register</title>
 <script>
  // Đảm bảo rằng toàn bộ DOM đã được tải xong trước khi thực hiện mã JavaScript
  document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector("form");
  const passwordInput = document.querySelector("#mat_khau");
  const phoneNumberInput = document.querySelector("#so_dien_thoai");
  const usernameInput = document.querySelector("#ten_dang_nhap");
  
  // Biến để kiểm tra tính hợp lệ của mật khẩu
  let passwordValid = false;
  // Sự kiện khi người dùng nhập vào ô mật khẩu
  passwordInput.addEventListener("input", function () {
  // Thiết lập trạng thái mật khẩu là không hợp lệ khi người dùng nhập ít hơn 6 ký tự
    passwordValid = passwordInput.value.length >= 6;
  });
   // Sự kiện khi người dùng rời khỏi ô mật khẩu
  passwordInput.addEventListener("blur", function () {
    if (!passwordValid) {
      alert("Mật khẩu phải có ít nhất 6 kí tự.");
    }
  });
   // Sự kiện khi người dùng nhấn nút gửi form
  form.addEventListener("submit", function (event) {
    const password = passwordInput.value;
    const phoneNumber = phoneNumberInput.value;
    const username = usernameInput.value;

    // Kiểm tra xem có kí tự có rỗng không 
    // trim() loại bỏ khoảng trắng ở cả 2 đầu
    if (password.trim() === '' || phoneNumber.trim() === '' || username.trim() === '') {
      alert("Vui lòng nhập đầy đủ thông tin.");
      event.preventDefault(); //giúp ngăn chặn hành vi mặc định của sự kiện, giữ lại quyền kiểm soát và cho phép bạn xử lý sự kiện theo cách bạn mong muốn
      return;
    }

    if (password.length < 6) {
      alert("Mật khẩu phải có ít nhất 6 kí tự.");
      event.preventDefault();
      return;
    }

    if (phoneNumber.length !== 10 || isNaN(phoneNumber)) {
      alert("Số điện thoại phải có đúng 10 kí tự và là số.");
      event.preventDefault();
      return;
    }

    if (/\s/.test(username)) {
      alert("Tên đăng nhập không được chứa dấu cách.");
      event.preventDefault();
      return;
    }
  });

  // Code để xử lý hiển thị mật khẩu

  //Đặt tên biến cho class showPassword
  const showPasswordIcon = document.querySelector(".showPassword");
  //Sự kiện click được thêm vào showPasswordIcon
  showPasswordIcon.addEventListener("click", function () {
    // Toggle password visibility
    passwordInput.type = passwordInput.type === "password" ? "text" : "password";
    // Nếu mật khẩu đang có kiểu là 'password' chuyển thành 'text' và ngược lại
  });

  // Code để kiểm tra khi người dùng rời khỏi ô nhập liệu
  passwordInput.addEventListener("blur", function () {
    if (passwordValid) {
      alert("Mật khẩu đã được nhập thành công!");
    }
  });
});

</script>




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
              <a href="login.php">
                <li>LOGIN</li>
              </a>
            </ul>
          </div>
          <div class="nav_icon col-4">
            <i class='bx bx-cart-alt'></i>
            <i class='bx bx-search'></i>
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
          <header>Đăng kí</header>
          <?php
          

          if (isset($_POST['submit'])) {
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

              $sql = "INSERT INTO users (ten_dang_nhap, mat_khau, so_dien_thoai, dia_chi) VALUES ('$ten_dang_nhap', '$mat_khau', '$so_dien_thoai', '$dia_chi')";

              if ($conn->query($sql) === TRUE) {
                // Lưu thông tin vào session
                $_SESSION['ten_dang_nhap'] = $ten_dang_nhap;

                echo "<div class='message'>
                    <p>Bạn đã đăng ký thành công</p>
                    <a href ='login.php'><button class='btn'>Đăng Nhập</button></a>
                </div><br>";
              } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
              }
            }
          } else {
            ?>
            <form action="" method="post">
              <div class="field input">
                <label for="">Tên đăng nhập</label>
                <input type="text" name="ten_dang_nhap" id="ten_dang_nhap">
              </div>

              <div class="field input"  >
                <label for="">Mật khẩu</label>
                <input type="password" name="mat_khau" id="mat_khau">
                <i class='bx bx-low-vision showPassword '></i>                
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

                <input type="submit" name="submit" value="REGISTER" class="btn">
              </div>
              <div class="links">
                Bạn đã có tài khoản? <a href="login.php">Đăng nhập</a>
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