<?php 
//$code = $_POST['sent'];
//echo $code; 
define('UPLOAD_DIR', '/var/www/html/capture/jpg/');
	$img = $_POST['sent'];
	$img = str_replace('data:image/jpg;base64,', '', $img);
	$img = str_replace(' ', '+', $img);
    $data = base64_decode($img);
    $name1 = date("Ymd-His").time() . '.jpg';
    $convert = 'convert '.$name1.' -resize 720x480! '.$name1;
    $file = UPLOAD_DIR . $name1;
    $success = file_put_contents($file, $data);
    print $success ? $file : 'Unable to save the file.';
    $output = shell_exec($convert);
   
    chdir('capture/jpg/');
    echo getcwd(), "\n";
    shell_exec($convert);

define('UPLOAD_DIR_BMP', '/var/www/html/capture/bmp/');
	$img2 = $_POST['sent'];
	$img2 = str_replace('data:image/bmp;base64,', '', $img2);
    $img2 = str_replace(' ', '+', $img2);
    $data2 = base64_decode($img2);
    $name2 = date("Ymd-His"). time() . '.bmp';
    $convert2 = 'convert '.$name2.' -resize 720x480! '.$name2;
    $file2 = UPLOAD_DIR_BMP .$name2 ;
    $success2 = file_put_contents($file2, $data2);
    print $success ? $file : 'Unable to save the file.';
    $output = shell_exec($convert);
    chdir('../');
    chdir('bmp/');
    echo getcwd(), "\n";
    shell_exec($convert2);
    header("location:http://".$_SERVER['SERVER_ADDR'].":8000/");
?>
