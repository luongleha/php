<?php
require_once("header.php");
?>


<?php 

    include_once 'connect.php';
    $id = $_GET['id'];
    // Cau lenh truy van co so du lieu

    $query = "SELECT * FROM customers WHERE id=".$id;

    $result = $conn->query($query);

    $customer = $result->fetch_assoc(); 

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
    <h3 align="center">CHỈNH SỬA THÔNG TIN KHÁCH HÀNG</h3>
    <hr>
        <form action="quanlikhachhang/customer_edit_process.php" method="POST" role="form" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">MÃ khách hàng</label>
                 <input type="hidden" class="form-control" id="" placeholder="Nhập vào mã khách hàng" name="id" value="<?php echo $customer['id']; ?>">
            </div>  
            <div class="form-group">
                <label for="">Tên Khách hàng</label>
                <input type="text" class="form-control" id="" placeholder="Nhập vào tên khách hàng" name="name" value="<?php echo $customer['name']; ?>">
            </div>  
            <div class="form-group">
                <label for="">email</label>
                <input type="text" class="form-control" id="" placeholder="Nhập vào email khách hàng" name="email" value="<?php echo $customer['email']; ?>">
            </div>
            <div class="form-group">
                <label for="">mobile</label>
                <input type="number" class="form-control" id="" placeholder="Nhập vào mobile khách hàng" name="mobile" value="<?php echo $customer['mobile']; ?>">
            </div>
            <div class="form-group">
                <label for="">address</label>
                <input type="text" class="form-control" id="" placeholder="Nhập vào address khách hàng" name="address" value="<?php echo $customer['address']; ?>">
            </div>
            
            <button type="submit" class="btn btn-primary">Lưu thông tin</button>
        </form>
    </div>
</div>

<?php
require_once("footer.php");
?>