<?php 
	echo "<pre>";
		print_r($_POST);
	echo "</pre>";
	include_once '../connect.php';
	require_once('function.php');
	$file = upload_file('image');

	$data = $_POST;

	$query = "UPDATE products SET name='".$data['name']."',quantity='".$data['quantity']."',price='".$data['price']."',category_id='".$data['category_id']."',image='".$file."' WHERE id = '".$data['id']."' ";

    $status = $conn->query($query);

    header('Location: ../product.php');
 ?>