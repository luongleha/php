<?php 			

	include_once('Model.php');
	class Detail extends Model {
		var $table_name = 'detail_bill';


		public function abc($id){

				$query = "SELECT * FROM ".$this->table_name." WHERE bill_code='".$id."'" ;
				$result=$this->conn_product->query($query);

					$bills= array();

				while($row = $result->fetch_assoc()) { 
					$bills[] =$row; 

				}

				// var_dump($products);
				// die;
				return $bills;


		}

		public function delete1($bill_code){
				$query ="DELETE FROM ".$this->table_name." WHERE bill_code= '".$bill_code."'";

				$result=$this->conn_product->query($query);
				// var_dump($result);
				// die;
				
				return $result;


			}
	}


 ?>