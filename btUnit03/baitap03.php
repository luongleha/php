<?php
        function kiem_tra_chuoi_palindrome($string)   
		{  
		  if ($string == strrev($string))  
			  echo "True";  
		  else  
			  echo "False";  
		}  
		echo kiem_tra_chuoi_palindrome('ZentneZ')."<br>";