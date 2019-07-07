<?php 

require_once('models/Employee.php');
class UserController{
	public function formlogin(){
		if (isset($_SESSION['employee'])) {
			header('location: ?mod=employee&act=list');
		}else{
			require_once('views/User/Login.php');
		}
	}
	public function login(){
		$email = isset($_POST['username'])? $_POST['username']: '' ;
		$password = isset($_POST['password'])? $_POST['password']: '' ;
		$employee = new Employee();
		$result = $employee->check($email , $password);
		if ($result!=null) {
			$_SESSION['employee']=$result;
			$_SESSION['isLogin']=1;
			setcookie('dntc', 'Đăng nhập thành công', time()+1);
			header('location: ?mod=employee&act=list');
		}
		else{
			setcookie('dnktc', 'Đăng nhập thất bại', time()+3);
			header('location: ?mod=user&act=formlogin');
		}
	} 
	public function logout(){
	session_destroy();
	header('location: ?mod=user&act=formlogin');
}
}

?>