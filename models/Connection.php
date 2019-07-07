<?php 
require_once('config.php');
class Connection{
	var $conn;
	function __construct(){
		$this->conn = new mysqli(SERVER, USER, PASS, DB_NAME);

		$this->conn->set_charset("utf8"); //set utf-8 để đọc dữ liệu tiếng Việt

		// Check connection
		if ($this->conn->connect_error) {
			die("connection failed: " . $this->conn->connect_error);
		}
	}

}
?>