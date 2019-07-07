<?php 
	include_once('email_function.php');
	session_start();

	if (isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['address']) && isset($_POST['gioitinh'])) {
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$gioitinh = $_POST['gioitinh'];
		$address = $_POST['address'];
	}

	ob_start();
	include_once('send_email.php');
	$contents = ob_get_contents();
	ob_clean();
	send_email($email, $name, $contents, 'Thông báo đặt hàng');
	
	unset($_SESSION['cart']);
	setcookie('success', 'Thanh toán thành công! Vui lòng kiểm tra chi tiết đơn hàng trong email!', time()+3);
	// header('location: index.php');
?>