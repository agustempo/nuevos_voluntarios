<?php 

function imageResize($imgSrc,$width,$height,$type=""){
	list($width_orig, $height_orig) = getimagesize($imgSrc);  
	
	switch($type){
		case "image/jpeg":
			$myImage = imagecreatefromjpeg($imgSrc);
		break;
		case "image/gif":
			$myImage = imagecreatefromgif($imgSrc);
		break;
		case "image/png":
			$myImage = imagecreatefrompng($imgSrc);
		break;
		default:
			$myImage = imagecreatefromjpeg($imgSrc);
	}
	
	$ratio_orig = $width_orig/$height_orig;
   
    if ($width/$height > $ratio_orig) {
       $new_height = $width/$ratio_orig;
       $new_width = $width;
    } else {
       $new_width = $height*$ratio_orig;
       $new_height = $height;
    }
	
	$process = imagecreatetruecolor($new_width, $new_height);
	
	imagecopyresampled($process, $myImage, 0, 0, 0, 0, $new_width, $new_height, $width_orig, $height_orig);
    imagedestroy($myImage);
	return $process;
}
function CroppedThumbnail($imgSrc,$thumbnail_width,$thumbnail_height,$type='') { //$imgSrc is a FILE - Returns an image resource.
    //getting the image dimensions 
    list($width_orig, $height_orig) = getimagesize($imgSrc);  
	
	switch($type){
		case "image/jpeg":
			$myImage = imagecreatefromjpeg($imgSrc);
		break;
		case "image/gif":
			$myImage = imagecreatefromgif($imgSrc);
		break;
		case "image/png":
			$myImage = imagecreatefrompng($imgSrc);
		break;
		default:
			$myImage = imagecreatefromjpeg($imgSrc);
	}
    $ratio_orig = $width_orig/$height_orig;
   
    if ($thumbnail_width/$thumbnail_height > $ratio_orig) {
       $new_height = $thumbnail_width/$ratio_orig;
       $new_width = $thumbnail_width;
    } else {
       $new_width = $thumbnail_height*$ratio_orig;
       $new_height = $thumbnail_height;
    }
   
    $x_mid = $new_width/2;  //horizontal middle
    $y_mid = $new_height/2; //vertical middle
   
    $process = imagecreatetruecolor(round($new_width), round($new_height));
   
    imagecopyresampled($process, $myImage, 0, 0, 0, 0, $new_width, $new_height, $width_orig, $height_orig);
    $thumb = imagecreatetruecolor($thumbnail_width, $thumbnail_height);
    imagecopyresampled($thumb, $process, 0, 0, ($x_mid-($thumbnail_width/2)), ($y_mid-($thumbnail_height/2)), $thumbnail_width, $thumbnail_height, $thumbnail_width, $thumbnail_height);

    imagedestroy($process);
    imagedestroy($myImage);
	return $thumb;
}

header("Content-Type: image/png");
$image=$_GET['i'];
$imgSrc="images/$image.jpg";
$w=940;
$h=1;
$img = imageResize($imgSrc,$w,$h);
imagepng($img);
imagedestroy($img);
 ?>