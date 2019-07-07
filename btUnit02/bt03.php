<?php

$arr = array(1,4,2,6,9,100,45,8,20);
function tim_gia_tri_lon_nhat(Array $values)   
		 {  
		    return max(array_diff(array_map('intval', $values), array(0)));  
		 }  
		 print_r($arr);
		 print_r(tim_gia_tri_lon_nhat($arr) ." la so lon nhat : " . "<br>");