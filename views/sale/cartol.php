
				
		<?php 
			include_once('views/layout/header.php');
			// session_destroy();
			// var_dump($_SESSION['cartol']);
			// die;
		 ?>
		 	<div  class =container>
					
						<h2 style="text-align: center;">---HÓA ĐƠN BÁN HÀNG---</h2>
						<?php
							if(isset($_SESSION['customer'])){

							echo  "Tên Khách Hàng :" .$_SESSION['customer']['name'];
							echo "<br> Số điện Thoại :" .$_SESSION['customer']['mobile'];
							echo "<br> Email:" .$_SESSION['customer']['email'];
							echo "<br> Địa chỉ:" .$_SESSION['customer']['address'];
								}
						 ?>
						 <br>
						<a href="?mod=online&act=product"  style="margin-left:900px;" class="btn btn-success">Tiếp tục mua hàng</a>

				
					<table id="table" class="table">
						<thead>
							<th>STT</th>

							<th>Tên sp</th>
							<th>số lượng</th>
							<th>Giá bán</th>
							<th>Image</th>
							<th>Thêm sp</th>

						</thead>
						<tbody>
							<?php 
							$i=0;
							$tongtien=0;
							if(isset($_SESSION['cartol'])){
							foreach ($_SESSION['cartol'] as $key => $product) {
								$i++;
								?>
								<tr>

									<td><?php echo $i ?></td>
									<td><?php echo $product['name'] ?></td>
									<td><?php echo $product['quantity'] ?></td>
									<td><?php echo $product['price']?></td>
									<td> <img src="public/image/product_image/<?= $product['image'] ?> " width=50px; height=70px;>
									</td>
									<td>
											<a href="?mod=online&act=delete&id=<?= $product['id'] ?>" class="btn btn-danger">-</a>
										<a href="?mod=online&act=add2cart&id=<?= $product['id'] ?>" class="btn btn-success">+</a>
									</td> 
									<?php  $tinhtien= $product['price']*$product['quantity'] ?>	
								</tr>
								<?php  
								$tongtien+=$tinhtien;
								}
							}
							?>




						</tbody>

					</table>
						<?php	echo "Tổng tiền: " .$tongtien; 
								 $_SESSION['tongtien']=$tongtien;

						?>
						<br>
						<br>
						<br>
						<br>
					<a href="?mod=online&act=sent" class="btn btn-primary" style="margin-left: 500px;">Đặt hàng</a>
						<br>
						<br>
						<br>
						<br>
						<br>
					
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

									<p> <img id = "image" width="100px" height="120px"></p>
									<p> Mã SP : <span id= "id"></span></p>
									<p> TênSP : <span id= "name"></span></p>
									<p> Số lượng: <span id= "quantity"></span></p>
									<p> Giá: <span id= "price"></span></p>
									
									
								
								
								
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="button" class="btn btn-primary">Save changes</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<script type="text/javascript">
					$('#table').DataTable();
					$('.btn-detail').on('click',function(){
						$('#modal-show').modal('show');
						var id =$(this).data('id');
						
						$.ajax({
							type:'get',
							url:'?mod=product&act=detail&id='+id,
							dataType:'json',
							success:function(reponse){
								console.log(reponse);
								$('#id').html(reponse.id)
								$('#name').html(reponse.name)
								$('#quantity').html(reponse.quantity)
								$('#price').html(reponse.price)
								$('#image').attr('src','public/image/product_image/'+reponse.image)
								
							}
						})
					})
					$('.btn-delete').on('click',function(event){
						event.preventDefault();
						var url =$(this).attr('href');


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

					})

					
						
					
				</script>

<?php 
			include_once('views/layout/footer.php');
 ?>