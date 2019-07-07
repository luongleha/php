<?php 
	echo "<pre>";
		print_r($_POST);
	echo "</pre>";
	include_once 'connect.php';

	$data = $_POST;

	$query = "INSERT INTO customers (name,email,mobile,address)
                VALUES ('".$data['name']."','".$data['email']."','".$data['mobile']."','".$data['address']."')";

    $status = $conn->query($query);

    header('Location: customer.php');
 ?>