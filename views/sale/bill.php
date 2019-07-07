<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>PHP MySQL Admin</title>

	<!-- Custom fonts for this template-->
	<link href="public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="public/css/sb-admin-2.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	<style type="text/css" media="screen">
	td, th{
		text-align: center;
	}
	.content{
		width: calc(100% - 159px);
		margin-left: 205px;
	}
</style>
</head>
<body>
	<?php 
	require_once('views/layout/header.php');
	?>
	
	<div  class ="container content" style="margin-top: 150px;">
		<h1 style="text-align: center;">HÓA ĐƠN BÁN HÀNG</h1>
			<br>

			<table class="table">
				<div style="float: left; width: 50%;">
					<h5>HasPro Mart</h5>
					<h5>Add: Hà Nội City</h5>
					<h5>Mobile: 0825480198</h5>
				</div>
				<div style="float: right; width: 50%;">
						<?php if(isset($_SESSION['employee'])) {?>
					<h5>Mã hóa đơn: <?php echo $bills['bill_code'] ; ?></h5>
						<h5>Nhân Viên Bán Hàng: <?php echo($_SESSION['employee']['name']) ; ?> - <?php echo($_SESSION['employee']['id']) ; ?></h5>
						<h5>Ngày giờ mua hàng: <?php echo $bills['time_bill']; ?></h5>
						<?php 

									}
									 ?>
					
				</div>
						

						<h5>----------------------------------------------------------*---*---*------------------------------------------------------------</h5>
							<?php if(isset($_SESSION['customer'])) {?>
						<h5>Khách mua hàng: <?php echo($_SESSION['customer']['name']) ; ?> - <?php echo($_SESSION['customer']['mobile']) ; ?></h5>
						<h5>Mã khách hàng: <?php echo($_SESSION['customer']['id']) ; ?></h5>
						<h5>Địa Chỉ: <?php echo($_SESSION['customer']['address']) ; ?></h5>
							<?php 

									}
									 ?>
						<thread>
							<th>Mã sản phẩm</th>
							<th>Tên sản phẩm</th>
							<th>Số Lượng</th>
							<th>Giá bán</th>
							<th>thanh tien</th>
						</thread>
						<tbody>
							<?php 
							$i=0;
							$tong = 0;
							if (isset($_SESSION['cart'])) {
								foreach ($_SESSION['cart'] as $product){

									$i++;
									$tong += $product['price'] * $product['quantity'];
									?>
									<tr>
										<td><?php echo $product['id'] ?></td>
										<td><?php echo $product['name'] ?></td>
										<td><?php echo $product['quantity'] ?></td>
										<td><?php echo number_format($product['price']) . ' VNĐ'  ?></td>
										<td><?php echo number_format($product['price'] * $product['quantity']) . ' VNĐ' ?></td>
									</tr>
									<?php 
								} 
							}?>
							<tr>
								<td colspan="4"><b>Tổng Tiền: </b></td>
								<td colspan="4"><?php echo number_format($tong) . ' VNĐ' ?></td>
							</tr>

						</tbody>

					</table>
					<tr ><h5 style="float: right; color: red;">Cảm ơn khách hàng đã tin dùng sản phẩm của chúng tôi</h5></tr>
				<a href="?mod=sale&act=send_mail" title="" class="btn btn-primary">In hóa đơn</a>
</div> 			
<?php 
require_once('views/layout/footer.php');
?>


