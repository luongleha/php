<?php 
	echo "<pre>";
		print_r($_POST);
	echo "</pre>";
	include_once '../connect.php';
	require_once('function.php');
	$file = upload_file('image');

	$data = $_POST;

	$query = "INSERT INTO products (name,quantity,price,category_id,image)
                VALUES ('".$data['name']."','".$data['quantity']."','".$data['price']."','".$data['category_id']."','".$file."')";

    $status = $conn->query($query);

    header('Location: ../product.php');
 ?>