<?php 

include_once('models/Customer.php');
require_once('function.php');
class CustomerController{
	var $customer_connection;
	function __construct(){
		$this->customer_connection = new Customer();
	}

	public function list(){
		$customers = $this->customer_connection -> All();
		include_once('views/customer/list.php');
	}
	public function detail(){
		$id = $_GET['id'];
		$customers = $this->customer_connection -> find($id);
		echo json_encode($customers);
	}
	public function add(){
		include_once('views/customer/add.php');
	}
	public function store(){
		$data = $_POST;
		$file = upload_file('image');
		$data['image'] = $file;
		
		$status = $this->customer_connection -> create($data);
		if ($status == true ) {
			setcookie('add','Thêm khách hàng thành công !', time() + 5);
			header('Location: index.php?mod=customer&act=list');
		}else{
			setcookie('msg','Thêm chưa thành công! Vui lòng thử lại...',time() + 5);
			header('Location: index.php?mod=customer&act=list');
		}
	}
	public function edit(){
		$id = $_GET['id'];
		$customers = $this->customer_connection->find($id);
		include_once('views/customer/edit.php');
	}
	public function update(){
		$id = $_GET['id'];
		$data = $_POST;
		$image = upload_file('image');
		$image != ""?$data['image'] = $image : $data['image'] = "";
		$status = $this->customer_connection->update($data, $id);
		if ($status == true) {
			setcookie('add','Cập nhật khách hàng thành công !', time() + 5);
			header('Location: index.php?mod=customer&act=list');
		}else{
			setcookie('msg','Cập nhật khách hàng chưa thành công! Vui lòng thử lại...',time() + 5);
			header('Location: index.php?mod=customer&act=list');
		}
	}
	public function delete(){
		$id = $_GET['id'];
		$status = $this->customer_connection->delete($id);
		if($status == true){
			setcookie('add', 'Xóa khách hàng thành công !', time()+3);
			header('location: index.php?mod=customer&act=list');
		}else{
			setcookie('msg', 'Xóa khách hàng ko thành công !', time()+3);
			header('location: index.php?mod=customer&act=list');
		}
	}
	public function error(){
	echo "<h4> Action - 404 </h4>";
	}
}

?>