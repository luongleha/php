<?php
session_start();
require_once 'check/auth.php';

$mod = isset($_GET['mod'])?$_GET['mod']:'';
$act = isset($_GET['act'])?$_GET['act']:'';


$auth = new auth();
			if (!$mod && !$act ) {
			$mod='online';
			$act='index';
			
				}
switch ($mod) {

	case 'login':
			require_once('controllers/LoginController.php');
			$User_Controller = new LoginController();
			switch ($act) {
				case 'formlogin':
				$User_Controller->formlogin();
				break;
				case 'login':
				$User_Controller->login();
				break;
				case 'logout':
				$User_Controller->logout();
				break;

				default:
				echo "<h4> action - 404 </h4>";
				break;
			}
			break;

	case 'online':
			// $auth->check_login();
			require_once('controllers/OnlineController.php');
			$obj = new OnlineController();
			switch ($act) {
					case 'index':
						$obj->index();
						break;
					case 'shop':
						$obj->shop();
						break;
					case 'check':
						$obj->check();
						break;
					case 'cart':
						$obj->cart();
						break;
					case 'detail':
						$obj->detail();
						break;
					case 'add2cart':
						$obj->add2cart();
						break;
					case 'delete':
						$obj->delete();
						break;
					case 'sent':
						$obj->sent();
						break;
					case 'ca':
						$obj->ca();
						break;
					case 'buy':
						$obj->buy();
						break;
					case 'profile':
						$obj->profile();
						break;
					case 'unset':
						$obj->unset();
						break;
					default:
						# code...
						break;
				}

				break;


	case 'product':
			$auth->checkLogin();
			require_once 'controllers/ProductController.php';
			$product_Controller = new ProductController();
			switch ($act) {
				case 'list':
					$product_Controller->list();
				break;
				case 'detail':
					$product_Controller->detail();
				break;
				case 'add':
					$product_Controller->add();
				break;
				case 'store':
					$product_Controller->store();
				break;
				case 'delete':
					$product_Controller->delete();
				break;
				case 'update':
					$product_Controller->update();
				break;
				case 'edit':
					$product_Controller->edit();
				break;

				default:
				echo "<h4> action - 404 </h4>";
				break;
			}
			break;

	case 'employee':

			// var_dump($_SESSION['isLogin']) ; die;
			// session_destroy();
			$auth->checkLogin();
			require_once('controllers/EmployeeController.php');
			$employee_Controller = new EmployeeController();
			switch ($act) {
				case 'list':
					$employee_Controller->list();
				break;
				case 'detail':
					$employee_Controller->detail();
				break;
				case 'add':
					$employee_Controller->add();
				break;
				case 'store':
					$employee_Controller->store();
				break;
				case 'delete':
					$employee_Controller->delete();
				break;
				case 'update':
					$employee_Controller->update();
				break;
				case 'edit':
					$employee_Controller->edit();
				break;
				case 'profile':
					$employee_Controller->profile();
				break;


				default:
				echo "<h4> action - 404 </h4>";
				break;
			}
			break;

	case 'customer':
			$auth->checkLogin(); 
			require_once 'controllers/CustomerController.php';
			$customer_Controller = new CustomerController();
			switch ($act) {
				case 'list':
					$customer_Controller->list();
				break;
				case 'detail':
					$customer_Controller->detail();
				break;
				case 'add':
					$customer_Controller->add();
				break;
				case 'store':
					$customer_Controller->store();
				break;
				case 'delete':
					$customer_Controller->delete();
				break;
				case 'update':
					$customer_Controller->update();
				break;
				case 'edit':
					$customer_Controller->edit();
				break;

				default:
				echo "<h4> action - 404 </h4>";
				break;
			}
			break;

	case 'user':
	

			require_once('controllers/UserController.php');
			$User_Controller = new UserController();
			switch ($act) {
				case 'formlogin':
				$User_Controller->formlogin();
				break;
				case 'login':
				$User_Controller->login();
				break;
				case 'logout':
				$User_Controller->logout();
				break;

				default:
				echo "<h4> action - 404 </h4>";
				break;
			}
			break;


	case 'sale':
			include_once('controllers/SaleController.php');
			$obj = new SaleController();
			switch ($act) {
				case 'purchase':
					$obj->purchase();
				break;
				case 'sale':
					$obj->sale();
					break;
				case 'tru':
					$obj->tru();
					break;
				case 'deletebill':
					$obj->deletebill();
					break;
				case 'hand':
					$obj->hand();
					break;
				case 'cart':
					$obj->add2cart();
				break;
				case 'delete':
					$obj->delete();
				break;
				case 'payment':
					$obj->payment();
				break;
				case 'detail':
					$obj->billdetail();
				break;
				case 'customer':
					$obj->customer();
				break;
				case 'unset':
					$obj->unset();	
				break;
				case 'send_mail':
					$obj->send_mail();	
				break;
				default:
					echo "Not 404";
				break;
			} 


	break;


	default:
	// require 'views/User/Login.php';
	break;

}
?>