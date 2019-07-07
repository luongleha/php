<?php 
	require_once('Connection.php');
	class Model{
		var $conn_product;
		var $table_name = '';

		function __construct(){
			$conn_obj = new Connection();
			$this->conn_product = $conn_obj->conn;
		}
		public function All(){
			
			//Viết câu lệnh truy vấn
			$query = "SELECT * FROM ". $this->table_name;

			//Thực thi câu lệnh
			$result = $this->conn_product->query($query);

			//Tạo 1 mảng để chứa dữ liệu
			$products = array(); 

			while($row = $result->fetch_assoc()) { 
				$products[] = $row;
			}
			return $products;
		}
		public function find($id){
			$query = "SELECT * FROM ".$this->table_name." WHERE id = '".$id."'";

			//Thực thi câu lệnh
			$result = $this->conn_product->query($query);

			//Tạo 1 mảng để chứa dữ liệu
			$products = $result->fetch_assoc(); 
			return($products);

			// return -> $conn->query($query) -> fetch_assoc();
		}
		public function create($data){
			// echo "<pre>";
			// 	print_r($data);
			// echo "</pre>";
			$fields = '';
			$values = '';
			foreach ($data as $key => $value) {

				
				$fields .= $key.',';
				// echo "<br>".$fields; 
				$values .= "'".$value."',";
				// echo "<br>".$values;
			}
			$fields = trim($fields,",");
			$values = trim($values,",");
			// echo "<br>".$values;
			
			$query = "INSERT INTO ".$this->table_name." (".$fields.") VALUES (".$values.")";
			// die($query);
			// echo $query;
			// die;
				return $this->conn_product->query($query);
				// tra ve trang thai
		}
		public function update($data, $id){
			$temp='';

			foreach ($data as $key => $value) {
				if ($key != "submit") {
					if ($key != "image" || $key == "image" && $value != '') {
						$temp .= $key."='".$value."',";
						// echo "<br>". $temp;
					}
				}
				
				// echo "<br>". $temp;
			}
			$temp = trim($temp,',');
			
			$query = "UPDATE ".$this->table_name." SET ".$temp."  WHERE id = '".$id."' ";
			// die($query);
			return $this->conn_product->query($query);
		}
		public function delete($id){
			$query = "DELETE FROM ".$this->table_name." WHERE id = ".$id;
			return $this->conn_product->query($query);
		}
	}

?>