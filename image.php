<?php
    $output="avatar/".time().".png";
    $x=200;
    $y=200;
    $image=imagecreate($x,$y);
    $red=rand(0,255);
    $green=rand(0,255);
    $blue=rand(0,255);
    $red2=rand(0,255);
    $green2=rand(0,255);
    $blue2=rand(0,255);

    imagecolorallocate($image,$red,$green,$blue);
    $textColor=imagecolorallocate($image,$red2,$green2,$blue2);
    $text1=imagettftext($image,100,0,45,150,$textColor,realpath("ARIALBD.TTF"),"O");
    
    imagepng($image,$output);
    imagedestroy($image);

?>
