<?php
require_once("header.php");
?>

<?php 

    include_once 'connect.php';
    $id = $_GET['id'];
    // Cau lenh truy van co so du lieu

    $query = "SELECT * FROM employees WHERE id=".$id;

    $result = $conn->query($query);

    $employee = $result->fetch_assoc(); 

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
    <h3 align="center">CHỈNH SỬA THÔNG TIN NHÂN VIÊN</h3>
    <hr>
        <form action="quanlinhanvien/employee_edit_process.php" method="POST" role="form" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">MÃ nhân viên</label>
                 <input type="hidden" class="form-control" id="" placeholder="Nhập vào mã khách hàng" name="id" value="<?php echo $employee['id']; ?>">
            </div>  
            <div class="form-group">
                <label for="">Tên nhân viên</label>
                <input type="text" class="form-control" id="" placeholder="Nhập vào tên khách hàng" name="name" value="<?php echo $employee['name']; ?>">
            </div>  
            <div class="form-group">
                <label for="">email</label>
                <input type="text" class="form-control" id="" placeholder="Nhập vào email khách hàng" name="email" value="<?php echo $employee['email']; ?>">
            </div>
            <div class="form-group">
                <label for="">mobile</label>
                <input type="number" class="form-control" id="" placeholder="Nhập vào mobile khách hàng" name="mobile" value="<?php echo $employee['mobile']; ?>">
            </div>
            <div class="form-group">
                <label for="">address</label>
                <input type="text" class="form-control" id="" placeholder="Nhập vào address khách hàng" name="address" value="<?php echo $employee['address']; ?>">
            </div>
            <div class="form-group">
                <label for="">password</label>
                <input type="text" class="form-control" id="" placeholder="Nhập vào password khách hàng" name="password" value="<?php echo $employee['password']; ?>">
            </div>
            
            <button type="submit" class="btn btn-primary">Lưu thông tin</button>
        </form>
    </div>
</div>

<?php
require_once("footer.php");
?>