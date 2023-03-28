<?php

function loadImage($filename, $width, $height, $newfilename, $croped) {
    // SM => 400 x 300 px
    // MD => 800x 600 px
    // XL => 1200 x 800 px
   // Cacul des nouvelles dimensions
   list($width_orig, $height_orig, $type) = getimagesize($filename);

   $ratio_orig = $width_orig/$height_orig;

   if ($width/$height > $ratio_orig) {
      $width = $height*$ratio_orig;
   } else {
      $height = $width/$ratio_orig;
   }
   $image_p = imagecreatetruecolor($width, $height);
   echo $width_orig."x".$height_orig;
   echo "</br>";
   echo $width."x".$height;
   // Détermine le type de l'image et la crée
   if( $type == IMAGETYPE_JPEG ) {
       $image = imagecreatefromjpeg($filename);
       imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
       imagejpeg($image_p, $newfilename);
       echo ".jpeg";
   };
   if( $type == IMAGETYPE_PNG ) {
       $image = imagecreatefrompng($filename);
       imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
       imagepng($image_p,$newfilename);
       echo ".png";
   };
   if( $type == IMAGETYPE_GIF ) {
       $image = imagecreatefromgif($filename);
       imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
       imagegif($image_p, $newfilename);
       echo ".gif";
   };
};
function cropImage($filename,$newfilename){
    // Cacul des nouvelles dimensions
    list($width_orig, $height_orig, $type) = getimagesize($filename);

    $abscisses = 0;
    $ordonnees = 0;
    if ($width_orig > $height_orig){
        $width = $height_orig;
        $height = $height_orig;
        $abscisses = ($width_orig - $height_orig)/2;
    }else{
        $height = $width_orig;
        $width = $width_orig;
        $ordonnees = ($height_orig - $width_orig)/2;
    };
    echo "x = ".$abscisses, "y = ".$ordonnees;
    echo "x = ".$width, "y = ".$height;
    $image_p = imagecreatetruecolor($width, $height);
    if( $type == IMAGETYPE_JPEG ) {
        $image = imagecreatefromjpeg($filename);
        imagecopyresampled($image_p, $image, 0, 0, $abscisses, $ordonnees, $width, $height, $width, $height);
        imagejpeg($image_p, $newfilename);
    };
    if( $type == IMAGETYPE_PNG ) {
        $image = imagecreatefrompng($filename);
        imagecopyresampled($image_p, $image, 0, 0, $abscisses, $ordonnees, $width, $height, $width, $height);
        imagepng($image_p,$newfilename);
    };
    if( $type == IMAGETYPE_GIF ) {
        $image = imagecreatefromgif($filename);
        imagecopyresampled($image_p, $image, 0, 0, $abscisses, $ordonnees, $width, $height, $width, $height);
        imagegif($image_p, $newfilename);
    };
};

function cropImageS($filename,$newfilename){
    $im = imagecreatefromjpeg($filename);
    $size = min(imagesx($im), imagesy($im));
    $im2 = imagecrop($im, ['x' => 0, 'y' => 0, 'width' => $size, 'height' => $size]);
    if ($im2 !== FALSE) {
        imagejpeg($im2, $newfilename);
    }
}


//loadImage("./testGIF.gif", 400, 400, "SMtestGIF.gif");

cropImage("./testJPG.jpg", "CropedTEST.jpg");

//cropImageS("./testJPG.jpg","TEEEEEEEEST.jpg");

?>