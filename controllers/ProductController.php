<?php 
require_once('models/Product.php');
require_once('function.php');
class ProductController{
	var $product_connection;
	function __construct(){
		$this->product_connection = new Product();
	}

	public function list(){

		$products = $this->product_connection->All();
		include_once('views/product/list.php');
	}
	public function detail(){
		$id = $_GET['id'];
		$product = $this->product_connection->find($id);
		echo json_encode($product);
	}
	public function add(){
		include_once('views/product/add.php');
	}
	public function store(){
		$file = upload_file('image');
		$data = $_POST;
		$data['image'] = $file;
		
		
		$status = $this->product_connection->create($data);

		if($status == true){
			setcookie('add_msg', 'Thêm sản phẩm thành công !', time()+3);
			// echo "ok";
			header('location: index.php?mod=product&act=list');
		}else{
			setcookie('add_msg', 'Thêm sản phẩm ko thành công !', time()+3);
			// echo "not ok";
			header('location: index.php?mod=product&act=list');
		}
	}
	public function edit(){
		$id = $_GET['id'];
		$product = $this->product_connection->find($id);
		include_once('views/product/edit.php');
	}
	public function update(){
		$id = $_GET['id'];
		$data = $_POST;
		
		$image = upload_file('image');

		$image != ""?$data['image'] = $image : $data['image'] = "";

		$status = $this->product_connection->update($data, $id);

		if($status == true){
			setcookie('add_msg', 'Cập nhật sản phẩm thành công !', time()+3);
			// echo "ok";
			header('location: index.php?mod=product&act=list');
		}else{
			setcookie('add_msg', 'Cập nhật sản phẩm ko thành công !', time()+3);
			// echo "not ok";
			header('location: index.php?mod=product&act=list');
		}
	}
	public function delete(){
		$id = $_GET['id'];
		$status = $this->product_connection->delete($id);
		if($status == true){
			setcookie('add_msg', 'Xóa sản phẩm thành công !', time()+3);
			// echo "ok";
			header('location: index.php?mod=product&act=list');
		}else{
			setcookie('add_msg', 'Xóa sản phẩm ko thành công !', time()+3);
			// echo "not ok";
			header('location: index.php?mod=product&act=list');
		}
	}
	public function error(){
	echo "<h4> Action - 404 </h4>";
	}
}

?>