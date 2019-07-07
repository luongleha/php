<?php 
	echo "<pre>";
		print_r($_POST);
	echo "</pre>";
	include_once '../connect.php';

	$data = $_POST;

	$query = "UPDATE customers SET name='".$data['name']."',email='".$data['email']."',mobile='".$data['mobile']."',address='".$data['address']."' WHERE id = '".$data['id']."' ";

    $status = $conn->query($query);

    header('Location: ../customer.php');
 ?>