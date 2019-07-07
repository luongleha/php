<?php 
	require_once('models/Employee.php');
	require_once('function.php');
	class EmployeeController{
		var $employee_connection;

		function __construct(){
			$this->employee_connection = new Employee();
		}
		public function list(){
			$employees = $this->employee_connection->All();
			require_once('views/employee/list.php');
		}
		public function detail(){
			$id = $_GET['id'];
			$employee = $this->employee_connection->find($id);
			echo json_encode($employee);
		}
		public function add(){
			include_once('views/employee/add.php');
		}
		public function store(){
			$file = upload_file ('image');
			$data = $_POST;
			$data['image'] = $file;
			$status = $this->employee_connection->create($data);

			if ($status == true) {
				setcookie('add','Thêm nhân viên thành công !', time() + 5);
				header('Location: index.php?mod=employee&act=list');
			}else{
				setcookie('msg','Thêm chưa thành công! Vui lòng thử lại...',time() + 5);
				header('Location: index.php?mod=employee&act=list');
			}
		}
		public function edit(){
			$id = $_GET['id'];
			$employee = $this->employee_connection->find($id);
			include_once('views/employee/edit.php');
		}
		public function update(){
			$id = $_GET['id'];
			$data = $_POST;
			$image = upload_file('image');
			$image != ""?$data['image'] = $image : $data['image'] = "";
			$status = $this->employee_connection->update($data, $id);
			if ($status == true) {
				setcookie('add','Cập nhật nhân viên thành công !', time() + 5);
				header('Location: index.php?mod=employee&act=list');
			}else{
				setcookie('msg','Cập nhật chưa thành công! Vui lòng thử lại...',time() + 5);
				header('Location: index.php?mod=employee&act=list');
			}
		}
		public function delete(){
			$id = $_GET['id'];
			$status = $this->employee_connection -> delete($id);
			if($status == true){
			setcookie('add', 'Xóa nhân viên thành công !', time()+3);
			header('location: index.php?mod=employee&act=list');
			}else{
			setcookie('msg', 'Xóa nhân viên ko thành công !', time()+3);
			header('location: index.php?mod=employee&act=list');
			}
		}
		public function error(){
			echo "<h4> Action - 404 </h4>";
		}
		public function profile(){
		// $id = $_GET['id'];
		// 	$employee = $this->employee_connection->find($id);
			require_once('views/employee/profile.php');
		}
	}

?>