<?php    
	include "qrlib.php";    
	include "barcode.php";
	
	
    //set it to writable location, a place for temp generated PNG files
    $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
    
	
	$temp_folder_url = URL::to('/') . "/app/codegens/temp/";
	
    //html PNG location prefix
    $PNG_WEB_DIR = 'temp/';
    
    if (!file_exists($PNG_TEMP_DIR))
        mkdir($PNG_TEMP_DIR);
    
    
    $filename = $PNG_TEMP_DIR.'qrcode.png';
    
	/************************** These Two Parameters are pertinent to QRCODE **********************************/
	
    $errorCorrectionLevel = 'L'; // L: Smallest, M: Small, Q: High, H: Highest    
    $matrixPointSize = 4; // 1 - 10
	
	/**********************************************************************************************************/
	
	
	/************************** These Three Parameters are pertinent to Barcode **********************************/
	$size = 20;
	$orientation = "horizontal";
	$sizefactor = 1;
	
	/*************************************************************************************************************/