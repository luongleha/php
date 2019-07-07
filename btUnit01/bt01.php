<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body style="text-align: center;">
	<?php 
	$result = '';
	if (isset($_POST['calculate']))
	{
    // Bước 1: Lấy tham số
		$a = isset($_POST['a']) ? $_POST['a'] : '';
		$b = isset($_POST['b']) ? $_POST['b'] : '';
		$c = isset($_POST['c']) ? $_POST['c'] : '';

    // Bước 2: Validate và tính toán
		$delta = ($b*$b) - (4*$a*$c);

		if ($delta < 0){
			$result = 'Phương trình vô nghiệm';
		}
		else if ($delta == 0){
			$result = 'Phương trình nghiệp kép x1 = x2 = ' . (-$b/2*$a);
		}
		else {
			$result = 'Phương trình có hai nghiệp phân biệt: x1 = ' . ((-$b + sqrt($delta))/2*$a);
			$result .= ',x2 = ' . ((-$b - sqrt($delta))/2*$a);
		}
	}
	?>
	<h1>Giai phuong trinh bac Hai</h1>
	<form method="post" action="">
		<input type="text" style="width: 2%" name="a" value="">x^2
		+
		<input type="text" style="width: 2%" name="b" value="">x +
		<input type="text" style="width: 2%" name="c" value=""> = 0
		<br><br>
		<input type="submit" style="border-radius: 5px; background-color: #ff1515d1; width: 5%" name="calculate" value="Tinh">
	</form>
	<?php 
	echo "$result";
	?>
</body>
</html>