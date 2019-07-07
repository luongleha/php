<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <!-- Latest compiled and minified CSS & JS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <script src="//code.jquery.com/jquery.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link rel="stylesheet" href="public/css/sb-login.css">
  <link rel="stylesheet" href="online/css/animate2.css">
  <style>
  .login_block{
    linear-gradient(to bottom, #e8ff8c, #DE6262);
  }
</style>
</head>
<body>
  <section class="login-block">
    <div class="container">
      <div class="row">
        <div class="col-md-4 login-sec">
          <h2 class="text-center">Đăng Nhập</h2>
          <form class="login-form" action="?mod=login&act=login" method="POST">
            <div class="wow slideInLeft">
              <div class="form-group">
                <label for="exampleInputEmail1" class="text-uppercase">Tên đăng nhập</label>
                <input name="username" type="text" class="form-control" placeholder="">
              </div>
            </div>
            <div class="wow slideInRight">
              <div class="form-group">
                <label for="exampleInputPassword1" class="text-uppercase">Mật khẩu</label>
                <input name="password" type="password" class="form-control" placeholder="">
              </div>
            </div>

            <?php 
            if (isset($_COOKIE['dnktc'])) {?>
             <div class="wow flipInY">
               <div style="text-align: center;" class="alert alert-danger">
                 <strong>Thông báo!</strong>
                 <p><?php echo $_COOKIE['dnktc']; ?></p>
               </div>
             </div>
           <?php }?>
           
           
           <div class="form-check">
            <div class="wow slideInLeft">
              <label class="form-check-label">
                <input style="margin-top: 1%" type="checkbox" class="form-check-input">
                <small style="font-size: 110%;"> &emsp; Nhớ mật khẩu</small>
              </label>
            </div>
            <div class="wow slideInRight">
              <button type="submit" class="btn btn-login float-right">Đăng nhập</button>
            </div>
          </div>
          
        </form>
        <div class="copy-text">Created with <i class="fa fa-heart"></i> by <a href="http://grafreez.com">hasproIT</a></div>
      </div>
      <div class="col-md-8 banner-sec">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
         <!-- <ol class="carousel-indicators"> -->
          <!-- <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li> -->
            <!-- <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li> -->
              <!-- </ol> -->
              <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                  <img class="d-block img-fluid" src="https://static.pexels.com/photos/33972/pexels-photo.jpg" alt="First slide">
                  <div class="carousel-caption d-none d-md-block">
                    <div class="banner-text">
                      <h2>Đăng nhập thông tin khách hàng</h2>
                      <h5>Đăng nhập ngay để dễ dàng mua hàng và thanh toán</h5>
                    </div>  
                  </div>
                </div>
           <!--  <div class="carousel-item">
              <img class="d-block img-fluid" src="https://images.pexels.com/photos/7097/people-coffee-tea-meeting.jpg" alt="First slide">
              <div class="carousel-caption d-none d-md-block">
                <div class="banner-text">
                  <h2>This is Heaven</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
                </div>  
              </div>
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="https://images.pexels.com/photos/872957/pexels-photo-872957.jpeg" alt="First slide">
              <div class="carousel-caption d-none d-md-block">
                <div class="banner-text">
                  <h2>This is Heaven</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
                </div>  
              </div>
            </div> -->
          </div>     
          
        </div>
      </div>
    </div>
  </section>
  <script src="online/js/wow.min.js"></script>
  <script>
    new WOW().init();
  </script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="online/js/wow.min.js"></script>
  
</body>
</html>