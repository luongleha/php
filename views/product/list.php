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

	<div class="content container-fluid">
		<h1 style="text-align: center;">DANH SÁCH SẢN PHẨM</h1>
		<a href="?mod=product&act=add" title="" class="btn btn-primary" style="margin: 20px 0px;">Thêm sản phẩm</a>
		<?php 
		if (isset($_COOKIE['edit'])) {
			?> 
			<div class="alert alert-success">
				<strong>Thông báo: </strong> <?php  echo $_COOKIE['edit']; ?>
			</div>
		<?php } ?>
		<?php 
		if (isset($_COOKIE['msg'])) {
			?> 
			<div class="alert alert-danger">
				<strong>Thông báo: </strong> <?php  echo $_COOKIE['msg']; ?>
			</div>
		<?php } ?>
		<?php 
		if (isset($_COOKIE['add_msg'])) {
			?> 
			<div class="alert alert-primary">
				<strong>Thông báo: </strong> <?php  echo $_COOKIE['add_msg']; ?>
			</div>
		<?php } ?>

		<table id="mytable" class="table">
			<thead>
				<th>ID</th>
				<th>Tên sản phẩm</th>
				<th>Số Lượng</th>
				<th>Giá bán</th>
				<th>Loại sản phẩm</th>
				<th>Ảnh</th>
				<th>Action</th>
			</thead>
			<tbody>
				<?php
				$i =0; 
				foreach ($products as $key => $product) {
					$i++;
					?>
					<tr id="<?php echo $product['id'] ?>">
						<td><?php echo $product['id']; ?></td>
						<td><?= $product['name'] ?></td>
						<td><?= $product['quantity'] ?></td>
						<td><?= number_format($product['price']) . ' VNĐ' ?></td>
						<td><?= $product['category_id'] ?></td>
						<td>
							<img src="public/images/products/<?=$product['image']?>" width="100px" height="100px">
						</td>
						<td>
							<a data-id="<?= $product['id']?>" href="javascrip:;" class = "btn btn-primary btn-detail">Detail</a>
							<a href="?mod=product&act=edit&id=<?= $product['id']; ?>" class="btn btn-success">UPDATE</a>
							<a href="?mod=product&act=delete&id=<?= $product['id']; ?>" class = "btn btn-danger btn-delete" data-id="<?= $product['id']?>">DELETE</a>
						</td>
						
					</tr>
				<?php } ?>
				<!-- Modal -->
				<div class="modal" id="show_detail" tabindex="-1" role="dialog">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title"><b>***THÔNG TIN SẢN PHẨM***</b></h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<P>Mã sản phẩm: <span id="product_id"></span></P>
								<P>Tên sản phẩm: <span id="product_name"></span></P>
								<P>Số lượng sản phẩm: <span id="product_quantity"></span></P>
								<P>Giá sản phẩm: <span id="product_price"></span></P>
								<p>Ảnh: 
									<img id = "product_image" width="100px" height="100px"></li>
									<p>

										<div class="modal-footer">
											<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
										</div>
									</div>
								</div>
							</div>
							<!-- ---------------- end modal --------------- -->
						</tbody>
					</table>
				<script src="//code.jquery.com/jquery.js"></script>
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
				<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
				<script src="//code.jquery.com/jquery.js"></script>
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
				<script type="text/javascript">
			// bắt sự kiện cho thẻ class btn-detail----------------
			$(document).ready( function () {
				$('#mytable').DataTable();
			});
			$('.btn-detail').on('click',function() {
				$('#show_detail').modal('show');
				var id = $(this).data('id');
				$.ajax({
					type: 'get',
					url: '?mod=product&act=detail&id='+id,
					dataType:'json',
					success : function(product){
						console.log(product);
						$('#product_id').html(product.id)
						$('#product_name').html(product.name)
						$('#product_quantity').html(product.quantity)
						$('#product_price').html(product.price)
						$('#product_image').attr('src','public/images/products/' + product.image );
					}
				})
			});
		</script>
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
						Command: toastr["success"]("Xóa thành công !", "Thông báo")
						swal("Poof! Your imaginary file has been deleted!", {
							icon: "success",
						});
					} else {
						Command: toastr["error"]("Xóa không thành công !!", "Thông báo")
						swal("Your imaginary file is safe!");
					}
				});
			});
		</script>
	</div>
</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" type="text/javascript" charset="utf-8" async defer></script>

<?php 
require_once('views/layout/footer.php');
?>