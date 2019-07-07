<?php 
require_once('models/Employee.php');
class EmployeeController{

	public function list(){
		$employee_model = new employee();
		$employees = $employee_model->All();
		require_once('views/employee/list.php');
	}
	public function detail(){
		$id =$_GET['id'];
		$model_employee = new Employee();
		$employee = $model_employee ->find($id);
		echo json_encode($employee);
	}
	public function add(){
		require_once('views/employee/add.php');
	}
	public function add_process(){
		echo "addprocess";
	}
	public function error(){
		echo "<h4>Action - 404</h4>";
	}
}

?>