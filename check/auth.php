<?php 
	
	// die;
	include_once('controllers/OnlineController.php');



	class auth {
		function checkLogin(){

			if(!isset($_SESSION['isLogin'])){

				header('location:?mod=user&act=formlogin');
			}
		} 
		function checkLoginOnline(){


			if(!isset($_SESSION['loginOnline'])){

				header('location:?mod=login&act=index');
			}
			else {
				$id=$_GET['id'];
				
				$add = new OnlineController();
				$add->addcart($id);

				header('location:?mod=online&act=product');
			}
		} 
	}
 ?>