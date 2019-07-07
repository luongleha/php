<?php 

    include_once '../connect.php';
    $id = $_GET['id'];
    // Cau lenh truy van co so du lieu

    $query = "DELETE FROM employees WHERE id=".$id;

    $result = $conn->query($query);

     $status = $conn->query($query);

    header('location: ../employee.php');
?>
