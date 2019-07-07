<?php 
	class Bill {

		var $table_name='bills';
		var $conn_product;
			
			function __construct(){
				$conn_obj =new Connection();
				$this->conn_product= $conn_obj->conn;
			}
				public function delete($bill_code){
				$query ="DELETE FROM ".$this->table_name." WHERE bill_code= '".$bill_code."'";

				$result=$this->conn_product->query($query);
				
				return $result;


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
			// var_dump($products);
			// die;
			return $products;

		}
			public function updateb($data){

				
				$query = "UPDATE bills SET status1 = '".$data['status1']."'  WHERE bill_code= '".$data['bill_code']."' ";
				
	
				$result=$this->conn_product->query($query);
			

				return $result;
			}

			public function update($data){


				$query = "UPDATE bills SET total_money = '".$data['total_money']."'  WHERE bill_code= '".$data['bill_code']."' ";
				
	
				$result=$this->conn_product->query($query);
			

				return $result;
			}

				public function create($data){

				
				$fields="";
				$values="";
				foreach ($data as $key => $value) {
					$fields .= $key. ",";
					$values .= "'".$value."'" .",";
				}

				$fields=trim($fields,",");
				$values=trim($values,",");


				$query ="INSERT INTO ".$this->table_name." (".$fields.") values (".$values.")";
			
				$status = $this->conn_product->query($query);

				return $status;


			}
				public function find($id){
				
				$query ="SELECT * FROM ".$this->table_name."  WHERE id= '".$id."'";

				$result=$this->conn_product->query($query);

				$products=$result->fetch_assoc();

				return $products;

			}
			public function findb($bill_code){
		$query ="SELECT * FROM ".$this->table_name." WHERE bill_code = '".$bill_code."'";
		$result=$this->conn_product->query($query);
		$product=$result->fetch_assoc();
		// var_dump($product);
		// die;

		return $product;
	}

	}
 ?> 
