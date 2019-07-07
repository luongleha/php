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
require_once('views/layout/header.php');
?>
	
	<div  class =container>
					<h2 style="text-align: center;">--- DANH SÁCH SẢN PHẨM---</h2>
						<a href="?mod=login&act=index" class="btn btn-success"> Đăng nhập</a>
						<a href="?mod=login&act=logout" class="btn btn-success"> Đăng xuất</a>
						<a href="?mod=online&act=cart" class="btn btn-success"> cart</a>
						<a href="?mod=sale&act=count" class="btn btn-success"> Count</a>

				
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
							foreach ($products as $key => $product) {
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
									
										<a href="?mod=online&act=check&id=<?= $product['id']?>" class="btn btn-success">Mua</a>
									</td>
								</tr>
								<?php  

							}
							?>




						</tbody>

					</table>
					
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
			</div>

<?php 
require_once('views/layout/footer.php');
?>