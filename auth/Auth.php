<?php 
 class Auth{
 	public function check_login(){
 		if (!isset($_SESSION['isLogin'])) {
 			header('location: ?mod=user&act=formlogin');
 		}
 	}
 }

 ?>