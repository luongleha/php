<?php 

require_once('models/Customer.php');
require_once('models/Employee.php');
require_once('models/Product.php');
require_once('models/Bill.php');
require_once('models/BillDetail.php');


class SaleController {
	var $sale_model;


		public function hand(){
			$bill_model=new Bill();
			$bills=$bill_model->All();
			include_once("views/sale/hand.php");

	}

	public function purchase(){
		if(isset($_GET['id'])){
			$id=$_GET['id'];
			$customer_model=new Customer();
			$customer=$customer_model->find($id);

			$_SESSION['customer']=$customer;
			header('location:?mod=sale&act=sale');
		}else{
			header('location:?mod=purchase');
		}
	}


	public function customer(){

		$customer_model=new Customer();
		$customers=$customer_model->all();
		include_once("views/sale/customer.php");

	}


	public function sale(){
		if(isset($_SESSION['customer'])){
			$product_model=new Product();
			$products=$product_model->all();

			include_once('views/sale/sale.php');
		}

	}
	public function add2cart(){
		$id= $_GET['id'];


		if(isset($_SESSION['cart'][$id])){
			$_SESSION['cart'][$id]['quantity']=$_SESSION['cart'][$id]['quantity']+1;

		}
		else{
			$product_model = new Product();
			$product=$product_model->find($id);
			$product['quantity']='1';
			$_SESSION['cart'][$id]=$product;
		}
		header('location:?mod=sale&act=sale');


	}

	public function delete(){
		$id= $_GET['id'];
		$_SESSION['cart'][$id]['quantity']--;
		header("location:?mod=sale&act=sale");
		if ($_SESSION['cart'][$id]['quantity']==0) {
			unset($_SESSION['cart'][$id]);
			header("location:?mod=sale&act=sale");

		}

	}
	public function unset(){
		$id= $_GET['id'];
		if (isset($_SESSION['cart'][$id])) {
					// session_destroy();
			unset($_SESSION['cart']);
			setcookie('msg','Hủy hóa đơn thành công!', time()+3);
			header("location:?mod=sale&act=customer");
		}
		else{
			header("location:?mod=sale&act=customer");
		}
	}

	public function payment(){

		$MaNV=$_SESSION['employee']['id'];
		$MaKH=$_SESSION['customer']['id'];
		$cart=$_SESSION['cart'];
				// var_dump($cart);
				// die;

		$hoadon=array();
		$hoadon['bill_code']=$MaNV.'_'.$MaKH.'_'.time();
		$hoadon['employee_id']=$MaNV;
		$hoadon['customer_id']=$MaKH;
		$hoadon['time_bill']=date('Y-m-d H:i:s');
		
		$bill=new Bill();
		$bill->create($hoadon);

		$tongtien=0;
		foreach ($cart as $key => $product) {
			$sanpham['bill_code']=$hoadon['bill_code'];
			$sanpham['product_id']=$product['id'];
			$sanpham['quantity_buy']=$product['quantity'];
					// $sanpham['price']=$product['price'];
			$sanpham['into_money']=$product['quantity']*$product['price'];


			$tongtien +=$sanpham['into_money'] ;
			$bill_detail= new Detail();
			$bill_detail->create($sanpham);
			$product_model = new Product();
			$product_model->reduceQuant($sanpham['product_id'],$sanpham['quantity_buy']);

		}	


		$ubill['bill_code']=$hoadon['bill_code'];
		$ubill['total_money']=$tongtien;
		$bill->update($ubill);



		header("location:?mod=sale&act=detail&bill_code=" .$hoadon['bill_code']);




	}
	public function billdetail(){
		$bill_code=$_GET['bill_code'];
		$bill =new Bill();
		$bills=$bill->findb($bill_code);

		include_once('views/sale/bill.php');
		unset($_SESSION['cart']);
		// unset($_SESSION['customer']);
		// unset($_SESSION['employee']);
	}

	public function send_mail(){
		include_once('controllers/function.php');
		$email_recive = $_SESSION['customer']['email'];
		$name= $_SESSION['customer']['name'];
		ob_start();
		include_once('views/sale/send_mail.php');
		$contents=ob_get_contents();
		ob_clean();
		// echo $contents="fskjdf";
		$subject = 'PROJECT_PHP 19';

		

		header('location: ?mod=sale&act=sale');
	}
	public function deletebill(){


				$bill_model=new Bill();
				$result=$bill_model->delete($_GET['bill_code']);
				$detailbill=new Detail();
				$detail=$detailbill->delete1($_GET['bill_code']);
				header('location:?mod=sale&act=hand');
			}
	public function tru(){
				$id= $_GET['bill_code'];
				$billdetail_model=new Detail();
				$billdetails=$billdetail_model->abc($id);

				$bill=new Bill();
				$bills=$bill->findb($id);
				// var_dump($bills);
				// die;
				$ubill['bill_code']=$id;
				$ubill['status1']='1';
				// var_dump($ubill);
				// die;
				$a=$bill->updateb($ubill);
				// var_dump($a);
				// die;

				foreach ($billdetails as $key => $product) {
					// $sanpham['bill_code']=$product['bill_code'];
					// var_dump($sanpham['bill_code']);
					// die;
					$sanpham['id']=$product['product_id'];
					$sanpham['quantity']=$product['quantity_buy'];
					// $sanpham['into_money']=$product['quantity']*$product['price'];
					// $tongtien +=$sanpham['into_money'] ;
				
					$product_model = new Product();
					$product_model->reduceQuant($sanpham['id'],$sanpham['quantity']);
					header('location:?mod=sale&act=hand');
			}
					
			
	}		
		
}

?>