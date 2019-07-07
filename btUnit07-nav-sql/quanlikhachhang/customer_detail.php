<?php 

	// Thong so ket noi CSDL
	include_once 'connect.php';
	
	$id = $_GET['id'];

	// Cau lenh truy van co so du lieu

	$sql = "SELECT * FROM customers
	WHERE id=".$id;

	$result = $conn->query($sql);

	$customer = $result->fetch_assoc();
	echo json_encode($customer);

?>
