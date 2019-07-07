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
	.content1{
		float: left;
		margin-left: 206px;
		width: 40%;
	}
	.content2{
		font-size: 18px;
		margin-left: 140px;
		float: left;
		width: 60%;
	}
</style>
</head>
<body>
	<?php 
	require_once('views/layout/header.php');
	?>
	<div id="content-wrapper">
		<div class="container-fluid">
			<ol class="breadcrumb" style="margin-top: 78px; margin-left: 206px;">
				<li class="breadcrumb-item">
					<a href="index.php">Trang Chủ</a>
				</li>
				<li class="breadcrumb-item active">Sản Phẩm</li>
			</ol>

		</div>
	</div>
	<div style="width: 100%">
		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 content1 container-fluid">
			<h2 style="text-align: center;"><b>DANH SÁCH SẢN PHẨM</b></h2>

			<table id="table" class="table">
				<thead>
					<th><b>Mã sản phẩm</b></th>
					<th><b>Tên sản phẩm</b></th>
					<th><b>Số lượng</b></th>
					<th><b>Giá tiền</b></b></th>
					<th><b>Ảnh</b></th>
					<th><b>Action</b></th>

				</thead>
				<tbody>
					<?php 
					$i=0;
					foreach ($products as $key => $product) {
						$i++;
						?>
						<tr>

							<td><?php echo $product['id'] ?></td>
							<td><?php echo $product['name'] ?></td>
							<td><?php echo $product['quantity'] ?></td>
							<td><?php echo number_format($product['price'])  ?></td>
							<td> <img src="public/images/products/<?= $product['image'] ?> " width=80px height=90px></td>
							<td>
								<a href="?mod=sale&act=cart&id=<?= $product['id'] ?>" class="btn btn-primary"><i class="fa fa-cart-arrow-down"></i></a>

							</td>
						</td>
					</tr>
					<?php  

				}
				?>
			</tbody>

		</table>
	</div>
	<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 content2 container-fluid">
		<h2 style="text-align: center;"><b>--HÓA ĐƠN BÁN HÀNG--</b></h2>
		<hr>
		<?php

		echo  "<b>Tên khách hàng:</b> " .$_SESSION['customer']['name'];
		echo "<b><br> Số điện thoại:</b> " .$_SESSION['customer']['mobile'];
		echo "<b><br> Email:</b> " .$_SESSION['customer']['email'];
		echo "<b><br> Địa chỉ:</b> " .$_SESSION['customer']['address'];

		?>
		<p><b><center>*****************</center></b></p>
		<table class="table" >
			<thead>
				<!-- <th><b>STT</b></th> -->
				<th><b>Tên SP</b></th>
				<th><b>Số lượng</b></th>
				<th>Tăng Giảm</th>
				<th><b>Giá tiền</b></th>
				<th><b>Thành tiền</b></th>

			</thead>
			<tbody>
				<?php 
				$i=0;
				$tongTien=0;
				if(isset($_SESSION['cart'])){
					foreach ($_SESSION['cart'] as $key => $product) {
						$i++;
						$tongTien= $tongTien + $product['quantity'] * $product['price'];
						?>
						<tr>
							<!-- <td><?php echo $i ?></td> -->
							<td><?php echo $product['name'] ?></td>
							<td><?php echo $product['quantity'] ?></td>
							<td>
								<a href="?mod=sale&act=cart&id=<?= $product['id'] ?>" class="btn btn-primary">+</a>
								<a href="?mod=sale&act=delete&id=<?= $product['id'] ?>" class="btn btn-warning">-</a>
								
							</td>

							<td><?php echo number_format($product['price'])  ?></td>
							<td><?php echo number_format($product['quantity'] * $product['price']) ?>
							 <!-- <img src="public/images/<?= $product['image'] ?> " width=50px; height=50px;> -->

								<!-- <?php echo $tinhtien= $product['price']*$product['quantity'] ?>	 -->
							</tr>
							<?php  
							// $tongtien+=$tinhtien;
						}		
					}

					?> 

				</tbody>
			</table>
			<?php echo "Tổng Tiền :" .number_format($tongTien); ?>
			<br>
			<a href="?mod=sale&act=payment" class = "btn btn-success">Thanh Toán</a>
			<a href="?mod=sale&act=unset&id=<?= $product['id'] ?>" class = "btn btn-danger btn-delete" data-id="<?= $product['id']?>">Hủy Hóa Đơn</a>
		</div>
	</div>
	<script type="text/javascript">
			$('.btn-delete').on('click',function(event) {
				event.preventDefault();
				var	href = $(this).attr('href');
				var id = $(this).data('id');
				swal({
					title: "Are you sure?",
					text: "Once deleted, you will not be able to recover this imaginary file!",
					icon: "warning",
					buttons: true,
					dangerMode: true,
				})
				.then((willDelete) => {
					if (willDelete) {
						$.ajax({
							type: 'get',
							url: href,
							success: function(response){
								$('#' + id).remove();
							}
						})
						Command: toastr["success"]("Hủy hóa đơn thành công !", "Thông báo")
						swal("Poof! Your imaginary file has been deleted!", {
							icon: "success",
						});
					} else {
						Command: toastr["error"]("Hủy hóa đơn không thành công !!", "Thông báo")
						swal("Your imaginary file is safe!");
					}
				});
			});
		</script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" type="text/javascript" charset="utf-8" async defer></script>

	<!-- <?php 
	require_once('views/layout/footer.php');
	?> -->