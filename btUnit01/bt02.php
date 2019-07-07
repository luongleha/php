<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="text-align: center;">
	<?php 
	$result = "";
	if (isset($_POST['calculate'])) {
		$a = isset($_POST['a']) ? (float)trim($_POST['a']) : '';
		$b = isset($_POST['b']) ? (float)trim($_POST['b']) : '';

		if ($a == '') {
			$result = 'Ban chua nhap so a';
		} else if ($b == '') {
			$result = 'Ban chua nhap so b';
		}
		if($a==0)
		{
			if($b==0){
				$result = "Phương tình có vô số nghiệm";
			}
			else{
				$result = "Phương tình vô nghiệm!";
			}
		}	

		else {
			$result = 'Dap an la: ' . -($b)/$a;	
		}
	}
	?>
	<h1>Giai phuong trinh bac nhat</h1>
	<form method="post" action="">
		<input type="text" style="width: 2%" name="a" value="">x
		+
		<input type="text" style="width: 2%" name="b" value=""> = 0
		<br><br>
		<input type="submit" style="border-radius: 5px; background-color: #ff1515d1; width: 5%" name="calculate" value="Tinh">
	</form>
	<?php 
	echo "$result";
	?>
</body>
</html>