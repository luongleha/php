<?php 
require_once('models/Product.php');
include_once('check/auth.php');
include_once('models/Bill.php');
include_once('models/BillDetail.php');

class OnlineController{

	public function ca(){
		$product_model=new Product();
		$products=$product_model->all();
		include_once('online/cart.php');
	}
	public function buy(){
		$id= $_GET['id'];
			if(isset($_SESSION['cartol'][$id])){
				$_SESSION['cartol'][$id]['quantity']=$_SESSION['cartol'][$id]['quantity']+1;

			}
			else{
				$product_model = new Product();
				$product=$product_model->find($id);
				$product['quantity']='1';
					// var_dump($product);
					// die;
				$_SESSION['cartol'][$id]=$product;
			}
			header("location:?mod=online&act=ca");
	}
	public function index(){
		$product_model=new Product();
		$products=$product_model->all();
		include_once('online/index.php');
	}
	public function shop(){
		$product_model=new Product();
		$products=$product_model->all();
		include_once('online/product.php');
	}

	public function profile(){

		include_once("views/sale/profile.php");

	}

	public function check(){
		

		if(!isset($_SESSION['loginOnline'])){
			header('location:?mod=login&act=formlogin');
		}
		else{
			header('Location:?mod=online&act=sent');
		}
		
	}
	public function cart(){

		include_once('views/sale/cartol.php');
	}

	public function detail(){
		$id = $_GET['id'];
		$product_model=new Product();
		$product = $product_model->find($id);
		$products=$product_model->all();
		include_once("online/detail2.php");
	}

	public function add2cart(){
		$id= $_GET['id'];
		if(isset($_SESSION['cartol'][$id])){
			$_SESSION['cartol'][$id]['quantity']=$_SESSION['cartol'][$id]['quantity']+1;

		}
		else{
			$product_model = new Product();
			$product=$product_model->find($id);
			$product['quantity']='1';
				// var_dump($product);
				// die;
			$_SESSION['cartol'][$id]=$product;
		}
		header('location:?mod=online&act=ca');
	}


	public function delete(){
		$id= $_GET['id'];
		$_SESSION['cartol'][$id]['quantity']--;
		header("location:?mod=online&act=ca");
		if ($_SESSION['cartol'][$id]['quantity']==0) {
			unset($_SESSION['cartol'][$id]);
			header("location:?mod=online&act=ca");

		}
	}

	public function unset(){
		$product_model=new Product();
		$products=$product_model->all();
		if (isset($_SESSION['cartol'])) {
					// session_destroy();
			unset($_SESSION['cartol']);
			setcookie('msg','Hủy hóa đơn thành công!', time()+3);
			header("location:?mod=online&act=index");

		}
	}

	public function sent(){
		$MaKH=$_SESSION['customer']['id'];
		$cart=$_SESSION['cartol'];
		$hoadon=array();
		$hoadon['bill_code']='OL_'.$MaKH.'_'.time();
		$hoadon['customer_id']=$MaKH;
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$hoadon['time_bill']=date('Y-m-d H:i:s',time());
		$hoadon['status1']='0';
		$bill=new Bill();
		$bill->create($hoadon);


		$tongtien=0;
		foreach ($cart as $key => $product) {
			$sanpham['bill_code']=$hoadon['bill_code'];
			$sanpham['product_id']=$product['id'];
			$sanpham['quantity_buy']=$product['quantity'];
			$sanpham['into_money']=$product['quantity']*$product['price'];
			$tongtien +=$sanpham['into_money'] ;
			$bill_detail= new Detail();
			$bill_detail->create($sanpham);
		}	
		$ubill['bill_code']=$hoadon['bill_code'];
		$ubill['total_money']=$tongtien;
		$bill->update($ubill);
	

		$name =$_SESSION['customer']['name'];
		$maKH =$_SESSION['customer']['id'];
		$sdt =$_SESSION['customer']['mobile'];


		$email_recive = 'hasproIT@gmail.com';
		$name = 'Ha';
		


		$contents = 'Xin chào:' . $name .' bạn đã đặt mua thành công sản phẩm<br>'.
		'<br>Số tiền bạn phải thanh toán là :'.$tongtien;


		$subject ='Hóa đơn mua hàng';

			
		unset($_SESSION['cartol']);

			header('location:?mod=online&act=index');

	}

	
}		
?>