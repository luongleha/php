<?php
//cấu hình thông tin do google cung cấp
$api_url     = 'https://www.google.com/recaptcha/api/siteverify';
$site_key    = '6Ldx7KQUAAAAAOoPm-5fceLuI-L8jLobRmjUF_QO';
$secret_key  = '6Ldx7KQUAAAAAKoL6GTPfwdqOQXh4iZZvWXmmpAB';
//kiem tra submit form
if(isset($_POST['send']))
{
    //lấy dữ liệu được post lên
    $site_key_post    = $_POST['g-recaptcha-response'];
      
    //lấy IP của khach
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $remoteip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $remoteip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $remoteip = $_SERVER['REMOTE_ADDR'];
    }
     
    //tạo link kết nối
    $api_url = $api_url.'?secret='.$secret_key.'&response='.$site_key_post.'&remoteip='.$remoteip;
    //lấy kết quả trả về từ google
    $response = file_get_contents($api_url);
    //dữ liệu trả về dạng json
    $response = json_decode($response);
    if(!isset($response->success))
    {
        echo '<script language="javascript">';
        echo 'alert("Please check to captcha!")';
        echo '</script>';
    }
    if($response->success == true)
    {
        header('location: email_process.php');
    }else{
        echo '<script language="javascript">';
        echo 'alert("Please check to captcha!")';
        echo '</script>';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Thông tin khách hàng</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js?hl=vi"></script>
</head>
<body>
    <div class="container">
        <form action="" method="POST" role="form">
            <h2 align="center">THÔNG TIN KHÁCH HÀNG</h2>      
            <div class="form-group">
                <label for="">Họ và tên</label>
                <input type="text" class="form-control" id="" placeholder="Nhập họ và tên" name="name" required="">
            </div>  
            
            <div class="form-group">
                <label for="">Số điện thoại</label>
                <input type="text" class="form-control" id="" placeholder="Nhập vào số điện thoại" name="phone" required="">
            </div>  

            <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" id="" placeholder="Nhập vào email" name="email" required="">
            </div> 
            <div class="form-group">
                <label>Giới tính: </label>
                <input type="radio" name="gioitinh" value="Nam" placeholder="" checked="">Nam
                <input type="radio" name="gioitinh" value="Nữ" placeholder="">Nữ
                <input type="radio" name="gioitinh" value="Other" placeholder="">Other
            </div>
            <div class="form-group">
                <label for="">Địa chỉ</label>
                <input type="text" class="form-control" id="" placeholder="Nhập vào địa chỉ" name="address" required="">
            </div>  
            <div class="g-recaptcha" data-sitekey="<?php echo $site_key?>"></div>
            <br>
            <form action="send_email.php" method="post">
            <button type="submit" class="btn btn-primary" name="send">Thanh Toán</button>
            </form>
        </form>
    </div>
</body>
</html>