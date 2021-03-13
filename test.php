<?php
        function make_avatar($character)
        {
            $path='avatar/'.time().'.png';
            $image=imagecreate(200,200);
            $red=rand(0,255);
            $green=rand(0,255);
            $blue=rand(0,255);
            imagecolorallocate($image, $red, $green, $blue);
            $textcolor=imagecolorallocate($image,255,255,255);
            imagettftext($image,100,0,20,150,$textcolor,realpath("ARIALBD.TTF"),$character);
            header('Content-type:image/png');
            imagepng($image,$path);
            imagedestroy($image);
            return $path;
        }
        function explode_this($character){
            $first_letter=substr($character,0,1);
            $exploder=explode(' ',$character);
            return ucfirst($first_letter).''.strtolower($exploder[1][0]);

        }
        if(isset($_POST['submit'])){
            make_avatar(explode_this($_POST['mail']));
            
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>ZONE DE TEST QUI J'ESPERE VA MARCHER</h1>
    <form action="" method="post">
        <input type="text" name="mail">
        <input type="submit" value="Tapez quelque chose d'insignifiant" name="submit">
    </form>
</body>
</html>