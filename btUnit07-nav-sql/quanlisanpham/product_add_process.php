<?php 
	echo "<pre>";
		print_r($_POST);
	echo "</pre>";
	include_once 'connect.php';

	$data = $_POST;

	$query = "INSERT INTO products (name,quantity,price,category_id)
                VALUES ('".$data['name']."','".$data['quantity']."','".$data['price']."','".$data['category_id']."')";

    $status = $conn->query($query);

    header('Location: product.php');
 ?>