<?php 
class sanpham{
	var $MaSP; 
	var $TenSP; 
	var $Soluong; 
	var $Gia; 
	var $Hang; 

	function In_thong_tin_san_pham(){
		echo "<br> Phuong thuc in thong tin san pham!";
	}

	function inTT(){
		echo "<br>-------------------------------<br>";
		echo "<br> Thong tin san pham: ";
		echo "<br> Ma san pham: " . $this->MaSP;
		echo "<br> Ten: " .$this->TenSP;
		echo "<br> So luong: " .$this->Soluong;
		echo "<br> Gia: " .$this->Gia;
		echo "<br> Hang: " .$this->Hang;
		echo "<br>-------------------------------<br>";
	}

}

$dienthoai = new sanpham();

$dienthoai->MaSP = '999';
$dienthoai->TenSP = 'IP_XS';
$dienthoai->Soluong = 99;
$dienthoai->Gia = '9.000.000';
$dienthoai->Hang = 'APPLE';

$dienthoai->In_thong_tin_san_pham();
echo $dienthoai->inTT();

// --------------------------------------------
$Laptop = new sanpham();

$Laptop->MaSP = 'A515';
$Laptop->TenSP = 'Aspire5';
$Laptop->Soluong = 9;
$Laptop->Gia = '20.000.000';
$Laptop->Hang = 'acer';

$Laptop->In_thong_tin_san_pham();
echo $Laptop->inTT();
// -------------end-----------------------------

$usb = new sanpham();

$usb->MaSP = '888';
$usb->TenSP = 'USB_10.0';
$usb->Soluong = 999;
$usb->Gia = '2.000.000';
$usb->Hang = 'Microsolf';

$usb->In_thong_tin_san_pham();
echo $usb->inTT();

?>