<?php 

include_once 'connect.php';
	// Cau lenh truy van co so du lieu

$query = "SELECT * FROM products";

$result = $conn->query($query);

$products = array();

while($row = $result->fetch_assoc()) {
	$products[]=$row;
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
				<td>MaSP</td>
				<td>TenSP</td>
				<td>Soluong</td>
				<td>Gia</td>
				<td>category_id</td>
				<td>image</td>
				<td>Action</td>
			</thead>
			
			<tbody>
				<?php
				$i=0;
				foreach ($products as $product) {
					$i++;
					?>
					<td><?php echo $i; ?></td>
					<td><?php echo $product['id']; ?></td>
					<td><?php echo $product['name']; ?></td>
					<td><?php echo $product['quantity']; ?></td>
					<td><?php echo number_format($product['price']) . " VND"; ?></td>
					<td><?php echo $product['category_id']; ?></td>
					<td>
						<img src="img/<?=$product['image']?>" width="100px" height="100px"></td>
						<td>
							<a data-id="<?= $product['id']?>" href="javascrip:;" class = "btn btn-primary btn-detail">Detail</a>
							<!-- <a href="product_detail.php?id=<?php echo $product['id']; ?>" class = "btn btn-primary">Detail</a> -->
							<a href="product_edit.php?id=<?php echo $product['id']; ?>" class = "btn btn-success">Update</a>
							<a href="product_delete.php?id=<?php echo $product['id']; ?>" class = "btn btn-danger btn-delete">Delete</a>
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
										<P>Mã sản phẩm: <span id="product_id"></span></P>
										<P>Tên sản phẩm: <span id="product_name"></span></P>
										<P>Số lượng sản phẩm: <span id="product_quantity"></span></P>
										<P>Giá sản phẩm: <span id="product_price"></span></P>
										<p>IMG: 
											<img src="img/<?=$product['image']?>" width="100px" height="100px"></li>
											<p>

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
						<a href="product_add.php" title="" class="btn btn-primary">Thêm mới sản phẩm</a>
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
					url: 'product_detail.php?id='+id,
					dataType:'json',
					success : function(product){
						console.log(product);
						$('#product_id').html(product.id)
						$('#product_name').html(product.name)
						$('#product_quantity').html(product.quantity)
						$('#product_price').html(product.price)
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