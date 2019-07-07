
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>PHP MySQL Admin</title>

  <!-- Custom fonts for this template-->
  <link href="public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="public/css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body>
  <?php 
  require_once('views/layout/header.php');
  ?>
  <div id="content-wrapper">
    <div class="container-fluid">
      <ol class="breadcrumb" style="margin-top: 78px; margin-left: 206px;">
        <li class="breadcrumb-item">
          <a href="index.php">Trang Chủ</a>
        </li>
        <li class="breadcrumb-item active">Nhân Viên</li>
      </ol>
    </div>
  </div>
  <div class="container" style="margin-left: 206px;">
    <form action="?mod=employee&act=store" method="POST" role="form" enctype="multipart/form-data">
      <h2 align="center">Thêm Nhân viên</h2>
      <?php 
      if (isset($_COOKIE['add'])) {
        ?> 
        <div class="alert alert-success">
          <strong>Thông báo: </strong> <?php  echo $_COOKIE['add']; ?>
        </div>
      <?php } ?>
      <!-- <div class="form-group">
        <label for=""><b>Mã nhân viên</b></label>
        <input type="text" class="form-control" id="" placeholder="Nhập mã nhân viên" name="id" required="">
      </div>    -->         
      <div class="form-group">
        <label for=""><b>Tên nhân viên</b></label>
        <input type="text" class="form-control" id="" placeholder="Nhập tên nhân viên" name="name" required="">
      </div>  

      <div class="form-group">
        <label for=""><b>Email</b></label>
        <input type="email" class="form-control" id="" placeholder="Nhập vào email" name="email" required="">
      </div>  

      <div class="form-group">
        <label for=""><b>Số điện thoại</b></label>
        <input type="text" class="form-control" id="" placeholder="Nhập vào số điện thoại" name="mobile" required="">
      </div>  
      <div class="form-group">
        <label for=""><b>Địa chỉ</b></label>
        <input type="text" class="form-control" id="" placeholder="Nhập vào địa chỉ" name="address" required="">
      </div>  
        <div class="form-group">
        <label for=""><b>PassWord</b></label>
        <input type="password" class="form-control" id="" placeholder="Nhập vào địa chỉ" name="password" required="">
      </div>  
      <div class="form-group">
        <label for=""><b>Ảnh nhân viên</b></label>
        <input type="file" class="form-control" id="" placeholder="" name="image" accept="image/*" onchange="loadFile(event)">
        <img  id="output" alt="" width = "100px" height = "100px">
        <script>
          var loadFile = function(event){
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
          };
        </script>
      </div>
      <button type="submit" class="btn btn-primary">Save</button>
      <a href="?mod=employee&act=list" title="" class="btn btn-primary" style="float: right">Back</a>
    </form>
  </div>

  <?php 
  require_once('views/layout/footer.php');
  ?>