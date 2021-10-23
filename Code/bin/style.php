<?php
   header('content-type: text/css');
   ob_start('ob_gzhandler');
   header('Cache-Control: max-age=31536000, must-revalidate');

   $color_green='#67BA6D';
   $color_alpha7_green=rgba(103, 186, 109, 0.7);
   $color_red='#CF4647';
   $color_alpha7_red=rgba(207, 70, 71, 0.7);
   $color_yellow='#F5D061';
   $color_alpha7_yellow=rgba(245, 208, 97, 0.7);
   $color_lith_blue='#8AACFF';
   $color_alpha7_lith_blue=rgba(138, 172, 255, 0.7);
   $color_blue='#2E81FF';
   $color_verylith_blue='#F6F9FF';
   $color_gray='#424242';
   $color_dark_gray='#292929';

?>