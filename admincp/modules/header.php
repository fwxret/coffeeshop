<?php
session_start();
?>
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
                    </ul>
                   
                </div>
                <div class="nav_icon col-4">
                    
                    <?php
                    require '../admincp/config/connect.php';

                    if (!isset($_SESSION['ten_dang_nhap'])) {
                        echo '<a href="../admincp/login.php">Login</a>
                                   <a href="../admincp/register.php">Register</a>';
                    } else {
                        ?>
                        <a href="cart.php"><i class='bx bx-cart-alt'></i></a>
                        <a href="./search.php"><i class='bx bx-search'></i></a> 
                        <a href="../admincp/edit.php">Change profile</a>
                        <a href="../admincp/logout.php">Log out</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="home" id="home">
    <div class="container">
        <div class="row">
            <div class="home_title col-6">
                <h1>Start your day <br>with coffee</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis eligendi atque vel non
                    vitae nihil nostrum debitis, explicabo corporis enim doloribus at culpa nam tempore
                    quibusdam dolore eaque. Sed, numquam.</p>
                <a href="" class="btn">Shop now</a>
            </div>
            <div class="home_img col-6">
                <img src="../img/main.png" alt="">
            </div>
        </div>
    </div>
</div>