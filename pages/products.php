<?php

// Kết nối đến cơ sở dữ liệu và thực hiện truy vấn để lấy danh sách sản phẩm
$mysqli = new mysqli("localhost", "root", "", "banhang");
$sql_products = "SELECT * FROM products";
$result_products = $mysqli->query($sql_products);// thực hiện truy vấn với MySQL
?>
<div class="product" id="product">
    <div class="container">
        <div class="row">
            <div class="heading col-12">
                <h2>Our product popular</h2>
            </div>
            <div class="product_combo row">
                <?php while ($row = $result_products->fetch_assoc()): ?>
                    <div class="box col-4">
                        <img src="/webshop/admincp/modules/pm/uploads/<?php echo $row['anh_san_pham']; ?>">
                        <h3>
                            <?php echo $row['ten_san_pham']; ?>
                        </h3>
                        <div class="content">
                            <span>$
                                <?php echo $row['gia_tien']; ?>
                            </span>
                            <form method="post" action="/webshop/admincp/cart.php">
                                <input type="hidden" name="product_id" value="<?php echo $row['id_san_pham']; ?>">
                                <button type="submit"  class="btn" >Add to Cart</button>
                            </form>
                        </div>
                    </div>
                <?php endwhile;?>
            </div>
        </div>
    </div>
</div>
