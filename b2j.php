<?php 
//$code = $_POST['sent'];
//echo $code; 
define('UPLOAD_DIR', '/var/www/html/capture/');
	$img = $_POST['sent'];
	$img = str_replace('data:image/jpg;base64,', '', $img);
	$img = str_replace(' ', '+', $img);
	$data = base64_decode($img);
	$file = UPLOAD_DIR . date("Ymd-His") . '.jpg';
	$success = file_put_contents($file, $data);
	print $success ? $file : 'Unable to save the file.';
?>
