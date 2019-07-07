<?php 
session_start();
// include_once('data.php');
if (isset($_SESSION['cart'])) {
	$sanpham = $_SESSION['cart'];
}
else{
	$sanpham = "";
}
include_once('change.php');
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
	<style type="text/css" media="screen">
	th{
		text-align: center;
	}
	td{
		text-align: center;
	}
</style>
</head>
<body>
	<div class="container">
		<h1 align="center">Giỏ Hàng</h1>
		<?php 
		if (isset($_COOKIE['unset'])) {
			?>
			<div class="alert alert-danger" role="alert">
				<STRONG>THÔNG BÁO: </STRONG>
				<?php echo $_COOKIE['unset'];?>
			</div>
		<?php } ?>
		<?php 
		if (isset($_COOKIE['add'])) {
			?>
			<div class="alert alert-danger" role="alert">
				<STRONG>THÔNG BÁO: </STRONG>
				<?php echo $_COOKIE['add'];?>
			</div>
		<?php } ?>
		<?php 
		if (isset($_COOKIE['remove'])) {
			?>
			<div class="alert alert-danger" role="alert">
				<STRONG>THÔNG BÁO: </STRONG>
				<?php echo $_COOKIE['remove'];?>
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
				$tong = 0;
				if (is_array($sanpham)) {
					foreach ($sanpham as $product){

						$i++;
						$tong += $product['Gia'] * $product['SoLuong'];
						?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $product['MaSP'] ?></td>
							<td><?php echo $product['TenSP'] ?></td>
							<td>
								<a href="add2cart.php?MaSP=<?php echo $product['MaSP']; ?>" class="btn btn-danger">+</a>
								<?php echo $product['SoLuong'] ?>
								<a href="delete.php?MaSP=<?php echo $product['MaSP']; ?>" class="btn btn-danger">-</a>
							</td>
							<td><?php echo number_format($product['Gia'] * $product['SoLuong']) . ' VNĐ' ?></td>
							<td><a href="unset.php?MaSP=<?php echo $product['MaSP']; ?>" title="" class="btn btn-warning">Xóa sản phẩm</a></td>
						</tr>
					<?php 
					} 
				}?>
				<tr>
					<td colspan="3"><b>Tổng Tiền: </b></td>
					<td colspan="3"><?php echo number_format($tong) . ' VNĐ' ?></td>
				</tr>
				<tr>
					<td colspan="3"><i>Tổng tiền bằng chữ: </i></td>
					<td colspan="3"><?php echo '<i>'.convert_number_to_words($tong).'</i>'; ?></td>
				</tr>
			</tbody>
		</table>
		<span>
			<a href="index.php" title="" class="btn btn-primary">Tiếp tục mua hàng</a>
			<a href="customer_form.php" title="" class="btn btn-primary" style="float: right;">Thanh Toán</a>
		</span>
	</div>
</body>
</html>

