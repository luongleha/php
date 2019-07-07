<?php

	$name=" lƯơng lÊ hÀ ";
	echo "Chuỗi khi vào: " . $name;
	function mb_ucwords($name)
	{
		return mb_convert_case($name, MB_CASE_TITLE, "UTF-8");
	}	
	$name = mb_ucwords($name);
	$name = trim($name);
	echo "<br>Chuẩn hóa chuỗi thành: " . $name . ".";

