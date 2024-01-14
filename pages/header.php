
<header id="">
    <div class="container">
        <div class="row">
            <div class="nav">
                <div class="logo col-4 "><a href="">
                        <img src="./img/logo.png" alt="">
                    </a></div>
                <div class="nav_menu col-4 ">
                    <ul>
                        <a href="#home">
                            <li>HOME</li>
                        </a>
                        <a href="#about">
                            <li>ABOUT US</li>
                        </a>
                        <a href="#product">
                            <li>PRODUCT</li>
                        </a>
                        <a href="#customers">
                            <li>CUSTOMERS</li>
                        </a>
                    </ul>
                </div>
                <div class="nav_icon col-4">
                    <?php
                    require './admincp/config/connect.php';

                    if (!isset($_SESSION['ten_dang_nhap'])) {
                        echo '<a href="./admincp/login.php">Login</a>
                                   <a href="./admincp/register.php">Register</a>';
                    } else {
                        ?>
                        <a href="./admincp/cart.php"><i class='bx bx-cart-alt'></i></a>
                        <a href="./admincp/search.php"><i class='bx bx-search'></i></a>

                        <a href="./admincp/edit.php">Change profile</a>
                        <a href="./admincp/logout.php">Log out</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</header>