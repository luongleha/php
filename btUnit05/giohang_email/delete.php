<?php 
session_start();
$MaSP = $_GET['MaSP'];
if ($_SESSION['cart'][$MaSP]['SoLuong'] > 1) {
	$_SESSION['cart'][$MaSP]['SoLuong']--;
	setcookie('remove','Xóa bớt một sản phẩm thành công !', time()+3);
}
else{
	unset($_SESSION['cart'][$MaSP]);
	setcookie('unset','Xóa sản phẩm thành công !', time()+3);
}

header('location: cart.php');
?>