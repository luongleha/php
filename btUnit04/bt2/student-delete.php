<?php 

								// Nếu là delete thì thực hiện thao tác này

if (!empty($_POST['delete']))

{

	require ("students.php");

	$student_id = isset($_POST['student_id']) ? $_POST['student_id'] : '';

	deleteStudent($student_id);

}
header("Location:student-list.php");



								// Cuối cùng là chuyển hướng về trang danh sách


?>