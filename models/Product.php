<?php 
	require_once('Model.php');
	class Product extends Model{
		var $table_name = 'products';

		var $conn_product;
			 function __construct(){
				$conn_obj =new Connection();
				$this->conn_product= $conn_obj->conn;
			}

			public function getQuant($id){

				$query="SELECT quantity FROM ".$this->table_name." WHERE id= '".$id."'";
			
				$result=$this->conn_product->query($query);


				$product=$result->fetch_assoc()['quantity'];

				return $product;
			}

			public function reduceQuant($id,$quantity){

				

				$quannew=$this->getQuant($id)-$quantity;
				
				$query ="UPDATE ".$this->table_name." SET quantity='".$quannew."' WHERE id= '".$id."' ";
				$result=$this->conn_product->query($query);
				return $result;
			}
	}

?>