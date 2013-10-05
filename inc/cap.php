<?php
session_start();
header("Content-type:image/png");

$cap_img=imagecreatefrompng("../img/captcha.png");

$cap_font=imageloadfont("../img/anonymous.gdf");
$cap_text=substr(md5(uniqid('')),-9,9);

$_SESSION['cap']=$cap_text;

$cap_color=imagecolorallocate($cap_img,0,0,150);
imagestring($cap_img,$cap_font,15,5,$cap_text,$cap_color);
imagepng($cap_img);
imagedestroy($cap_img);

echo $_SESSION['cap'];

?>