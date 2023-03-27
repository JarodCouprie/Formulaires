<?php

function load_image($filename, $width, $height, $newfilename) {
   $image_p = imagecreatetruecolor($width, $height);
   // Cacul des nouvelles dimensions
   list($width_orig, $height_orig, $type) = getimagesize($filename);

   $ratio_orig = $width_orig/$height_orig;

   if ($width/$height > $ratio_orig) {
      $width = $height*$ratio_orig;
   } else {
      $height = $width/$ratio_orig;
   }
   echo $width, $height;
   // Détermine le type de l'image et la crée
   if( $type == IMAGETYPE_JPEG ) {
       $image = imagecreatefromjpeg($filename);
       echo $width, $height;
       imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
       imagejpeg($image_p, $newfilename);
       echo "jpeg";
   };
   if( $type == IMAGETYPE_PNG ) {
       $image = imagecreatefrompng($filename);
       imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
       imagepng($image,$newfilename);
       echo "png";
   };
   if( $type == IMAGETYPE_GIF ) {
       $image = imagecreatefromgif($filename);
       imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
       imagegif($image, $newfilename);
       echo "gif";
   };
};

load_image("./test.jpg", 1600, 1200, "XLTest.jpg");





?>