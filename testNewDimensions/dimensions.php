<?php

function load_image($filename, $width, $height, $newfilename) {
   // Cacul des nouvelles dimensions
   list($width_orig, $height_orig, $type) = getimagesize($filename);

   $ratio_orig = $width_orig/$height_orig;

   if ($width/$height > $ratio_orig) {
      $width = $height*$ratio_orig;
   } else {
      $height = $width/$ratio_orig;
   }
   $image_p = imagecreatetruecolor($width, $height);
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

load_image("./testGIF.gif", 400, 400, "SMtestGIF.gif");





?>