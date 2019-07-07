<?php
require_once("header.php");
?>

<?php 

include_once 'connect.php';
	// Cau lenh truy van co so du lieu

$query = "SELECT * FROM employees";

$result = $conn->query($query);

$employees = array();

while($row = $result->fetch_assoc()) {
	$employees[]=$row;
}
?>

<div class="container-fluid">

	<!-- Breadcrumbs-->
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="index.php">Bảng điều khiển</a>
		</li>
		<li class="breadcrumb-item active">Trang chủ</li>
	</ol>
	
<body>
		<div style="width: 95%; margin: 0 auto;">
			<h1 style="text-align: center;">Danh sách nhân viên</h1>

			<table id="table" class="table">
				<thead>
					<td>STT</td>
					<td>MaKH</td>
					<td>TenKH</td>
					<td>email</td>
					<td>mobile</td>
					<td>address</td>
					<td>password</td>
					<td>Action</td>
				</thead>

				<tbody>
					<?php
					$i=0;
					foreach ($employees as $employee) {
						$i++;
						?>
						<tr id="<?php echo $employee['id']; ?>">
							<td><?php echo $i; ?></td>
							<td><?php echo $employee['id']; ?></td>
							<td><?php echo $employee['name']; ?></td>
							<td><?php echo $employee['email']; ?></td>
							<td><?php echo $employee['mobile'] ?></td>
							<td><?php echo $employee['address']; ?></td>
							<td><?php echo $employee['password']; ?></td>
							<td>
								<a data-id="<?= $employee['id']?>" href="javascrip:;" class = "btn btn-primary btn-detail">Detail</a>
								<!-- <a href="employee_detail.php?id=<?php echo $employee['id']; ?>" class = "btn btn-primary">Detail</a> -->
								<a href="employee_edit.php?id=<?php echo $employee['id']; ?>" class = "btn btn-success">Update</a>
								<a href="quanlinhanvien/employee_delete.php?id=<?php echo $employee['id']; ?>" class = "btn btn-danger btn-delete" data-id="<?php echo $employee['id']; ?>">Delete</a>
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
											<P>Mã khách hàng: <span id="employee_id"></span></P>
											<P>Tên khách hàng: <span id="employee_name"></span></P>
											<P>email: <span id="employee_email"></span></P>
											<P>mobile: <span id="employee_mobile"></span></P>
											<P>address: <span id="employee_address"></span></P>
											<P>password: <span id="employee_password"></span></P>

											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</tr>
						<!-- ---------------- end modal --------------- -->
					</tbody>
				<?php } ?>
			</table>
			<a href="employee_add.php" title="" class="btn btn-primary">Thêm mới nhân viên</a>
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
					url: 'quanlinhanvien/employee_detail.php?id='+id,
					dataType:'json',
					success : function(employee){
						console.log(employee);
						$('#employee_id').html(employee.id)
						$('#employee_name').html(employee.name)
						$('#employee_email').html(employee.email)
						$('#employee_mobile').html(employee.mobile)
						$('#employee_address').html(employee.address)
						$('#employee_password').html(employee.password)
					}
				})
			});


		</script>

		<script type="text/javascript">
			$('.btn-delete').on('click',function(event) {
				event.preventDefault();
				var	href = $(this).attr('href');
				var	id	= $(this).data('id');
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
								$('#' + id).remove()
							}
						})
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
</div>

<?php
require_once("footer.php");
?>