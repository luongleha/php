<?php 
session_start();
$MaSP = $_GET['MaSP'];
unset($_SESSION['cart'][$MaSP]);
setcookie('unset','Xóa sản phẩm thành công !', time()+3);
header('location: cart.php');
?>