<?php 
include_once('Model.php');
class Customer extends Model{
	var $table_name = 'customers';


	public function check($email,$password){
		
			$query ="SELECT * FROM ".$this->table_name."  WHERE email= '".$email."' AND password ='".$password."'";

			$result=$this->conn_product->query($query);

			$auth=$result->fetch_assoc();
			// var_dump($auth);
			// die;


			return $auth;
}
}
?>