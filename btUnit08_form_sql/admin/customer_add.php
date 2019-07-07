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
    <h3 align="center">THÊM MỚI KHÁCH HÀNG</h3>
    <hr>
        <form action="quanlikhachhang/customer_add_process.php" method="POST" role="form" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Tên khách hàng</label>
                <input type="text" class="form-control" id="" placeholder="Nhập vào tên khách hàng" name="name">
            </div>  
            <div class="form-group">
                <label for="">email</label>
                <input type="text" class="form-control" id="" placeholder="Nhập vào email khách hàng" name="email">
            </div>
            <div class="form-group">
                <label for="">mobile</label>
                <input type="number" class="form-control" id="" placeholder="Nhập vào mobile khách hàng" name="mobile">
            </div>
            <div class="form-group">
                <label for="">address</label>
                <input type="text" class="form-control" id="" placeholder="Nhập vào address khách hàng" name="address">
            </div>
            
            <button type="submit" class="btn btn-primary">Lưu thông tin</button>
        </form>
    </div>
</div>

<?php
require_once("footer.php");
?>