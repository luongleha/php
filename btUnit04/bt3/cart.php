<?php 
session_start();
// include_once('data.php');
$sanpham = $_SESSION['cart'];
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
	<div class="container">
			<h1>Gio hang hien co</h1>
			<a href="list_product.php">quay lai</a>
		<?php 
		if (isset($_COOKIE['unset'])) {
			?>
			<div class="alert alert-danger" role="alert">
				<?php echo $_COOKIE['unset'];?>
			</div>
		<?php } ?>

	<table class="table">
		<thread>
			<th>STT</th>
			<th>Ma sp</th>
			<th>Ten sp</th>
			<th>So luong</th>
			<th>Gia ban</th>
			<th>Action</th>
		</thread>
		<tbody>
			<?php 
			$i=0;
			foreach ($sanpham as $product){
				$i++;
				?>
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $product['MaSP'] ?></td>
					<td><?php echo $product['TenSP'] ?></td>
					<td>
						<a href="add2cart.php?MaSP=<?php echo $product['MaSP']; ?>" class="btn btn-warning">+</a>
						<?php echo $product['SoLuong']; ?>

						<a href="delete.php?MaSP=<?php echo $product['MaSP']; ?>" class="btn btn-danger">-</a>
						<?php echo $product['SoLuong'] ?></td>
						<td><?php echo $product['Gia']; ?></td>
						<td>
							<a href="unset.php?MaSP=<?php echo $product['MaSP']; ?>" title="" class="btn btn-warning">Xóa sản phẩm</a>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
		<a href="list_product.php" title="" class="btn btn-primary">Tiếp tục mua hàng</a>
	</div>
</body>
</html>