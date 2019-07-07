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
        <h3 align="center">THÊM MỚI NHÂN VIÊN</h3>
        <hr>
        <form action="quanlinhanvien/employee_add_process.php" method="POST" role="form" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Tên nhân viên</label>
                <input type="text" class="form-control" id="" placeholder="Nhập vào tên nhân viên" name="name">
            </div>  
            <div class="form-group">
                <label for="">email</label>
                <input type="text" class="form-control" id="" placeholder="Nhập vào email nhân viên" name="email">
            </div>
            <div class="form-group">
                <label for="">mobile</label>
                <input type="number" class="form-control" id="" placeholder="Nhập vào mobile nhân viên" name="mobile">
            </div>
            <div class="form-group">
                <label for="">address</label>
                <input type="text" class="form-control" id="" placeholder="Nhập vào address nhân viên" name="address">
            </div>
            <div class="form-group">
                <label for="">password</label>
                <input type="text" class="form-control" id="" placeholder="Nhập vào address nhân viên" name="password">
            </div>
            
            <button type="submit" class="btn btn-primary">Lưu thông tin</button>
        </form>
    </div>
</div>

<?php
require_once("footer.php");
?>