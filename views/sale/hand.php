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
	include_once('views/layout/header.php');
	?>


	<div  class =container>
		<h2 style="text-align: center;">---HÓA ĐƠN BÁN HÀNG---</h2>

		<table id="table" class="table">
			<thead>
				<!-- <th>STT</th> -->
				<th>Mã Hóa Đơn</th>
				<th>Tên khách hàng</th>
				<th>Tổng tiền</th>
				<th>#</th>

			</thead>
			<tbody>
				<?php 
				$i=0;
				$tongtien=0;
				foreach ($bills as $key => $bill) {
					$i++;
					?> 
					<tr>
						<!-- <td><?php echo $i ?></td>  -->
						<td><?php echo $bill['bill_code']?></td>
						<td><?php echo $bill['time_bill'] ?></td>
						<td><?php echo number_format($bill['total_money']) . 'VND'?></td> 

						<td>

							<?php if($bill['status1']=='0') {?>
								<a href="?mod=sale&act=tru&bill_code=<?= $bill['bill_code'] ?>" class="btn btn-success">Xử lí</a>
								<a href="?mod=sale&act=deletebill&bill_code=<?= $bill['bill_code'] ?>" class="btn btn-danger">hủy</a>


								<?php  		
							}?>

						</td> 

					</tr>
					<?php  

				}
				?> 


			</tbody>

		</table>



		<script type="text/javascript">
			$('#table').DataTable();



		</script>


		<?php 
		include_once('views/layout/footer.php');
		?>