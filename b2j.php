<?php 
//$code = $_POST['sent'];
//echo $code; 
define('UPLOAD_DIR', '/var/www/html/capture/jpg/');
	$img = $_POST['sent'];
	$img = str_replace('data:image/jpg;base64,', '', $img);
	$img = str_replace(' ', '+', $img);
	$data = base64_decode($img);
	$file = UPLOAD_DIR . date("Ymd-His").time() . '.jpg';
	$success = file_put_contents($file, $data);
	print $success ? $file : 'Unable to save the file.';

define('UPLOAD_DIR_BMP', '/var/www/html/capture/bmp/');
	$img2 = $_POST['sent'];
	$img2 = str_replace('data:image/bmp;base64,', '', $img2);
        $img2 = str_replace(' ', '+', $img2);
        $data2 = base64_decode($img2);
        $file2 = UPLOAD_DIR_BMP . date("Ymd-His"). time() . '.bmp';
        $success2 = file_put_contents($file2, $data2);
	print $success ? $file : 'Unable to save the file.';
	header("location:http://".$_SERVER['SERVER_ADDR'].":8000/");
?>
