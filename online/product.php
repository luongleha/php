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
			<span>Shoulder bag</span>
		</div>
		<img src="online/img/page-info-art.png" alt="" class="page-info-art">
	</div>
</div>
<!-- Page Info end -->

<div class="container">
	<div class="row" id="product-filter">
		<?php
		$i=0;
		foreach ($products as $product) {
			$i++;
			?>
			<div class="mix col-lg-3 col-md-6 new">
				<div class="product-item">
					<figure>
						<img src="public/images/<?=$product['image']?>" >
						<div class="bache">NEW</div>
						<div class="pi-meta">
							<div class="pi-m-left">
								<img src="online/img/icons/eye.png" alt="">
								<p>quick view</p>
							</div>
							<div class="pi-m-right">
								<img src="online/img/icons/heart.png" alt="">
								<p>save</p>
							</div>
						</div>
					</figure>
					<div class="product-info">
						<h6><?php echo $product['name']; ?></h6>
						<p><?php echo number_format($product['price']) . " VND"; ?></p>
						<a href="?mod=online&act=check&id=<?= $product['id'] ?>" class="site-btn btn-line">ADD TO CART</a>
					</div>
				</div>
			</div>
			
		<?php } ?>
		
		
	</div>
</div>

<?php 
include_once('views/layout/footer1.php');
?>