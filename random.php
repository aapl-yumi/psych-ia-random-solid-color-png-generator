<?php
for ($x = 0; $x < 3; $x++) {
    $im = @imagecreate(128, 128)
    or die("Cannot Initialize new GD image stream");
    $color = substr(md5(rand()), 0, 6);
    $rgb = hex2rgb($color);
    $background_color = imagecolorallocate($im, $rgb[0], $rgb[1], $rgb[2]);
    $createfile = fopen("png/" . $x . ".png", 'x');
    imagepng($im, "png/" . $x . ".png");
    imagedestroy($im);
}

function hex2rgb($hex) {
  if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
  } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
  }
  $rgb = array($r, $g, $b);
  return $rgb;
}
?>
