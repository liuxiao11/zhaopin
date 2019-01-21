<?php
namespace Vendor\Barcode;

// Including all required classes
require_once(dirname(__FILE__).'/class/BCGFontFile.php');
require_once(dirname(__FILE__).'/class/BCGColor.php');
require_once(dirname(__FILE__).'/class/BCGDrawing.php');

// Including the barcode technology
require_once(dirname(__FILE__).'/class/BCGcode39.barcode.php');
ob_clean();	//清除缓冲
class Barcode{
	
	function show($number){
		
		// Loading Font
		$font = new \BCGFontFile(dirname(__FILE__).'/class/font/Arial.ttf', 18);
		
		
		// The arguments are R, G, B for color.
		$color_black = new \BCGColor(0, 0, 0);
		$color_white = new \BCGColor(255, 255, 255);
		
		$drawException = null;
		try {
			$code = new \BCGcode39();
			$code->setScale(2); // Resolution
			$code->setThickness(30); // Thickness
			$code->setForegroundColor($color_black); // Color of bars
			$code->setBackgroundColor($color_white); // Color of spaces
			$code->setFont($font); // Font (or 0)
			$code->parse($number); // Text
		} catch(Exception $exception) {
			$drawException = $exception;
		}
		
		/* Here is the list of the arguments
		1 - Filename (empty : display on screen)
		2 - Background color */
		$drawing = new \BCGDrawing('', $color_white);
		if($drawException) {
			
			$drawing->drawException($drawException);
		} else {
			$drawing->setBarcode($code);
			$drawing->draw();
		}
		
		// Header that says it is an image (remove it if you save the barcode to a file)
		header('Content-Type: image/png');
		
		// Draw (or save) the image into PNG format.
		$drawing->finish(\BCGDrawing::IMG_FORMAT_PNG);
		
	}
	
	
}
?>