<?php 
	echo "<pre>";
		print_r($_POST);
	echo "</pre>";
	include_once 'connect.php';

	$data = $_POST;

	$query = "INSERT INTO employees (name,email,mobile,address,password)
                VALUES ('".$data['name']."','".$data['email']."','".$data['mobile']."','".$data['address']."','".$data['passsword']."')";

    $status = $conn->query($query);

    header('Location: employee.php');
 ?>