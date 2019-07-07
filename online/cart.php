<?php 

include_once('views/layout/header1.php');

?>

<!-- Page Info -->
<div class="page-info-section page-info">
	<div class="container">
		<div class="site-breadcrumb">
			<a href="">Home</a> / 
			<a href="">Sales</a> / 
			<a href="">Bags</a> / 
			<span>Cart</span>
		</div>
		<img src="online/img/page-info-art.png" alt="" class="page-info-art">
	</div>
</div>
<!-- Page Info end -->


<!-- Page -->
<div class="page-area cart-page spad">
	<div class="container">
		<div class="cart-table">
			<table>
				<thead>
						<tr>
							<th class="product-th">Sản phẩm</th>
							<th>Giá bán</th>
							<th>Số lượng mua</th>
							<th class="total-th">Giá thực tại</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<?php 
				$i=0;
				$tongTien=0;
				if(isset($_SESSION['cartol'])){

					foreach ($_SESSION['cartol'] as $key => $product) {
						$i++;
						$tongTien= $tongTien + $product['quantity'] * $product['price'];
						?>
				<td class="product-col">
								<img src="public/images/products/<?=$product['image']?>" >
									<h4 style="text-align: center;"><?php echo $product['name'] ?></h4>
								</div>
							</td>
							<td class="price-col"><?php echo number_format($product['price']) . ' VND' ?></td>
							<td class="quy-col">
								<div class="quy-input">
									<?php echo $product['quantity'] ?>
									<a href="?mod=online&act=add2cart&id=<?= $product['id'] ?>" class="btn btn-primary">+</a>
								<a href="?mod=online&act=delete&id=<?= $product['id'] ?>" class="btn btn-warning">-</a>
									<input type="number" value="01">
								</div>
							</td>
								<td class="total-col"><?php echo number_format($product['quantity'] * $product['price']) . 'VND' ?></td>
						</tr>
							<?php  
							// $tongtien+=$tinhtien;
						}		
					}

					?>
					<tr style="float: right;">
								<td style="color: red;"><b>Tổng Tiền: </b></td>
								<td></td>
								<td style="color: blue;"><?php echo number_format($tongTien) . ' VNĐ' ?></td>
							</tr>
					</tbody>
				</table>
</div>
<div class="row cart-buttons">
	<div class="col-lg-5 col-md-5">
		<div class="site-btn btn-continue"><a style="color: orange;" href="?mod=online&act=index">Tiếp tục mua hàng</a></div>
	</div>
	<div class="col-lg-7 col-md-7 text-lg-right text-left">
		<div class="site-btn btn-clear"><a href="?mod=online&act=unset">Hủy đơn hàng</a></div>
		<div class="site-btn btn-line btn-update"><a href="?mod=online&act=check"><b style="color: red; size: 24px;">Thanh Toán</b></a></div>
	</div>
</div>
</div>
<div class="card-warp">
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<div class="shipping-info">
					<h4>Shipping method</h4>
					<p>Select the one you want</p>
					<div class="shipping-chooes">
						<div class="sc-item">
							<input type="radio" name="sc" id="one">
							<label for="one">Next day delivery<span>$4.99</span></label>
						</div>
						<div class="sc-item">
							<input type="radio" name="sc" id="two">
							<label for="two">Standard delivery<span>$1.99</span></label>
						</div>
						<div class="sc-item">
							<input type="radio" name="sc" id="three">
							<label for="three">Personal Pickup<span>Free</span></label>
						</div>
					</div>
					<h4>Cupon code</h4>
					<p>Enter your cupone code</p>
					<div class="cupon-input">
						<input type="text">
						<button class="site-btn">Apply</button>
					</div>
				</div>
			</div>
			<div class="offset-lg-2 col-lg-6">
				<div class="cart-total-details">
					<h4>Cart total</h4>
					<p>Final Info</p>
					<ul class="cart-total-card">
						<li>Subtotal<span>$59.90</span></li>
						<li>Shipping<span>Free</span></li>
						<li class="total">Total<span>$59.90</span></li>
					</ul>
					<a class="site-btn btn-full" href="checkout.html">Proceed to checkout</a>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!-- Page end -->


<?php 

include_once('views/layout/footer1.php');

?>