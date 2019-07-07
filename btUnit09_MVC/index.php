<?php 
$mod = isset($_GET['mod'])?$_GET['mod']:'';
$act = isset($_GET['act'])?$_GET['act']:'';

switch ($mod) {
	case 'employee':
	require_once 'controllers/EmployeeController.php';
	$employee_controller = new EmployeeController();
	switch ($act) {
		case 'list':
		$employee_controller->list();
		break;
		case 'detail':
		$employee_controller->detail();
		break;
		case 'add':
		$employee_controller->add();
		break;
		case 'add_process':
		$employee_controller->add_process();
		break;

		default:
		echo "<h4> action - 404 </h4>";
		break;
	}
	break;
	default:
	echo "<h4> Module - 404 </h4>";
	break;

}
?>