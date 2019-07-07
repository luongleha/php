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
				<li class="breadcrumb-item active">Nhân Viên</li>
			</ol>

		</div>
	</div>

	<div class="content container-fluid">
		<h1 style="text-align: center;">DANH SÁCH NHÂN VIÊN</h1>
		<a href="?mod=employee&act=add" title="" class="btn btn-primary" style="margin: 20px 0px;">Thêm nhân viên</a>
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
		if (isset($_COOKIE['add'])) {
			?> 
			<div class="alert alert-primary">
				<strong>Thông báo: </strong> <?php  echo $_COOKIE['add']; ?>
			</div>
		<?php } ?>
		<?php 
		if (isset($_COOKIE['dntc'])) {
			?> 
			<div class="alert alert-primary">
				<strong>Thông báo: </strong> <?php  echo $_COOKIE['dntc']; ?>
			</div>
		<?php } ?>


		<table id="mytable" class="table">
			<thead>
				<!-- <th>STT</th> -->
				<th>ID</th>
				<th>Tên nhân viên</th>
				<th>Email</th>
				<th>Số điện thoại</th>
				<th>Địa chỉ</th>
				<!-- <th>Mật khẩu</th> -->
				<th>Ảnh</th>
				<th>Action</th>
			</thead>
			<tbody>
				<?php
				$i =0; 
				foreach ($employees as $key => $employee) {
					$i++;
					?>
					<tr id="<?php echo $employee['id'] ?>">
						<!-- <td><?php echo $i; ?></td> -->
						<td><?= $employee['id']; ?></td>
						<td><?= $employee['name'] ?></td>
						<td><?= $employee['email'] ?></td>
						<td><?= $employee['mobile'] ?></td>
						<td><?= $employee['address'] ?></td>
						<!-- <td><?= $employee['password'] ?></td> -->
						<td>
							<img src="public/images/employees/<?=$employee['image']?>" width="100px" height="100px">
						</td>
						<td>
							<a data-id="<?= $employee['id']?>" href="javascrip:;" class = "btn btn-info btn-detail">Detail</a>
							<a href="?mod=employee&act=edit&id=<?= $employee['id']; ?>" class="btn btn-success">UPDATE</a>
							<a href="?mod=employee&act=delete&id=<?php echo $employee['id']; ?>" class = "btn btn-danger btn-delete" data-id="<?= $employee['id']?>">DELETE</a>
						</td>
						<!-- Modal -->
						<div class="modal" id="show_detail" tabindex="-1" role="dialog">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title"><b>***THÔNG TIN NHÂN VIÊN***</b></h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<P>Mã nhân viên: <span id="employee_id"></span></P>
										<P>Tên nhân viên: <span id="employee_name"></span></P>
										<P>Email nhân viên: <span id="employee_email"></span></P>
										<P>SĐT nhân viên: <span id="employee_mobile"></span></P>
										<P>Địa chỉ nhân viên: <span id="employee_address"></span></P>
										<P>Mật khẩu nhân viên: <span id="employee_password"></span></P>
										<p>IMG: 
											<img src="" alt="" id="employee_image" width="100px" height="100px">
											<!-- <img src="public/images/<?=$employee['image']?>" width="100px" height="100px"></li> -->
											<p>

												<div class="modal-footer">
													<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</div>
								</tr>
								<!-- ---------------- end modal --------------- -->
							</tr>
						<?php } ?>
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
					url: '?mod=employee&act=detail&id='+id,
					dataType:'json',
					success : function(employee){
						console.log(employee);
						$('#employee_id').html(employee.id)
						$('#employee_name').html(employee.name)
						$('#employee_email').html(employee.email)
						$('#employee_mobile').html(employee.mobile)
						$('#employee_address').html(employee.address)
						$('#employee_password').html(employee.password)
						$('#employee_image').attr('src','public/images/employees/' + employee.image)
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