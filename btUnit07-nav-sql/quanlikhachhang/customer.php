<?php 

include_once 'connect.php';
	// Cau lenh truy van co so du lieu

$query = "SELECT * FROM customers";

$result = $conn->query($query);

$customers = array();

while($row = $result->fetch_assoc()) {
	$customers[]=$row;
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	
</head>
<body>
	<div style="width: 95%; margin: 0 auto;">
		<h1 style="text-align: center;">Sản Phẩm</h1>
		
		<table id="table" class="table">
			<thead>
				<td>STT</td>
				<td>MaKH</td>
				<td>TenKH</td>
				<td>email</td>
				<td>mobile</td>
				<td>address</td>
				<td>Action</td>
			</thead>
			
			<tbody>
				<?php
				$i=0;
				foreach ($customers as $customer) {
					$i++;
					?>
					<td><?php echo $i; ?></td>
					<td><?php echo $customer['id']; ?></td>
					<td><?php echo $customer['name']; ?></td>
					<td><?php echo $customer['email']; ?></td>
					<td><?php echo $customer['mobile'] ?></td>
					<td><?php echo $customer['address']; ?></td>
					<td>
						<a data-id="<?= $customer['id']?>" href="javascrip:;" class = "btn btn-primary btn-detail">Detail</a>
						<!-- <a href="customer_detail.php?id=<?php echo $customer['id']; ?>" class = "btn btn-primary">Detail</a> -->
						<a href="customer_edit.php?id=<?php echo $customer['id']; ?>" class = "btn btn-success">Update</a>
						<a href="customer_delete.php?id=<?php echo $customer['id']; ?>" class = "btn btn-danger btn-delete">Delete</a>
					</td>


					<!-- Modal -->
					<div class="modal fade" id="modal-show" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<P>Mã khách hàng: <span id="customer_id"></span></P>
									<P>Tên khách hàng: <span id="customer_name"></span></P>
									<P>email: <span id="customer_email"></span></P>
									<P>mobile: <span id="customer_mobile"></span></P>
									<P>address: <span id="customer_address"></span></P>

									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									</div>
								</div>
							</div>
						</div>
						<!-- ---------------- end modal --------------- -->
					</tbody>
				<?php } ?>
			</table>
			<a href="customer_add.php" title="" class="btn btn-primary">Thêm mới khách hàng</a>
		</div>

		<script type="text/javascript">
			// bắt sự kiện cho thẻ class btn-detail----------------
			$(document).ready( function () {
				$('#table').DataTable();
			} );
			$('.btn-detail').on('click',function() {
				$('#modal-show').modal('show');
				var id = $(this).data('id');
				alert(id);
				$.ajax({
					type: 'get',
					url: 'customer_detail.php?id='+id,
					dataType:'json',
					success : function(customer){
						console.log(customer);
						$('#customer_id').html(customer.id)
						$('#customer_name').html(customer.name)
						$('#customer_email').html(customer.email)
						$('#customer_mobile').html(customer.mobile)
						$('#customer_address').html(customer.address)
					}
				})
			});


		</script>

		<script type="text/javascript">
			$('.btn-delete').on('click',function(event) {
				event.preventDefault();
				var	url	= $(this).attr('href');
				swal({
					title: "Are you sure?",
					text: "Once deleted, you will not be able to recover this imaginary file!",
					icon: "warning",
					buttons: true,
					dangerMode: true,
				})
				.then((willDelete) => {
					if (willDelete) {
						window.location.href=url;
						swal("Poof! Your imaginary file has been deleted!", {
							icon: "success",
						});
					} else {
						swal("Your imaginary file is safe!");
					}
				});
			});
		</script>
	</body>
	</html>