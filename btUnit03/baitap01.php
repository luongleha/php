<?php  

	$name = 'Lương Lê Hà';
	echo "Chuỗi đầu vào: " . $name;
	$cut = explode(" ",$name);
	$so_phan_tu = count($cut);
	$ho = $cut[0];
	$ten = $cut[$so_phan_tu - 1];
	$ten_dem = "";
	for ($i=1; $i <$so_phan_tu - 1 ; $i++) { 
		$ten_dem = $ten_dem . $cut[$i] . " ";
	}
	echo "<br>Họ: " . $ho;
	echo "<br>Đệm: " . $ten_dem;
	echo "<br>Tên: " . $ten;