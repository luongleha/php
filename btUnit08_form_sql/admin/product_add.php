<?php
require_once("header.php");
?>

<div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.php">Bảng điều khiển</a>
        </li>
        <li class="breadcrumb-item active">Trang chủ</li>
    </ol>

    <div class="container">
        <h3 align="center">ZENT GROUP - PHP - MYSQL</h3>
        <h3 align="center">THÊM MỚI SẢN PHẨM</h3>
        <hr>
        <form action="quanlisanpham/product_add_process.php" method="POST" role="form" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Tên sản phẩm</label>
                <input type="text" class="form-control" id="" placeholder="Nhập vào tên sản phẩm" name="name">
            </div>  
            <div class="form-group">
                <label for="">Số lượng</label>
                <input type="number" class="form-control" id="" placeholder="Nhập vào số lượng" name="quantity">
            </div>
            <div class="form-group">
                <label for="">Giá bán</label>
                <input type="number" class="form-control" id="" placeholder="Nhập vào giá bán" name="price">
            </div>
            <div class="form-group">
                <label for="">Ảnh Sản phẩm</label>
                <input type="file" class="form-control" id="" placeholder="Nhập vào địa chỉ" name="image">
            </div>
            <div class="form-group">
                <label for="">Loại Sản phẩm</label>
                <input type="text" class="form-control" id="" placeholder="Nhập vào mã loại SP" name="category_id">
            </div>
            
            <button type="submit" class="btn btn-primary">Lưu thông tin</button>
        </form>
    </div>


</div>

<?php
require_once("footer.php");
?>