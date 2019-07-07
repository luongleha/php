<?php 
require_once('Model.php');
class Employee extends Model{
	var $conn;
	var $table_name = 'employees';
	function check($email , $password){
		$sql = "SELECT * FROM ".$this->table_name." where email = '".$email."' and password = '".$password."' ";
		$result = $this->conn_product->query($sql);
			$products=$result->fetch_assoc();
		return $products;
	}
}

?>