<?php 
class employee{
	// Thong so ket noi CSDL
	public function All(){
		require_once('Connection.php');

	// Cau lenh truy van co so du lieu

		$query = "SELECT * FROM employees";

		$result = $conn->query($query);

		$employees = array();

		while($row = $result->fetch_assoc()) {
			$employees[]=$row;
		}
		return $employees;
	}
	public function find($id){
		require_once('Connection.php');

		$id = $_GET['id'];

	// Cau lenh truy van co so du lieu

		$query = "SELECT * FROM employees
	WHERE id=".$id;

		$result = $conn->query($query);
		$employee = $result->fetch_assoc();
		return $employee;
	}

}

?>