<?php 
include_once('views/layout/header1.php') ?>
<!-- <a href="?mod=online&act=ca" class="btn btn-success">Cart</a> -->


<!-- Hero section -->

<section class="hero-section set-bg"  style="color: black;">
	<div class="hero-slider owl-carousel">
		<div class="hs-item">
			<div class="hs-left"><img src="online/img/ip/maxresdefault.jpg" alt=""></div>
			<div class="hs-right">
				<div class="hs-content">
					<div class="price">chỉ từ 4 triệu!!!</div>
					<h2 style="color: orange;"><span>2019</span> <br>apple watch series 4</h2>
					<a href="" class="site-btn">Đặt NGAY!</a>
				</div>	
			</div>
		</div>
		<div class="hs-item">
			<div class="hs-left"><img src="online/img/iPhone_XR_ON.png" alt=""></div>
			<div class="hs-right">
				<div class="hs-content">
					<div class="price">TỪ $19.90</div>
					<h2 style="color: purple;"><span>2019</span> <br>trang bị ngay món đồ đẳng cấp</h2>
					<a href="" class="site-btn">Đặt NGAY!</a>
				</div>	
			</div>
		</div>
		<div class="hs-item">
			<div class="hs-left"><img src="online/img/ip/longwith.png" alt=""></div>
			<div class="hs-right">
				<div class="hs-content">
					<div class="price">5 TRIỆU ĐỒNG CÓ NGAY!!!</div>
					<h2 style="color: orange;"><span>2019</span> <br>nhập từ united states</h2>
					<a href="" class="site-btn">Mua NGAY!</a>
				</div>	
			</div>
		</div>
	</div>
</section>
<!-- Hero section end -->


<!-- Intro section -->
<section class="intro-section spad pb-0">
	<div class="section-title">
		<h2>Sản phẩm thời thượng</h2>
		<p>Chúng tôi mang tới</p>
	</div>
	<div class="intro-slider">
		<ul class="slidee">

			<?php
			$i=0;
			foreach ($products as $product) {
				$i++;
				?>
				<li>
					<div class="intro-item">
						<figure>
							<img src="public/images/products/<?=$product['image']?>" >
						</figure>
						<div class="product-info">
							<h5><?php echo $product['name']; ?></h5>
							<p><?php echo number_format($product['price']) . " VND"; ?></p>
							<a href="?mod=online&act=buy&id=<?= $product['id'] ?>" class="site-btn btn-line">ADD TO CART</a>
						</div>
					</div>
				</li>
			<?php } ?>
			
		</ul>
	</div>
	<div class="container">
		<div class="scrollbar">
			<div class="handle">
				<div class="mousearea"></div>
			</div>
		</div>
	</div>
</section>
<!-- Intro section end -->


<!-- Featured section -->
<div class="featured-section spad">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="wow zoomInLeft">
					<div class="featured-item">
						<img src="online/img/ip/full-watch-mac-headphone.jpg" alt="">
						<a href="#" class="site-btn">đọc thêm</a>
					</div>
				</div>
			</div>
			
			<div class="col-md-6">
				<div class="wow zoomInRight">
					<div class="featured-item mb-0">
						<img src="online/img/ip/full-watch-mac-headphone222.jpg" alt="">
						<a href="#" class="site-btn">đọc thêm</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Featured section end -->


<!-- Product section -->
<section class="product-section spad">
	<div class="wow zoomIn">
		<div class="container">
			<ul class="product-filter controls">
				<li class="control" data-filter=".new">Đồ hiệu mới</li>
				<li class="control" data-filter="all">Sản phẩm shop</li>
				<li class="control" data-filter=".best">Tin nổi bật</li>
			</ul>
			<div class="row" id="product-filter">
				<?php
				$i=0;
				foreach ($products as $product) {
					$i++;
					?>
					<div class="mix col-lg-3 col-md-6 new">
						<div class="product-item">
							<figure>
								<img src="public/images/products/<?=$product['image']?>" >
								<div class="bache">MỚi</div>
								<div class="pi-meta">
									<div class="pi-m-left">
										<a href="?mod=online&act=detail&id=<?= $product['id'] ?>">
											<img src="online/img/icons/eye.png" alt="">
											<p>Xem chi tiết</p>
										</a>
									</div>
									<div class="pi-m-right">
										<a href="?mod=online&act=buy&id=<?= $product['id'] ?>">
											<img src="online/img/icons/heart.png" alt="">
											<p>Giữ</p>
										</a>
									</div>
								</div>
							</figure>
							<div class="product-info">
								<h6><?php echo $product['name']; ?></h6>
								<p><?php echo number_format($product['price']) . " VND"; ?></p>
								<a href="?mod=online&act=buy&id=<?= $product['id'] ?>" class="site-btn btn-line">ADD TO CART</a>
							</div>
						</div>
					</div>
					
				<?php } ?>
				
				
			</div>
			

			
		</div>
	</div>
</section>
<!-- Product section end -->


<!-- Blog section -->	
<section class="blog-section spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-5">
				<div class="wow rotateInDownLeft">
					<div class="featured-item">
						<img src="online/img/ip/black.png" alt="">
						<a href="#" class="site-btn">Xem thêm</a>
					</div>
				</div>
			</div>
			<div class="col-lg-7">
				<h4 class="bgs-title">Tin tức nổi bật</h4>
				<div class="wow slideInRight">
					<div class="blog-item">
						<div class="bi-thumb">
							<img src="online/img/ip/macbook-pro-img1.png" alt="">
						</div>
						<div class="bi-content">
							<h5>Top 10 sản phẩm nên dùng nhất 2019</h5>
							<div class="bi-meta">Tháng 10 , 2019   |   Bởi hasproIT developer</div>
							<a href="#" class="readmore">Đọc thêm</a>
						</div>
					</div>
				</div>
				<div class="wow slideInLeft">
					<div class="blog-item">
						<div class="bi-thumb">
							<img src="online/img/ip/full_xr.jpg" alt="">
						</div>
						<div class="bi-content">
							<h5>Sản phẩm thời thượng</h5>
							<div class="bi-meta">Tháng 02, 2019   |   Bởi Jessica Smith</div>
							<a href="#" class="readmore">Đọc thêm</a>
						</div>
					</div>
				</div>
				<div class="wow slideInRight">
					<div class="blog-item">
						<div class="bi-thumb">
							<img src="online/img/ip/Apple-Watch-Series-4-1.jpg" alt="">
						</div>
						<div class="bi-content">
							<h5>Sản phẩm nổi bật</h5>
							<div class="bi-meta">Tháng 09, 2019   |   Bởi maria deloreen</div>
							<a href="#" class="readmore">Đọc thêm</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Blog section end -->	


<?php 
include_once('views/layout/footer1.php');
?>