<?php 

require_once('models/Customer.php');
class LoginController{
	public function formlogin(){
		// if (isset($_SESSION['customer'])) {
		// 	header('location: ?mod=employee&act=list');
		// }else{
			require_once('views/User/LoginOnline.php');
		// }
	}
	public function login(){
		$email = isset($_POST['username'])? $_POST['username']: '' ;
		$password = isset($_POST['password'])? $_POST['password']: '' ;
		// echo $email;
		// die;
		$customer = new Customer();
		$result = $customer->check($email ,$password);
		// var_dump($result);
		if($result === NULL){
				setcookie('dnktc', 'Đăng nhập không thành công !', time()+3);
				header('Location: ?mod=login&act=formlogin');
			}else{
				setcookie('dntc', 'Đăng nhập thành công !', time()+1);
				$_SESSION['loginOnline'] = true;
				$_SESSION['customer']=$result;
				header('Location:?mod=online&act=sent');
			}	
	} 
	public function logout(){
	session_destroy();
	header('location: ?mod=login&act=formlogin');
}
}

?>