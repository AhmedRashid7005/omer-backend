<?php $__env->startSection('title', 'Package Edit'); ?>
<?php $__env->startSection('content'); ?>
<?php
include(app_path() . '/codegens/index.php');

foreach($list as $package):

$qrcode_filename = $PNG_TEMP_DIR.'qrcode_'.md5($package->package_no.'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
QRcode::png($package->package_no, $qrcode_filename, $errorCorrectionLevel, $matrixPointSize, 2);  
$qrcode = '<img src="'. $temp_folder_url . basename($qrcode_filename).'" /><hr/>';


$qr_style = "";


$barcode_filename = $PNG_TEMP_DIR.'barcode_'.md5($package->package_no.'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
if($type == "b") $qr_style = 'style="width:200px; height:50px;"';	
barcode( $barcode_filename, $package->package_no, $size, $orientation, "code128", false, $sizefactor );
$barcode = '<img ' . $qr_style . ' src="'. $temp_folder_url . basename($barcode_filename).'" /><hr/>';
?>


<table style="border: 1px solid black; text-align: center;">
	<tr><td colspan=2><?=$barcode?></td></tr>
<?php
if($type == "a"):
?>
	<tr><td>Suite No:</td><td><?=$package->user->suit?></td></tr>
	<tr><td>Package No:</td><td><?=$package->package_no?></td></tr>
	<tr><td>Client Name:</td><td><?=$package->user->name?></td></tr>
	<tr><td>Mobile No:</td><td><?=$package->user->ship_phone?></td></tr>
	<tr><td>Creation Date:</td><td><?=$package->created_at?></td></tr>
	<tr><td colspan=2><?=$qrcode?></td></tr>
<?php
endif;
?>
</table>

<?php
endforeach;
?>
