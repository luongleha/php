<?php 
include_once('data.php');
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<div style="width: 95%; margin: 0 auto;">
		<h1 style="text-align: center;">Sản Phẩm</h1>
		<?php 
		if (isset($_COOKIE['success'])) {
			?>
			<div class="alert alert-danger" role="alert">
				<STRONG>THÔNG BÁO: </STRONG>
				<?php echo $_COOKIE['success'];?>
			</div>
		<?php } ?>
		<table class="table">
			<thread>
				<th>STT</th>
				<th>Mã sản phẩm</th>
				<th>Tên sản phẩm</th>
				<th>Số Lượng</th>
				<th>Giá bán</th>
				<th>Action</th>
			</thread>
			<tbody>
				<?php 
				$i=0;
				foreach ($products as $product){

				$i++;
				 ?>
				 <tr>
				 	<td><?php echo $i; ?></td>
				 	<td><?php echo $product['MaSP'] ?></td>
				 	<td><?php echo $product['TenSP'] ?></td>
				 	<td><?php echo $product['SoLuong'] ?></td>
				 	<td><?php echo number_format($product['Gia']) . ' VNĐ' ?></td>
				 	<td><a href="add2cart.php?MaSP=<?php echo $product['MaSP']; ?>" class="btn btn-success">ADD</a></td>
				 </tr>
				<?php } ?>
			</tbody>
		</table>
		<a href="cart.php" title="" class="btn btn-primary">Giỏ hàng</a>
	</div>
</body>
</html>