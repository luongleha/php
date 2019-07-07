<?php 
	echo "<pre>";
		print_r($_POST);
	echo "</pre>";
	include_once '../connect.php';

	$data = $_POST;

	$query = "UPDATE employees SET name='".$data['name']."',email='".$data['email']."',mobile='".$data['mobile']."',address='".$data['address']."',password='".$data['password']."' WHERE id = '".$data['id']."' ";

    $status = $conn->query($query);

    header('Location: ../employee.php');
 ?>