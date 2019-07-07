<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Form</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <form action="info_post.php" method="POST" role="form">
            <h2 align="center">ZENT GROUP - PHP - Gui du lieu nguoi dung POST</h2>
            <div class="form-group">
                <label for="">Ma sinh vien</label>
                <input required="phai nhap" type="text" class="form-control" id="id" placeholder="Nhap ma sinh vien" name="id">
            </div>
            
            <div class="form-group">
                <label for="">Ha va ten</label>
                <input required="phai nhap" type="text" class="form-control" id="name" placeholder="Nhap ho ten" name="name">
            </div>  
            
            <div class="form-group">
                <label for="">So dien thoai</label>
                <input required="phai nhap" type="text" class="form-control" id="phone" placeholder="Nhap so dien thoai" name="phone">
            </div>  

            <div class="form-group">
                <label for="">Email</label>
                <input required="phai nhap" type="email" class="form-control" id="email" placeholder="Nhap email" name="email">
            </div>  
            <div class="form-group">
                <label>Gioi tinh: </label>
                <input type="radio" name="gioiTinh" value="Nam" placeholder="" checked="">Nam
                <input type="radio" name="gioiTinh" value="Nữ" placeholder="">Nu
                <input type="radio" name="gioiTinh" value="Unisex" placeholder="">Unisex
            </div>
            <div class="form-group">
                <label for="">Dia chi</label>
                <input required="phai nhap" type="text" class="form-control" id="address" placeholder="Nhap dia chi" name="address">
            </div>  
            <button type="submit" class="btn btn-primary">Luu thong tin</button>
        </form>
    </div>
</body>
</html>