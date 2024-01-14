<div class="container">
    <div class="row">
        <h3>Thêm sản phẩm</h3>
        <table>
            <form method="POST" action="modules/pm/xuly.php" enctype="multipart/form-data" >
        
                <tr>
                    <td>Tên sảm phẩm</td> 
                    <td><input type="text" name="ten_san_pham" ></td>
                </tr>
                <tr>
                    <td>Ảnh sản phẩm</td>
                    <td><input type="file" name="anh_san_pham" accept=".png,.jpg" id=""></td>
                </tr>
                <tr>
                    <td>Mô tả</td>
                    <td><input type="text" name="mo_ta" ></td>
                </tr>
                <tr>
                    <td>Số lượng</td>
                    <td><input type="text" name="so_luong" ></td>
                </tr>
                <tr>
                    <td>Giá tiền</td>
                    <td><input type="text" name="gia_tien"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="addProduct" value="ADD" class="btn"></td>
                </tr>
            </form>
        </table>

    </div>
</div>