<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Sia_lib_image {

	function ResizeImageUsingGD($fullFilename, $thumbFilename, $size) {
	
	list ($width,$height,$type) = GetImageSize($fullFilename);

	if($im = $this->ReadImageFromFile($fullFilename,$type)){
		//if image is smaller than the $size, show the original
		if($height <= $size && $width <= $size){
			$newheight=$height;
			$newwidth=$width;
		}
		//if image height is larger, height=$size, then calc width
		else if($height > $width){
			$newheight=$size;
			$newwidth=round($width / ($height/$size));
		}
		//if image width is larger, width=$size, then calc height
		else{
			$newwidth=$size;
			$newheight=round($height / ($width/$size));
		}

		$im2=ImageCreateTrueColor($newwidth,$newheight);
		ImageCopyResampled($im2,$im,0,0,0,0,$newwidth,$newheight,$width,$height);

		return $this->WriteImageToFile($im2,$thumbFilename,$type);
	}

	return false;
}

function ResizeImageSQUARE($fullFilename, $thumbFilename, $size) {
	
		$new_w = $new_h = $size;
		list ($orig_w, $orig_h, $type) = GetImageSize($fullFilename);
		
		if($im = $this->ReadImageFromFile($fullFilename,$type)){
		
			$w_ratio = ($new_w / $orig_w);
			$h_ratio = ($new_h / $orig_h);

			if ($orig_w > $orig_h ) {//landscape
				$crop_w = round($orig_w * $h_ratio);
				$crop_h = $new_h;
			} elseif ($orig_w < $orig_h ) {//portrait
				$crop_h = round($orig_h * $w_ratio);
				$crop_w = $new_w;
			} else {//square
				$crop_w = $new_w;
				$crop_h = $new_h;
			}

			$im2=ImageCreateTrueColor($new_w,$new_h);
			ImageCopyResampled($im2,$im,0,0,0,0, $crop_w, $crop_h, $orig_w, $orig_h);
		
		return $this->WriteImageToFile($im2,$thumbFilename,$type); }
}

function ReadImageFromFile($filename, $type) {
	$imagetypes = ImageTypes();

	switch ($type) {
		case 1 :
			if ($imagetypes & IMG_GIF){
				return ImageCreateFromGIF($filename);
			}
			else{$this->Oops("File type <b>.gif</b> not supported by GD version on server");}
		break;

		case 2 :
			if ($imagetypes & IMG_JPEG){
				return ImageCreateFromJPEG($filename);
			}
			else{$this->Oops("File type <b>.jpg</b> not supported by GD version on server");}
		break;

		case 3 :
			if ($imagetypes & IMG_PNG){
				return ImageCreateFromPNG($filename);
			}
			else{$this->Oops("File type <b>.png</b> not supported by GD version on server");}
		break;

		default:
			$this->Oops("Unknown file type passed to ReadImageFromFile");
		return 0;
	}
}

function WriteImageToFile($im, $filename, $type) {
	global $config;
	
	$config['imagequality'] = 90;
	
	switch ($type) {
		case 1 :
			return ImageGIF($im, $filename);
		case 2 :
			return ImageJpeg($im, $filename, $config['imagequality']);
		case 3 :
			return ImagePNG($im, $filename);
		default:
			return false;
	}
}

function Oops($msg) {
?>
<div style="width:450px;">
	<h3 style="margin:0px;">Error</h3>
	<?php echo $msg; ?>

	<hr style="height:1px;width:80%">
	Please hit the <a href="javaScript:history.back();"><b>back button</b></a> on your browser to try again.
</div>
<?php
exit;
}

}
